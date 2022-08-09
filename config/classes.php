<?php 
    include_once('config.php');
    include_once('utilities.php');

    class Patient{
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
        public $table_name = 'patients';

        public function __construct($database){
            $this->conn = $database;
        }

        public function add_patient(){
            $errors = [];

            $this->first_name = htmlspecialchars(strip_tags($this->first_name));
            $this->last_name = htmlspecialchars(strip_tags($this->last_name));
            $this->email = filter_var($this->email, FILTER_VALIDATE_EMAIL);
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->physical_address = htmlspecialchars(strip_tags($this->physical_address));
            $this->dob = htmlspecialchars(strip_tags($this->dob));
            $this->sex = htmlspecialchars(strip_tags($this->sex));
            $this->status = htmlspecialchars(strip_tags($this->status));
            $this->nhif_number = htmlspecialchars(strip_tags($this->nhif_number));

            //check if email already exists
            

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
            
            $this->conn->insert($query, $params);
        }
        

    }

?>