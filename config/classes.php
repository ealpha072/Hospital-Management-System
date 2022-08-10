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
            $this->department =htmlspecialchars(strip_tags($_POST['department']));
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
                "picture" =>$this->picture,
                "department" =>$this->department,
                "kra" =>$this->kra,
                "nssf" =>$this->nssf,
            ];

            if(count($errors) === 0){
                try {
                    $this->conn->insert($query, $params);
                    $_SESSION['msg'] = 'Doctor added to database succesfully';
                    echo $_SESSION['msg'];
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());                    
                }
            }
    
        }
    }

?>