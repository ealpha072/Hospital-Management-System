<?php
    include_once("classes.php");
    $database = new Database();

    if (isset($_SESSION)) {
        echo "A session is active.";
    } else {
        echo "No session is active.";
    }

    if(isset($_POST['add_patient']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_patient = new Patient($database);
        $new_patient->attach_common_props();
        $message = $new_patient->add();
        unset($_SESSION['msg']);

        $_SESSION['msg'] = $message;
        header('Location: ../pages/patients.php?patient_page=add');
    }

    if(isset($_POST['admit_patient']) && $_SERVER['REQUEST_METHOD'] === 'POST' ){
        $new_patient = new Patient($database);
        $new_patient->attach_admission_props();
        $message = $new_patient->admit();

        unset($_SESSION['msg']);
        $_SESSION['msg'] = $message;
        //add header
        header('Location: ../pages/patients.php?patient_page=add');
    }

    if(isset($_POST['add_staff']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_employee = new Employee($database);
        $new_employee->attach_common_props();
        $new_employee->attach_common_props_employees_doctors();
        $message = $new_employee->addEmployee();

        unset($_SESSION['msg']);
        $_SESSION['msg'] = $message;
        header('Location: ../pages/add_staff.php');
    }

    if(isset($_POST['add_department']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_department = new Department($database); 
        $new_department->createDepartment();
    }

    if(isset($_POST['add_ward']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_ward = new Ward($database); 
        $message = $new_ward->addWard();
        unset($_SESSION['msg']);

        $_SESSION['msg'] = $message;
        header('Location: ../pages/add_ward.php');
    }

    if(isset($_POST['add_supplier']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_supplier = new Supplier($database); 
        $new_supplier->addSupplier();
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