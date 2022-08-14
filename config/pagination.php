<?php 
    require_once('config.php');

    $database = new Database();
    $number_of_items = $database->select('SELECT COUNT(id) FROM patients');
    $rows_per_page = 10;
    $total_pages = ceil($number_of_items[0]['COUNT(id)'] / $rows_per_page);

    $current_page = isset($_GET['current_page']) && is_numeric($_GET['current_page']) ? (int)$_GET['current_page'] : 1 ;
    $current_page = $current_page > $total_pages ? $total_pages : $current_page;
    $current_page = $current_page < 1 ? 1 : $current_page;

    $offset = ($current_page - 1) * $rows_per_page;
    $query = "SELECT * FROM patients LIMIT $offset, $rows_per_page";
    $patients = $database->select($query);

    if ($current_page > 1) {
        // show << link to go back to page 1
        echo " <a href='{$_SERVER['PHP_SELF']}?current_page=1'><<</a> ";
        // get previous page num
        $prevpage = $currentpage - 1;
        // show < link to go back to 1 page
        echo " <a href='{$_SERVER['PHP_SELF']}?current_page=$prevpage'><</a> ";
    }
    
    
?> 