<?php 
session_start();

class Database{
    private $host = "";
    private $dbname = "";
    private $username = "";
    private $password = "";
    public $conn;

    public function getConn(){
        if($_SERVER['HTTP_HOST']=== 'localhost'){
            $host = "";
            $dbname = "";
            $username = "";
            $password =  "";
            try {
                //code...
                $this->conn = new PDO("mysql:host={$this->host};{$this->dbname};{$this->username};{$this->password}");
            } catch (Exception $e) {
                //throw $th;
                throw new Exception (($e->getMessage()));
            }

            return $this->conn;
        }
    }

}



?>