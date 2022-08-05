<?php 
    include_once('config.php');

    class Person{
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

        public function __construct($db){
            $this->conn = $db;
        }

        public function register(){
            
        }
        

    }

?>