<?php 
    require_once('config.php');

    class Paginator{
        private $conn;
        public function __construct($db){
            $this->conn = $db;
        }

        public function buildPages($table, $rows_per_page = 10, $selectColumns=['id_num', 'first_name', 'last_name', 'dob', 'phone_num'] ){
            $return_items = [];
            $total_rows = $this->conn->select("SELECT COUNT(id) FROM $table");

            // Constructing the SELECT part of the query based on the provided columns
            $columns = implode(', ', $selectColumns);

            $total_pages = ceil($total_rows[0]["COUNT(id)"]/$rows_per_page);
            $page_number = isset($_GET['page_number']) && is_numeric($_GET['page_number']) ?  (int)$_GET['page_number'] : 1 ;
            $page_number = $page_number > $total_pages ? $total_pages : $page_number;
            $page_number = $page_number < 1 ? 1 : $page_number;

            $rows_to_skip = ($page_number - 1) * $rows_per_page; //20
            $query = "SELECT  $columns FROM $table LIMIT $rows_per_page OFFSET $rows_to_skip";

            try {
                //code...
                $results = $this->conn->select($query);
                array_push($return_items, $total_pages, $results);
            } catch (Exception $e) {
                //throw $th;
                throw new Exception($e->getMessage());
            }
            return $return_items;
        }
    }
?>