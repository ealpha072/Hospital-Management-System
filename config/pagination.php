<?php 
    require_once('config.php');

    class Paginator{
        private $conn;
        public function __construct($db){
            $this->conn = $db;
        }

        public function buildPages($table, $rows_per_page = 10){
            $return_items = [];
            $total_rows = $this->conn->select("SELECT COUNT(id) FROM $table");

            $total_pages = ceil($total_rows[0]["COUNT(id)"]/$rows_per_page);
            $page_number = isset($_GET['page_number']) && is_numeric($_GET['page_number']) ?  (int)$_GET['page_number'] : 1 ;
            $page_number = $page_number > $total_pages ? $total_pages : $page_number;
            $page_number = $page_number < 1 ? 1 : $page_number;

            $rows_to_skip = ($page_number - 1) * $rows_per_page; //20
            $query = "SELECT id, first_name FROM $table LIMIT $rows_per_page OFFSET $rows_to_skip";

            try {
                //code...
                $results = $this->conn->select($query);
                array_push($return_items, $total_pages, $results);
            } catch (Exception $e) {
                //throw $th;
                throw new Exception($e->getMessage());
            }
            return $return_items;
            // for ($i=0; $i < count($results); $i++) { 
            //     # code...
            //     echo $results[$i]['first_name'];
            //     echo '<br>';
            // }
            // for ($i=1; $i <= $total_pages ; $i++) { 
            //     # code...
            //     echo '<a class = "page-link" href = "'.$_SERVER['PHP_SELF'].'?page_number='.$i.'" >'.$i.'</a>';
            // }
        }
        
    } 
 
    // if ($current_page > 1) {
    //     // show << link to go back to page 1
    //     echo " <a href='{$_SERVER['PHP_SELF']}?current_page=1'><<</a> ";
    //     // get previous page num
    //     $prevpage = $currentpage - 1;
    //     // show < link to go back to 1 page
    //     echo " <a href='{$_SERVER['PHP_SELF']}?current_page=$prevpage'><</a> ";
    // }
    
    
?> 