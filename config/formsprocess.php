<?php
    include_once("classes.php");
    $database = new Database();


    if(isset($_POST['add_patient']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_patient = new Patient($database); 
        $new_patient->attach_common_props();
        $new_patient->add();

    }



?>