<?php

    use function PHPSTORM_META\type;

    include_once('config.php');
    include_once('utilities.php');

    class Validate{
        public function validateNames($first_name, $last_name, $errors_array = []){
            if(empty($first_name) || empty($last_name)){array_push($errors_array, "Names cant be empty"); }
            if(preg_match('/\s/', $first_name) || preg_match('/\s/', $last_name)){array_push($errors_array, "No spaces allowed in first or last name");}

			if(preg_match('~[0-9]+~', $first_name) || preg_match('~[0-9]+~', $last_name)){array_push($errors_array, "Name can't contain numeric characters");}

            return $errors_array;
        }

        public function validateEmail($email, $errors_array=[]){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){array_push($errors_array, "Invalid email formart, try again");}
            return $errors_array;
        }

        public function validateAddress($address, $errors_array = []){
            $address_condition = [];
            
			//check address, we break then check for spaces because ctype_alpha considers white space non alphabetic
            if(preg_match('/\s/', $address) ){
                $address_array = explode(" ", $address);
                foreach ($address_array as $single_address) {
                    $is_all_alphabetical = ctype_alpha($single_address) ? "True" : "False";
                    array_push($address_condition, $is_all_alphabetical);
                }
            }else{
				$is_all_alphabetical = ctype_alpha($address) ? "True" : "False";
				array_push($address_condition, $is_all_alphabetical);
			}

			if(in_array("False", $address_condition)){array_push($errors_array, "Physical address cant contain numbers");}
            return $errors_array;
        }

        public function validatePhoneNumber($phone, $errors_array = []){
            if(empty($phone)){array_push($errors_array, "Phone number cant be empty");}
            return $errors_array;
        }

        public function validateNssfandNhif($nssf, $nhif, $kra, $errors_array=[]){
            if(empty($nssf) || empty($nhif) || empty($kra)){array_push($errors_array, "NSSF, KRA and NHIF can't cant be empty"); }
            if(!is_int($nssf) || !is_int($nhif)){array_push($errors_array, "NSSF and NHIF invalid, only numbers allowed");}
            return $errors_array;
        }

    }

    trait person{
        private $conn; 
        public $first_name = "";
        public $last_name = "";
        public $email = "";
        public $age = "";
        public $phone = "";
        public $physical_address = "";
        public $dob = "";
        public $sex = "";
        public $status = "";
        public $nhif_number = "";
		public $id_num = "";

        public $nssf = "";
        public $picture = "";
        public $kra = "";
        public $department = "" ;
        public $role = "";

        
        public function attach_common_props(){
            $this->first_name = strtolower(ucfirst(htmlspecialchars(strip_tags($_POST['first_name']))));
            $this->last_name = strtolower(ucfirst(htmlspecialchars(strip_tags($_POST['last_name']))));
			$this->id_num = (int)htmlspecialchars(strip_tags($_POST['id_num']));
            $this->age = htmlspecialchars(strip_tags($_POST['age']));
            $this->phone = htmlspecialchars(strip_tags($_POST['phone']));
            $this->physical_address = strtolower(ucfirst(htmlspecialchars(strip_tags($_POST['p_address']))));
            $this->dob = htmlspecialchars(strip_tags($_POST['dob']));
            $this->sex = htmlspecialchars(strip_tags($_POST['sex']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));
            $this->nhif_number = (int)htmlspecialchars(strip_tags($_POST['nhif']));
			
        }

        public function attach_common_props_employees_doctors(){
            $this->email = strtolower($_POST['email']);
            $this->nssf = (int)htmlspecialchars(strip_tags($_POST['nssf']));
            $this->kra = strtoupper(htmlspecialchars(strip_tags($_POST['kra'])));
            $this->picture = $_FILES['profile_picture'];
        }
    }

    class Patient{
        use person;
        public $op_number = "";
        private $table = "patients";
        public $number_of_visits = 0;

        public function __construct($database){
            $this->conn = $database;
        }

        public function add(){
            //variables
            $all_errors = [];

            //validation
            $new_validation = new Validate();
            $name_error = $new_validation->validateNames($this->first_name, $this->last_name, []);
            $phone_error = $new_validation->validatePhoneNumber($this->phone, []);
            $address_error = $new_validation->validateAddress($this->physical_address, []);
            $all_errors = array_merge($name_error, $phone_error, $address_error);

            //check if patient has visited before;
            $check_patient_previous_visit_query = "SELECT id_no, number_of_visits FROM ".$this->table." WHERE id_no = ? ";
            $check_patient_params = [$this->id_num];
            $check_patient_results = $this->conn->select($check_patient_previous_visit_query, $check_patient_params);
            
            //push to database
            if(count($all_errors) === 0){
                $this->op_number = generateOutPatientNumber();
                //for returning patients
                if(count($check_patient_results) > 0){
                    $this->number_of_visits = $check_patient_results[0]['number_of_visits'] + 1;
                    $update_patient_query = "UPDATE ".$this->table." SET op_num = ?,  
                        age=?, marital_status=?, phone_num=?, physical_address=?, nhif_num=?, number_of_visits=? WHERE id_no = ? ";
                    $update_patient_params = [
                        $this->op_number, $this->age, 
                        $this->status, $this->phone, 
                        $this->physical_address, 
                        $this->nhif_number, $this->number_of_visits, $check_patient_results[0]['id_num']
                    ];
                    try {
                        $this->conn->update($update_patient_query, $update_patient_params);
                    } catch (Exception $th) {
                        throw new Exception($th->getMessage());                        
                    }
                }else{
                    //for first time patients
                    $query = "INSERT INTO ".$this->table." (id_no, op_num, first_name, last_name, age, sex, marital_status, phone_num, physical_address, dob, nhif_num) 
                        VALUES(?,?,?,?,?,?,?,?,?,?,?)
                    ";
                    $params = [ 
						$this->id_num,
                        $this->op_number, $this->first_name, $this->last_name, 
                        $this->age, $this->sex, $this->status,
                        $this->phone,$this->physical_address,$this->dob,
                        $this->nhif_number
                    ];
                   
                    try {
                        $this->conn->insert($query, $params);
                        $_SESSION['msg'] = 'Patient added to database succesfully';
                        echo "Success, patient OP number is".$this->op_number;
                    } catch (Exception $e) {
                        throw new Exception($e->getMessage());
                    }
                }  
            }else{
                print_r($all_errors);
            }
        }
        
        public function admitPatient(){

        }
    }

    class Doctor{
        use person;
        public $table = 'doctors';

        public function __construct($database){
            $this->conn = $database;
        }

        public function add_doctor(){
            //variables
            $all_errors = [];
            $destination_folder = '../images/doctors/';
            $this->department = strtolower(htmlspecialchars(strip_tags($_POST['department'])));
			$upload_image_return = null;

            //form validations
            $new_validation = new Validate();
            $name_error = $new_validation->validateNames($this->first_name, $this->last_name);
            $email_error = $new_validation->validateEmail($this->email);
            $nssf_nhif_kra_error = $new_validation->validateNssfandNhif($this->nssf, $this->nhif_number, $this->kra);
            $phone_error = $new_validation->validatePhoneNumber($this->phone);
            $address_error = $new_validation->validateAddress($this->physical_address);
            $all_errors = array_merge($name_error, $email_error, $phone_error, $address_error, $nssf_nhif_kra_error);

			//check if names exists
			$check_query = "SELECT first_name FROM ".$this->table. " WHERE id_no = ?";
			$check_params = [$this->id_num];
			$results = $this->conn->select($check_query, $check_params);
			if(count($results) > 0){
				array_push($all_errors, "Doctor already exists");
			}

			print_r($this->picture);
            //image processing
			if($this->picture['size'] === 0){
				$this->picture = 'ani-icon-01.png';
			}else{
				$upload_image_return = fileUpload($this->picture, '../images/doctors/');
				$this->picture = $this->picture['name'];
				if(is_array($upload_image_return)){
					foreach($upload_image_return as $img_error){
						array_push($all_errors, $img_error);
					}
            	}
			}

            
            //to database
            if(count($all_errors) === 0){
                $query = "INSERT INTO ".$this->table. " (id_no, first_name, last_name, age, sex, status, email, phone_num, physical_address, dob, nhif_num, 
                    picture, department, kra_num, nssf_num) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
                ";

                $params = [
					$this->id_num,
                    $this->first_name,$this->last_name,$this->age,
                    $this->sex, $this->status,
                    $this->email,$this->phone,$this->physical_address,
                    $this->dob,$this->nhif_number,
                    $this->picture,$this->department,
                    $this->kra,$this->nssf,
                ];
                try {
					if($this->picture !=  'ani-icon-01.png'){
						move_uploaded_file($this->picture['tmp_name'], $destination_folder.$upload_image_return);
					}
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = 'Doctor added to database succesfully';
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());                    
                }
            }else{
                print_r($all_errors);
            }
    
        }
    }

    class Employee{
        use person;
        public $table = "employees";

        public function __construct($db){
            $this->conn = $db;
        }
        
        public function addEmployee(){
			//variables
            $all_errors = [];
            $destination_folder = '../images/employees/';
            $this->role = htmlspecialchars(strip_tags($_POST['role']));

			//validations
			$new_validation = new Validate();
            $name_error = $new_validation->validateNames($this->first_name, $this->last_name);
            $email_error = $new_validation->validateEmail($this->email);
            $nssf_nhif_kra_error = $new_validation->validateNssfandNhif($this->nssf, $this->nhif_number, $this->kra);
            $phone_error = $new_validation->validatePhoneNumber($this->phone);
            $address_error = $new_validation->validateAddress($this->physical_address);
            $all_errors = array_merge($name_error, $email_error, $phone_error, $address_error, $nssf_nhif_kra_error);

			//check if names exists
			$check_query = "SELECT first_name FROM ".$this->table. " WHERE first_name =? AND last_name = ?";
			$check_params = [$this->first_name, $this->last_name];
			$results = $this->conn->select($check_query, $check_params);
			if(count($results) > 0){
				array_push($all_errors, "Doctor already exists");
			}

			//image processing
			$upload_image_return = fileUpload($this->picture, '../images/employees/');
            if(is_array($upload_image_return)){
                foreach($upload_image_return as $img_error){
                    array_push($all_errors, $img_error);
                }
            }

			//push to database
            if(count($all_errors) === 0){
				$query = "INSERT INTO ".$this->table. " ( first_name,last_name,age, sex,status,email,
					phone_num,physical_address,dob, nhif_num,picture,role, kra_num,nssf_num
					) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?)
				";
				$params = [
					$this->first_name,$this->last_name,$this->age,$this->sex,
					$this->status,$this->email,$this->phone,$this->physical_address,
					$this->dob,$this->nhif_number,$this->picture['name'],$this->role,
					$this->kra,$this->nssf,
				];
                try {
                    move_uploaded_file($this->picture['tmp_name'], $destination_folder.$upload_image_return);
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = 'Employee added to database succesfully';
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());                    
                }
            }else{
				print_r($all_errors);
			}
        }
    }

    class Department{
        private $conn;
        public $table = 'departments';
        public $name = "";
        public $hod = "";

        public function __construct($db){
            $this->conn = $db;
        }
    
        public function createDepartment(){
			//variables
            $errors = [];
            $this->name = htmlspecialchars(strip_tags($_POST["name"]));
            $this->hod = htmlspecialchars(strip_tags($_POST["hod"]));

            //check if department already exists
            $check_query = "SELECT name FROM ".$this->table. " WHERE name = :name";
            $results = $this->conn->select($check_query, ['name'=>$this->name]);

            if(count($results) != 0 ){
                array_push($errors, "Department already exists, choose another name");
            }

            if(count($errors) === 0){
                $select_query = "INSERT INTO ".$this->table." (name, hod) VALUES(?,?)";
                $params = [$this->name, $this->hod];
                try {
                    $this->conn->insert($select_query, $params);
                    $_SESSION['msg'] = 'Department added to database succesfully';
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }else{
				print_r($errors);
			}
        }

    }

    Class Ward{
        private $conn;
        private $table = 'wards';
        public $name = "";
        public $incharge = "";
        public $capacity = "";

        public function __construct($db){
            $this->conn = $db;
        }

        public function addWard(){
            $errors = [];
            $this->name = strtolower(htmlspecialchars(strip_tags($_POST["wardname"])));
            $this->incharge = htmlspecialchars(strip_tags($_POST["incharge"]));
            $this->capacity = (int)htmlspecialchars(strip_tags($_POST["capacity"]));
            
			//check if name exists
			$check_query = "SELECT name FROM ".$this->table. " WHERE name = ?";
			$check_params = [$this->name];
			$results = $this->conn->select($check_query, $check_params);
			if(count($results) > 0){
				array_push($errors, "Doctor already exists");
			}

            if(count($errors) === 0){
                $query = "INSERT INTO ".$this->table." (name, incharge, capacity) VALUES(?,?,?)";
                $params = [$this->name,$this->incharge,$this->capacity];
                try {
                    $this->conn->insert($query, $params);
					$_SESSION['msg'] = "New ward added successfully";
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }

        }

        public function getWards(){
            $wards = $this->conn->select('SELECT name, capacity FROM wards');
            return $wards;
        }
       
    }

    class Supplier{
        //supplier_id	name	company_name	status	email	phone_num	physical_address	
        private $conn;
        private $table = 'suppliers';

        public $supplier_id = "";
        public $name= "";
        public $company_name= "";
        public $status= "";
        public $email= "";
        public $phone_num= "";
        public $physical_address= "";
        
        public function __construct($db){
            $this->conn = $db;
        }
        
        public function addSupplier(){
            $all_errors = [];

            $this->supplier_id = htmlspecialchars(strip_tags($_POST['supplier_id']));
            $this->name = strtolower(htmlspecialchars(strip_tags($_POST['name'])));
            $this->company_name = strtoupper(htmlspecialchars(strip_tags($_POST['company_name'])));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));
            $this->email = htmlspecialchars(strip_tags($_POST['email']));
            $this->phone_num = htmlspecialchars(strip_tags($_POST['phone_number']));
            $this->physical_address = htmlspecialchars(strip_tags($_POST['p_address']));

			//validation
			$new_validation = new Validate();
			$email_error = $new_validation->validateEmail($this->email);
			$address_error = $new_validation->validateAddress($this->physical_address);
			$phone_error = $new_validation->validatePhoneNumber($this->phone_num);
			$all_errors = array_merge($email_error, $address_error, $phone_error);

			//check if supplier exists (company name)
			$check_query = "SELECT company_name FROM ".$this->table. " WHERE company_name = ?";
			$check_params = [$this->company_name];
			$results = $this->conn->select($check_query, $check_params);
			if(count($results) > 0){
				array_push($all_errors, "Supplier already exists");
			}

            if(count($all_errors) === 0){
                $query = "INSERT INTO ".$this->table."(supplier_id, name, company_name, status, email, phone_num, physical_address) VALUES (?,?,?,?,?,?,?)";
                $params = [ 
					$this->supplier_id, 
					$this->name, 
					$this->company_name, 
					$this->status, 
					$this->email, 
					$this->phone_num, 
					$this->physical_address
				];

                try {                    
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = "Supplier added to databse";
                    echo $_SESSION['msg'];
                } catch (Exception $e) {        
                    throw new Exception($e->getMessage());
                }
            }else{
				print_r($all_errors);
			}
        }
    }

    class Expense{
        private $conn;
        //name	payment_method	paid_from_account	description	amount	status	due_date
        public $name = "";
        public $payment_method = "";
        public $paid_from_account = "";
        public $description = "";
        public $amount = "";
        public $status = "";
        public $due_date = "";

        public function __construct($db){
            $this->conn = $db;
        }

        public function addExpense(){
            $errors = [];

            $this->name = htmlspecialchars(strip_tags($_POST['name']));
            $this->payment_method = htmlspecialchars(strip_tags($_POST['payment_method']));
            $this->paid_from_account = htmlspecialchars(strip_tags($_POST['paid_from_account']));
            $this->description = htmlspecialchars(strip_tags($_POST['description']));
            $this->amount = htmlspecialchars(strip_tags($_POST['amount']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));
            $this->due_date = htmlspecialchars(strip_tags($_POST['due_date']));

            //CHECKS if status is not paid, due date is compulsory
			if($this->status === "Not Paid" and empty($this->due_date)){
				array_push($errors, "Expenses not paid must have due date");
			}

			if($this->status === 'Paid' and !empty($this->due_date)){
				array_push($errors, "Paid expenses cant have due dates");
			}

            if(count($errors) === 0){
                $query = "INSERT INTO expenses (name, payment_method, paid_from_account, description, amount, status, due_date) VALUES (?,?,?,?,?,?,?)";
                $params = [
                    $this->name, $this->payment_method, 
                    $this->paid_from_account, $this->description, $this->amount, $this->status, $this->due_date
                ];

                try {
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = "Expense ".$this->name." added to database";
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                    
                    
                }
            }else{
				print_r($errors);
			}

        }

        public function addExpenseCategory(){
            $all_errors = [];
            //$this->table = 'expenses_category';
            $this->name = strtolower(htmlspecialchars(strip_tags($_POST['name'])));
            $this->description = htmlspecialchars(strip_tags($_POST['description']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));

			//check if category exists
			$check_query = "SELECT name FROM expenses_category WHERE name = ?";
			$check_params = [$this->name];
			$results = $this->conn->select($check_query, $check_params);
			if(count($results) > 0){
				array_push($all_errors, "Expense category already exists");
			}

            if(count($all_errors) === 0){
                $query = "INSERT INTO expenses_category (name, status, description) VALUES (?,?,?)";
                $params = [ $this->name, $this->status, $this->description];

                try {
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = "Operation okay";
					echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }else{
				print_r($all_errors);
			}
        }
    }

    class Drugs{
        private $conn;
        public $name = "";
        public $category = "";
        public $unit_price = "";
        public $supplier = "";
        public $status = "";

        public function __construct($db){
            $this->conn = $db;
        }
          
        public function addDrug(){
            $errors = [];

            $this->name = strtolower(htmlspecialchars(strip_tags($_POST['name'])));
            $this->category = htmlspecialchars(strip_tags($_POST['category']));
            $this->unit_price = htmlspecialchars(strip_tags($_POST['unit_price']));
            $this->supplier = htmlspecialchars(strip_tags($_POST['supplier']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));

			//check if name exists
			$check_query = "SELECT name FROM drugs WHERE name = ?";
			$check_params = [$this->name];
			$results = $this->conn->select($check_query, $check_params);
			if(count($results) > 0){
				array_push($errors, "Drug already exists");
			}

            if(count($errors) === 0){
                $query = "INSERT INTO drugs (name, category, unit_price, supplier, status) VALUES(?, ?, ?, ?, ?)";
                $params= [$this->name, $this->category, $this->unit_price, $this->supplier, $this->status];

                try {
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = "Drug added";
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }
        }
    }

    class Notices{
        private $conn;
        
        public $title = "";
        public $description  = "";
        public $start_date = "";
        public $end_date = "";
        public $status = "";

        public function __construct($db){
            $this->conn = $db;
        }

        public function addNotice(){
            $errors = [];
            $this->title = strtolower(htmlspecialchars(strip_tags($_POST['title'])));
            $this->description  = htmlspecialchars(strip_tags($_POST['description']));
            $this->start_date = htmlspecialchars(strip_tags($_POST['start_date']));
            $this->end_date = htmlspecialchars(strip_tags($_POST['end_date']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));

			//check that end date is grater than start date
			if($this->end_date < $this->start_date){array_push($errors, "Start date cant be grater than end date");}

            if(count($errors) === 0){
                $query = "INSERT INTO notices (title, description, start_date, end_date, status) VALUES(?, ?, ?, ?, ?)";
                $params = [$this->title,$this->description ,$this->start_date,$this->end_date,$this->status];

                try {
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = 'Notice added';
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }
        }
    }

    class Message{
        private $conn;
        private $table = "messages";

        //subject	to_email	cc_email	from_email	body	attachments
        public $subject = "";
        public $to_email = "";
        public $cc_email = "";
        public $from_email = "";
        public $body = "";
        public $attachment = "";

        public function __construct($db){
            $this->conn = $db;
        }
        

        public function addMessage(){
            $errors = [];
            $this->subject = htmlspecialchars(strip_tags($_POST['subject']));
            $this->to_email = htmlspecialchars(strip_tags($_POST['to_email']));
            $this->cc_email = htmlspecialchars(strip_tags($_POST['cc_email']));
            $this->from_email = htmlspecialchars(strip_tags($_POST['from_email']));
            $this->body = htmlspecialchars(strip_tags($_POST['body']));
            $this->attachment = $_FILES['attachments'];
            $this->attachment = $_FILES['attachments'];
            $total_file_count = count($this->attachment['name']);
            

            if(count($errors) === 0){
                $file_names = [];
                for ($i=0; $i < $total_file_count ; $i++) { 
                    array_push($file_names, $this->attachment['name'][$i]);
                }

                $all_attachements_to_string = $total_file_count === 0 ? " " : implode(",", $file_names);
                $query = "INSERT INTO ".$this->table. " (subject, to_email, cc_email, from_email, body, attachments) VALUES(?, ?, ?, ?, ?, ?)";
                $params = [$this->subject, $this->to_email, $this->cc_email, $this->from_email, $this->body, $all_attachements_to_string];
                try {
                    //code...
                    $this->conn->insert($query, $params);

                    for ($i=0; $i < $total_file_count ; $i++) { 
                        $tmpFilePath = $this->attachment['tmp_name'][$i];
                        $newFilePath = "../Attachments/".$this->attachment['name'][$i];
                        move_uploaded_file($tmpFilePath, $newFilePath);
                    }
                    echo "Everything okay";
                } catch (Exception $e) {
                    //throw $th;
                    throw new Exception($e->getMessage());
                }
            }

        }
    }

    class Html{
        public function populateSelect($array, $key){
            foreach ($array as $option_item) {
                echo '<option value="'.$option_item[$key].'">'.ucfirst($option_item[$key]).'</option>';
            }
        }
    }
?>