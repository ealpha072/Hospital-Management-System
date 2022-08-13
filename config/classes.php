<?php

use function PHPSTORM_META\type;

    include_once('config.php');
    include_once('utilities.php');

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

        public $nssf = "";
        public $picture = "";
        public $kra = "";
        public $department = "" ;
        public $role = "";
        
        public function attach_common_props(){
            $this->first_name = strtolower(ucfirst(htmlspecialchars(strip_tags($_POST['first_name']))));
            $this->last_name = strtolower(ucfirst(htmlspecialchars(strip_tags($_POST['last_name']))));
            $this->age = htmlspecialchars(strip_tags($_POST['age']));
            $this->phone = htmlspecialchars(strip_tags($_POST['phone']));
            $this->physical_address = strtolower(ucfirst(htmlspecialchars(strip_tags($_POST['p_address']))));
            $this->dob = htmlspecialchars(strip_tags($_POST['dob']));
            $this->sex = htmlspecialchars(strip_tags($_POST['sex']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));
            $this->nhif_number = htmlspecialchars(strip_tags($_POST['nhif']));
        }

        public function attach_common_props_employees_doctors(){
            $this->email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $this->nssf = htmlspecialchars(strip_tags($_POST['nssf']));
            $this->kra = htmlspecialchars(strip_tags($_POST['kra']));
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
            $errors = [];   

            if(empty($this->first_name || $this->last_name || $this->age || $this->sex || $this->status ||$this->phone ||$this->physical_address ||$this->dob)){
                array_push($errors, "No empty fileds allowed, please fill in all fields");
            }

            if(!empty($this->nhif_number) && !is_integer($this->nhif_number)){array_push($errors, "NHIF Number has to be interegs");}

            //check if patient has visited before;
            $check_patient_previous_visit_query = "SELECT op_num, number_of_visits FROM ".$this->table." WHERE first_name = ? AND last_name = ? AND sex = ? AND dob = ?";
            $check_patient_params = [$this->first_name, $this->last_name, $this->sex, $this->dob];
            $check_patient_results = $this->conn->select($check_patient_previous_visit_query, $check_patient_params);
        
            if(count($errors) === 0){
                $this->op_number = generateOutPatientNumber();
                if(count($check_patient_results) > 0){
                    $this->number_of_visits = $check_patient_results[0]['number_of_visits'] + 1;
                    $update_patient_query = "UPDATE ".$this->table." SET op_num = ?,  
                        age=?, marital_status=?, phone_num=?, physical_address=?, nhif_num=?, number_of_visits=? WHERE op_num= ? ";
                    $update_patient_params = [
                        $this->op_number, $this->age, 
                        $this->status, $this->phone, 
                        $this->physical_address, 
                        $this->nhif_number, $this->number_of_visits, $check_patient_results[0]['op_num']
                    ];
                    try {
                        $this->conn->update($update_patient_query, $update_patient_params);
                    } catch (Exception $th) {
                        throw new Exception($th->getMessage());                        
                    }
                }else{
                    $query = "INSERT INTO ".$this->table." (
                        op_num, first_name,last_name,age,sex,marital_status,phone_num,physical_address,dob,nhif_num,number_of_visits ) 
                        VALUES(?,?,?,?,?,?,?,?,?,?,?)
                    ";
                    $params = [ 
                        $this->op_number, $this->first_name, $this->last_name, 
                        $this->age, $this->sex, $this->status,
                        $this->phone,$this->physical_address,$this->dob,
                        $this->nhif_number,$this->number_of_visits
                    ];
                    //:op_num, :first_name,:last_name,:age,:sex,:marital_status,:email,:phone_num,:physical_address,:dob,:nhif_num, :number_of_visits
                    try {
                        $this->conn->insert($query, $params);
                        $_SESSION['msg'] = 'Patient added to database succesfully';
                        echo "Success, patient OP number is".$this->op_number;
                    } catch (Exception $e) {
                        throw new Exception($e->getMessage());
                    }
                }  
                }else{
                echo $errors;
            }
        }
    }

    class Doctor{
        use person;
        public $table = 'doctors';

        public function __construct($database){
            $this->conn = $database;
        }

        public function add_doctor(){
            $errors = [];

            $this->department =htmlspecialchars(strip_tags($_POST['department']));
            $destination_folder = '../images/doctors/';
            //id	first_name	last_name	age	sex	status	email	phone_num	physical_address	dob	nhif_num	picture	department	kra_num	nssf_num	date_in	

            $query = "INSERT INTO ".$this->table. " (first_name, 
                last_name, age, sex, status, email, 
                phone_num, physical_address, dob, nhif_num, 
                picture, department, kra_num, nssf_num)
                VALUES (
                    :first_name,:last_name,
                    :age,:sex,:status,
                    :email,:phone_num,
                    :physical_address,:dob, 
                    :nhif_num, :picture, 
                    :department, :kra, 
                    :nssf
                )
            ";

            $params = [
                "first_name"=>$this->first_name,
                "last_name"=>$this->last_name,
                "age"=>$this->age,
                "sex"=>$this->sex,
                "status"=>$this->status,
                "email"=>$this->email,
                "phone_num"=>$this->phone,
                "physical_address"=>$this->physical_address,
                "dob"=>$this->dob,
                "nhif_num"=>$this->nhif_number,
                "picture" =>$this->picture['name'],
                "department" =>$this->department,
                "kra" =>$this->kra,
                "nssf" =>$this->nssf,
            ];

            $upload_image_return = fileUpload($this->picture, '../images/doctors/');
            
            if(is_array($upload_image_return)){
                foreach($upload_image_return as $img_error){
                    array_push($errors, $img_error);
                }
            }

            if(count($errors) === 0){
                try {
                    move_uploaded_file($this->picture['tmp_name'], $destination_folder.$upload_image_return);
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = 'Doctor added to database succesfully';
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());                    
                }
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
            //first_name	last_name	age	sex	marital_status	email	phone_num	physical_address	dob	nhif_num	picture	role	kra_num	nssf_num	date_in	
            $errors = [];
            $destination_folder = '../images/employees/';
            $this->role =htmlspecialchars(strip_tags($_POST['role']));
            $query = "INSERT INTO ".$this->table. " (
                first_name,last_name,age,
                sex,status,email,
                phone_num,physical_address,dob,
                nhif_num,picture,role,
                kra_num,nssf_num
                ) VALUES(
                :first_name,:last_name,:age,
                :sex,:status,:email,
                :phone_num,:physical_address,:dob,
                :nhif_num,:picture,:role,
                :kra_num,:nssf_num
            )";
            $params = [
                "first_name"=>$this->first_name,
                "last_name"=>$this->last_name,
                "age"=>$this->age,
                "sex"=>$this->sex,
                "status"=>$this->status,
                "email"=>$this->email,
                "phone_num"=>$this->phone,
                "physical_address"=>$this->physical_address,
                "dob"=>$this->dob,
                "nhif_num"=>$this->nhif_number,
                "picture" =>$this->picture['name'],
                "role" =>$this->role,
                "kra" =>$this->kra,
                "nssf" =>$this->nssf,
            ];

            $upload_image_return = fileUpload($this->picture, '../images/employees/');
            
            if(is_array($upload_image_return)){
                foreach($upload_image_return as $img_error){
                    array_push($errors, $img_error);
                }
            }

            if(count($errors) === 0){
                try {
                    move_uploaded_file($this->picture['tmp_name'], $destination_folder.$upload_image_return);
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = 'Doctor added to database succesfully';
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());                    
                }
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
            $errors = [];
            $this->name = htmlspecialchars(strip_tags($_POST["name"]));
            $this->hod = htmlspecialchars(strip_tags($_POST["hod"]));

            //check if department already exists
            $check_query = "SELECT name FROM ".$this->table. " WHERE name =:name";
            $results = $this->conn->select($check_query, ['name'=>$this->name]);

            if(count($results) != 0 ){
                array_push($errors, "Department already exists, choose another name");
            }

            if(count($errors) === 0){
                $select_query = "INSERT INTO ".$this->table." (name, hod) VALUES(:name, :hod)";
                $params = ["name"=>$this->name, "hod"=>$this->hod];
                try {
                    $this->conn->insert($select_query, $params);
                    $_SESSION['msg'] = 'Department added to database succesfully';
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
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
            $this->name = htmlspecialchars(strip_tags($_POST["wardname"]));
            $this->incharge = htmlspecialchars(strip_tags($_POST["incharge"]));
            $this->capacity = htmlspecialchars(strip_tags($_POST["capacity"]));
            echo $this->name;

            if(count($errors) === 0){
                $query = "INSERT INTO ".$this->table." (name, incharge, capacity) VALUES(:name, :incharge, :capacity)";
                $params = [
                    "name" => $this->name,
                    "incharge" => $this->incharge,
                    "capacity" => $this->capacity
                ];
                try {
                    $this->conn->insert($query, $params);
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }

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
            $errors = [];

            $this->supplier_id = htmlspecialchars(strip_tags($_POST['supplier_id']));
            $this->name = htmlspecialchars(strip_tags($_POST['name']));
            $this->company_name = htmlspecialchars(strip_tags($_POST['company_name']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));
            $this->email = htmlspecialchars(strip_tags($_POST['email']));
            $this->phone_num = htmlspecialchars(strip_tags($_POST['phone_number']));
            $this->physical_address = htmlspecialchars(strip_tags($_POST['p_address']));

            if(count($errors) === 0){
                $query = "INSERT INTO ".$this->table."(supplier_id, name, company_name, status, email, phone_num, physical_address)
                    VALUES(
                        :supplier_id, :name, :company_name, :status, :email, :phone_num, :physical_address
                    )
                ";
                $params = [
                    "supplier_id" => $this->supplier_id, 
                    "name" => $this->name, 
                    "company_name" => $this->company_name, 
                    "status" => $this->status, 
                    "email" => $this->email, 
                    "phone_num" => $this->phone_num, 
                    "physical_address" => $this->physical_address
                ];

                try {                    
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = "Supplier added to databse";
                    echo $_SESSION['msg'];
                } catch (Exception $e) {        
                    throw new Exception($e->getMessage());
                    
                }
            }
        }
    }

    class Expense{
        private $conn;
        private $table="expenses";
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

            if(count($errors) === 0){
                $query = "INSERT INTO ".$this->table." (name, payment_method, paid_from_account, description, amount, status, due_date)
                    VALUES(
                        :name, :payment_method, :paid_from_account, :description, :amount, :status, :due_date
                    )
                ";
                $params = [
                    ":name" => $this->name, 
                    ":payment_method" => $this->payment_method, 
                    ":paid_from_account" => $this->paid_from_account, 
                    ":description" => $this->description, 
                    ":amount" => $this->amount, 
                    ":status" => $this->status, 
                    ":due_date" => $this->due_date
                ];
                try {
                    //code...
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = "Supplier added to databse";
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    //throw $th;
                    throw new Exception($e->getMessage());
                    
                    
                }
            }

        }

        public function addExpenseCategory(){
            $errors = [];
            $this->table = 'expenses_category';
            $this->name = htmlspecialchars(strip_tags($_POST['name']));
            $this->description = htmlspecialchars(strip_tags($_POST['description']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));

            if(count($errors) === 0){
                $query = "INSERT INTO ".$this->table." (name, status, description)
                VALUES(:name, :status, :description)";
                $params = [
                    "name"=> $this->name, 
                    "status"=> $this->status, 
                    "description"=> $this->description
                ];

                try {
                    //code...
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = "Operation okay";
                } catch (Exception $e) {
                    //throw $th;
                    throw new Exception($e->getMessage());
                    
                }
            }

        }
    }

    class Drugs{
        private $conn;
        private $table=  "drugs";

        //name	category	unit_price	supplier	status
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

            $this->name = htmlspecialchars(strip_tags($_POST['name']));
            $this->category = htmlspecialchars(strip_tags($_POST['category']));
            $this->unit_price = htmlspecialchars(strip_tags($_POST['unit_price']));
            $this->supplier = htmlspecialchars(strip_tags($_POST['supplier']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));

            if(count($errors) === 0){
                $query = "INSERT INTO ".$this->table." (name, category, unit_price, supplier, status) VALUES(?, ?, ?, ?, ?)";
                $params= [$this->name, $this->category, $this->unit_price, $this->supplier, $this->status];

                try {
                    //code...
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
        private $table = "notices";

        //title	description	start_date	end_date	status
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
            $this->title = htmlspecialchars(strip_tags($_POST['title']));
            $this->description  = htmlspecialchars(strip_tags($_POST['description']));
            $this->start_date = htmlspecialchars(strip_tags($_POST['start_date']));
            $this->end_date = htmlspecialchars(strip_tags($_POST['end_date']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));

            if(count($errors) === 0){
                $query = "INSERT INTO ".$this->table." (title, description, start_date, end_date, status) VALUES(?, ?, ?, ?, ?)";
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

        // public sendMail(){

        // }
    }
?>