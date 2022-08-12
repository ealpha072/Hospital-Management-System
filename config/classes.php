<?php 
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
            $this->first_name = htmlspecialchars(strip_tags($_POST['first_name']));
            $this->last_name = htmlspecialchars(strip_tags($_POST['last_name']));
            $this->email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $this->age = htmlspecialchars(strip_tags($_POST['age']));
            $this->phone = htmlspecialchars(strip_tags($_POST['phone']));
            $this->physical_address = htmlspecialchars(strip_tags($_POST['p_address']));
            $this->dob = htmlspecialchars(strip_tags($_POST['dob']));
            $this->sex = htmlspecialchars(strip_tags($_POST['sex']));
            $this->status = htmlspecialchars(strip_tags($_POST['status']));
            $this->nhif_number = htmlspecialchars(strip_tags($_POST['nhif']));
        }

        public function attach_common_props_employees_doctors(){
            $this->nssf = htmlspecialchars(strip_tags($_POST['nssf']));
            $this->kra = htmlspecialchars(strip_tags($_POST['kra']));
            $this->picture = $_FILES['profile_picture'];
        }
    }

    class Patient{
        use person;
        public $table_name = "patients";

        public function __construct($database){
            $this->conn = $database;
        }

        public function add(){
            $errors = [];       
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $email_error = "Invalid email format please check and correcy";
                array_push($errors, $email_error);
            }

            $query = "INSERT INTO ".$this->table_name." (
                first_name,last_name,age,sex,marital_status,email,phone_num,physical_address,dob,nhif_num

            ) VALUES(
                :first_name,:last_name,:age,:sex,:marital_status,:email,:phone_num,:physical_address,:dob,:nhif_num
            )";

            $params = [
                "first_name"=>$this->first_name,
                "last_name"=>$this->last_name,
                "age"=>$this->age,
                "sex"=>$this->sex,
                "marital_status"=>$this->status,
                "email"=>$this->email,
                "phone_num"=>$this->phone,
                "physical_address"=>$this->physical_address,
                "dob"=>$this->dob,
                "nhif_num"=>$this->nhif_number
            ];

            if(count($errors) === 0){
                try {
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = 'Patient added to database succesfully';
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                    
                }
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
?>