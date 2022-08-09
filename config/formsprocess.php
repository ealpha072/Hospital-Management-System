<?php
    include_once("classes.php");
    $database = new Database();


    if(isset($_POST['add_patient']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_patient = new Patient($database); 

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $p_address = $_POST['p_address'];
        $dob = $_POST['dob'];
        $sex = $_POST['sex'];
        $status = $_POST['status'];
        $nhif = $_POST['nhif'];
        
        $new_patient->first_name = $first_name;
        $new_patient->last_name = $last_name;
        $new_patient->email = $email;
        $new_patient->age = $age;
        $new_patient->phone = $phone;
        $new_patient->physical_address = $p_address;
        $new_patient->dob = $dob;
        $new_patient->sex = $sex;
        $new_patient->status = $status;
        $new_patient->nhif_number = $nhif;

        $new_patient->add_patient();

    }



?>