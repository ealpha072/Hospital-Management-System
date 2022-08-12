<?php
    include_once("classes.php");
    $database = new Database();

    if(isset($_POST['add_patient']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_patient = new Patient($database); 
        $new_patient->attach_common_props();
        $new_patient->add();
    }

    if(isset($_POST['add_doctor']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_doctor = new Doctor($database); 
        $new_doctor->attach_common_props();
        $new_doctor->attach_common_props_employees_doctors();
        $new_doctor->add_doctor();
    }

    if(isset($_POST['add_employee']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_employee = new Employee($database); 
        $new_employee->attach_common_props();
        $new_employee->attach_common_props_employees_doctors();
        $new_employee->addEmployee();
    }




?>