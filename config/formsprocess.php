<?php

    include_once("classes.php");
    $database = new Database();

    if (isset($_SESSION)) {
        echo "A session is active.";
    } else {
        echo "No session is active.";
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!($username === 'Alpha' && $password === 'Alpha')){
            $message = 'Invalid username or password, please try again';
            unset($_SESSION['msg']);
            $_SESSION['msg'] = [$message, 'Error'];
        }else{
            $message = 'Taking you to home screen, please wait';
            unset($_SESSION['msg']);
            $_SESSION['msg'] = [$message, 'Success'];
            header('Location: ../pages/login.php');
        }

    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_patient'])){
        $new_patient = new Patient($database);
        $new_patient->attach_common_props();
        $message = $new_patient->add();

        unset($_SESSION['msg']);
        $_SESSION['msg'] = $message;
        header('Location: ../pages/patients.php?patient_page=add');
    }

    if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admit_patient']) ){
        $new_patient = new Patient($database);
        $new_patient->attach_admission_props();
        $message = $new_patient->admit();

        unset($_SESSION['msg']);
        $_SESSION['msg'] = $message;
        //add header
        header('Location: ../pages/patients.php?patient_page=add');
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_ip']) ){
        echo $_POST['ip_number'];
        $patient = new Patient($database);
        $results = $patient-> findPatient($_POST['ip_number']);
        echo var_dump($results);

        unset($_SESSION['mdl']);
        $_SESSION['mdl'] = $results[0];
        echo var_dump($_SESSION['mdl']);
        header('Location: ../pages/bill_patient.php');
    }

    if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_staff']) ){
        $new_employee = new Employee($database);
        $new_employee->attach_common_props();
        $new_employee->attach_common_props_employees_doctors();
        $message = $new_employee->addEmployee();

        unset($_SESSION['msg']);
        $_SESSION['msg'] = $message;
        header('Location: ../pages/staff.php?staff_page=add');
    }

    if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_department']) ){
        $new_department = new Department($database); 
        $msg = $new_department->createDepartment();

        unset($_SESSION['msg']);
        $_SESSION['msg'] = $msg;
        header('Location: ../pages/depts.php?depts_page=add');
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_ward']) ){
        $new_ward = new Ward($database); 
        $message = $new_ward->addWard();
        
        unset($_SESSION['msg']);
        $_SESSION['msg'] = $message;
        header('Location: ../pages/ward.php?ward_page=add');
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_service']) ){
        $new_service = new Services($database); 
        $message = $new_service->addService();
        
        unset($_SESSION['msg']);
        $_SESSION['msg'] = $message;
        header('Location: ../pages/services.php?services_page=add');
    }

    //FIX REQUEST METHOD BEFORE POST

    if( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_supplier']) ){
        $new_supplier = new Supplier($database); 
        $message = $new_supplier->addSupplier();

        unset($_SESSION['msg']);
        $_SESSION['msg'] = $message;
        header('Location: ../pages/suppliers.php?suppliers_page=add');
    }

    if(isset($_POST['add_expense']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_expense = new Expense($database);
        $new_expense->addExpense();
    }

    //add_expensecategory
    if(isset($_POST['add_expensecategory']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_expenseCategory = new Expense($database);
        $new_expenseCategory->addExpenseCategory();
    }

    if(isset($_POST['add_drug']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_drug = new Drugs($database);
        $new_drug->addDrug();
    }

    if(isset($_POST['add_notice']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_notice = new Notices($database);
        $new_notice->addNotice();
    }

    //send_message
    if(isset($_POST['send_message']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_message = new Message($database);
        $new_message->addMessage();
    }

?>