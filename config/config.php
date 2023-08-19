<?php 
 //session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    class Database{
        //Heroku creds
        // public $host       = "us-cdbr-east-06.cleardb.net";
        // public $username   = "b9e5bb4b4835e3";
        // public $password   = "5719819c";
        // public $dbname     = "heroku_bece3e49d0c6d9b";
        //local creds
        public $host       = "localhost";
        public $username   = "root";
        public $password   = "";
        public $dbname     = "hospital_db";
        private $conn;

        public function __construct(){
            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
                echo "Connected successfully".'<br>';
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function executeStatement($statement="", $params=[]){
            try {
                $stmt = $this->conn->prepare($statement);
                $stmt->execute($params);
                return $stmt;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
                echo "Not executing";
            }
        }

        public function insert($statement = "", $params = []){
            try {
                $this->executeStatement($statement, $params);
                return $this->conn->lastInsertId();
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public function select($statement = "", $params = []){
            try {
                $results = $this->executeStatement($statement, $params);
                return $results->fetchAll();
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public function update($statement = "", $params=[]){
            try {
                $this->executeStatement($statement, $params);
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
        
        public function remove($statement = "", $params=[]){
            try {
                $this->executeStatement($statement, $params);
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
?> 