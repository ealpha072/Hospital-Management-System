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

            //check if dpt already exists
            $check_query = "SELECT name FROM ".$this->table. " WHERE name=:name";
            $results = $this->conn->select($check_query, ['name'=>$this->name]);

            if(count($results) != 0 ){
                array_push($errors, "Department already exists, choose another name");
            }

            if(count($errors) === 0){
                $select_query = "INSERT INTO ".$this->table." (name, hod) VALUES(:name, :hod)";
                $params = ["name"=>$this->name, "hod"=>$this->hod];
                try {
                    $this->conn->insert($select_query, $params);
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }



        }

    }
    
?>