<?php

include_once 'config.php';
//use function PHPSTORM_META\type;

include_once('utilities.php');

class Validate
{
    public function validateNames($first_name, $last_name, $errors_array = [])
    {
        if (empty($first_name) || empty($last_name)) {
            array_push($errors_array, "Names cant be empty");
        }
        if (preg_match('/\s/', $first_name) || preg_match('/\s/', $last_name)) {
            array_push($errors_array, "No spaces allowed in first or last name");
        }
        if (preg_match('~[0-9]+~', $first_name) || preg_match('~[0-9]+~', $last_name)) {
            array_push($errors_array, "Name can't contain numeric characters");
        }

        return $errors_array;
    }

    public function validateEmail($email, $errors_array = [])
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors_array, "Invalid email formart, try again");
        }
        return $errors_array;
    }

    public function validateAddress($address, $errors_array = [])
    {
        $address_condition = [];

        //check address, we break then check for spaces because ctype_alpha considers white space non alphabetic
        if (preg_match('/\s/', $address)) {
            $address_array = explode(" ", $address);
            foreach ($address_array as $single_address) {
                $is_all_alphabetical = ctype_alpha($single_address) ? "True" : "False";
                array_push($address_condition, $is_all_alphabetical);
            }
        } else {
            $is_all_alphabetical = ctype_alpha($address) ? "True" : "False";
            array_push($address_condition, $is_all_alphabetical);
        }

        if (in_array("False", $address_condition)) {
            array_push($errors_array, "Physical address cant contain numbers");
        }
        return $errors_array;
    }

    public function validatePhoneNumber($phone, $errors_array = [])
    {
        if (empty($phone)) {
            array_push($errors_array, "Phone number cant be empty");
        }
        return $errors_array;
    }

    public function validateNextofKinName($name, $errors_array = [])
    {
        if (empty($name)) {
            array_push($errors_array, "Next of kin cannot be empty");
        }
    }

    public function validatePassword($password, $error_array = [])
    {
        // Define a regular expression pattern for password validation
        // Minimum length requirement
        $minLength = 8;

        // Check if the password meets the minimum length requirement
        if (strlen($password) < $minLength) {
            array_push($error_array, "Password must be 8 characters long");
        }

        // Check for at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            array_push($error_array, "Password must contain one uppercase letter");
        }

        // Check for at least one lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            array_push($error_array, "Password must contain one lowercase letter");
        }

        // Check for at least one digit
        if (!preg_match('/\d/', $password)) {
            array_push($error_array, "Password must contain one digit letter");
        }

        // Check for at least one special character (you can customize this based on your requirements)
        if (!preg_match('/[^a-zA-Z\d]/', $password)) {
            array_push($error_array, "Password must contain one special character");
        }
    }
}

trait person
{
    private $conn;
    public $first_name = "";
    public $last_name = "";
    public $email = "";
    public $phone = "";
    public $physical_address = "";
    public $dob = "";
    public $sex = "";
    public $status = "";
    public $nhif_number = "";
    public $id_num = "";

    //admission parameters
    public $ip_number = "";
    public $adm_ward = "";
    public $next_of_kin = "";
    public $kin_rlshp = "";
    public $kin_telephone = "";

    //employee parameters
    public $department = "";
    public $job_title = "";

    public function attach_common_props()
    {
        $this->first_name = strtolower(htmlspecialchars(strip_tags(ucfirst($_POST['first_name']))));
        $this->last_name = strtolower(ucfirst(htmlspecialchars(strip_tags($_POST['last_name']))));
        $this->id_num = (int)htmlspecialchars(strip_tags($_POST['id_num']));
        $this->phone = htmlspecialchars(strip_tags($_POST['phone']));
        $this->physical_address = strtolower(ucfirst(htmlspecialchars(strip_tags($_POST['p_address']))));
        $this->dob = htmlspecialchars(strip_tags($_POST['dob']));
        $this->sex = htmlspecialchars(strip_tags($_POST['sex']));
    }

    public function attach_admission_props()
    {
        $this->adm_ward = strtolower(htmlspecialchars(strip_tags(ucfirst($_POST['ward_name']))));
        $this->bed_number = strtolower(htmlspecialchars(strip_tags(ucfirst($_POST['bed_number']))));
        $this->next_of_kin = strtolower(htmlspecialchars(strip_tags(ucfirst($_POST['next_of_kin']))));
        $this->kin_rlshp = strtolower(htmlspecialchars(strip_tags(ucfirst($_POST['relationship']))));
        $this->kin_telephone = strtolower(htmlspecialchars(strip_tags(ucfirst($_POST['kin_phone']))));
        $this->id_num = (int)htmlspecialchars(strip_tags($_POST['patient_id']));
    }

    public function attach_common_props_employees_doctors()
    {
        $this->email = strtolower($_POST['email']);
        $this->job_title = htmlspecialchars(strip_tags($_POST['job_title']));
        $this->department = htmlspecialchars(strip_tags($_POST['department']));
        $this->nhif_number = null;
    }
}

class Patient
{
    use person;
    public $op_number = "";
    public $ip_number = "";

    private $table = "patients";
    public $number_of_visits = 0;

    public function __construct($database)
    {
        $this->conn = $database;
    }

    public function add()
    {
        $this->nhif_number = (int)htmlspecialchars(strip_tags($_POST['nhif']));
        //variables
        $all_errors = [];

        //validation
        $new_validation = new Validate();
        $name_error = $new_validation->validateNames($this->first_name, $this->last_name, []);
        $phone_error = $new_validation->validatePhoneNumber($this->phone, []);
        $address_error = $new_validation->validateAddress($this->physical_address, []);
        $all_errors = array_merge($name_error, $phone_error, $address_error);

        //check if patient has visited before;
        $check_patient_previous_visit_query = "SELECT id_num, number_of_visits FROM " . $this->table . " WHERE id_num = ? ";
        $check_patient_params = [$this->id_num];
        $check_patient_results = $this->conn->select($check_patient_previous_visit_query, $check_patient_params);

        //push to database
        if (count($all_errors) === 0) {
            $this->op_number = generateOutPatientNumber();
            //for returning patients
            if (count($check_patient_results) > 0) {
                $this->number_of_visits = $check_patient_results[0]['number_of_visits'] + 1;
                $update_patient_query = "UPDATE " . $this->table . " SET 
                        op_num = ?, 
                        phone_num=?, 
                        physical_address=?, 
                        nhif_num=?, 
                        number_of_visits=? WHERE id_num = ? ";
                $update_patient_params = [
                    $this->op_number,
                    $this->phone,
                    $this->physical_address,
                    $this->nhif_number,
                    $this->number_of_visits,
                    $check_patient_results[0]['id_num']
                ];
                try {
                    $this->conn->update($update_patient_query, $update_patient_params);
                } catch (Exception $th) {
                    throw new Exception($th->getMessage());
                }
            } else {
                //for first time patients
                //if error, check insert statment
                $query = "INSERT INTO " . $this->table . " (id_num, op_num, first_name, last_name, sex, phone_num, physical_address, dob, nhif_num) 
                        VALUES(?,?,?,?,?,?,?,?,?)
                    ";
                $params = [
                    $this->id_num,
                    $this->op_number,
                    $this->first_name,
                    $this->last_name,
                    $this->sex,
                    $this->phone,
                    $this->physical_address,
                    $this->dob,
                    $this->nhif_number
                ];

                try {
                    $this->conn->insert($query, $params);
                    unset($_SESSION['msg']);
                    $msg = 'Patient added to database succesfully. Patient OP number is ' . $this->op_number;
                    return [$msg, 'Success'];
                    //header('Location: ../pages/patients.php?patient_page=add');
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }
        } else {
            //print_r($all_errors);
            return [$all_errors, 'Error'];
        }
    }

    public function admit()
    {
        $all_errors = [];

        //validation
        $validation = new Validate();
        $phone_error = $validation->validatePhoneNumber($this->kin_telephone, []);

        $all_errors = array_merge($phone_error);

        if (count($all_errors) === 0) {
            //generaate ip_number
            $this->ip_number = generateOutPatientNumber();

            $update_patient_query = "UPDATE " . $this->table . " SET 
                    ip_number=?, 
                    adm_ward = ?, 
                    next_of_kin=?, 
                    kin_rlshp=?,
                    kin_telephone=?
                    WHERE id_num = ? ";

            $update_patient_params = [
                $this->ip_number,
                $this->adm_ward,
                $this->next_of_kin,
                $this->kin_rlshp,
                $this->kin_telephone,
                $this->id_num
            ];

            try {
                $this->conn->update($update_patient_query, $update_patient_params);
                $msg = 'Patient admitted successfully, IP no is ' . $this->ip_number;
                return [$msg, 'Success'];
            } catch (Exception $th) {
                throw new Exception($th->getMessage());
            }
        } else {
            print_r($all_errors);
            return [$all_errors, 'Error'];
        }
    }

    public function findPatient($ip_number)
    {
        $all_error = [];

        //check if ip number is in database
        $query = "SELECT * FROM " . $this->table . " WHERE ip_number=?";
        $params = [$ip_number];

        try {
            //code...
            $results = $this->conn->select($query, $params);
            return [$results, 'Success'];
        } catch (\Throwable $th) {
            //throw $th;
            throw new Exception("Error Processing Request", 1);
        }
    }
}

class Employee
{
    use person;
    public $table = "employees";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addEmployee()
    {
        //variables
        $all_errors = [];

        //validations
        $new_validation = new Validate();
        $name_error = $new_validation->validateNames($this->first_name, $this->last_name);
        $email_error = $new_validation->validateEmail($this->email);
        $phone_error = $new_validation->validatePhoneNumber($this->phone);
        $address_error = $new_validation->validateAddress($this->physical_address);
        $all_errors = array_merge($name_error, $email_error, $phone_error, $address_error);

        //check if names exists
        $check_query = "SELECT first_name FROM " . $this->table . " WHERE first_name =? AND last_name = ?";
        $check_params = [$this->first_name, $this->last_name];
        $results = $this->conn->select($check_query, $check_params);
        if (count($results) > 0) {
            array_push($all_errors, "Name of employee already exists");
        }

        //push to database
        if (count($all_errors) === 0) {
            $query = "INSERT INTO " . $this->table . " ( id_num,first_name,last_name, sex,email,
					phone_num,physical_address,dob,job_title, department
					) VALUES(?,?,?,?,?,?,?,?,?,?)
				";
            $params = [
                $this->id_num,
                $this->first_name,
                $this->last_name,
                $this->sex,
                $this->email,
                $this->phone,
                $this->physical_address,
                $this->dob,
                $this->job_title,
                $this->department
            ];
            try {
                $this->conn->insert($query, $params);
                return ['Staff added to database succesfully', 'Success'];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            //$_SESSION['error'] = 'Please fix below errors';
            //print_r($all_errors);
            return [$all_errors, 'Error'];
        }
    }
}

class Department
{
    private $conn;
    public $table = 'departments';
    public $name = "";
    public $hod = "";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createDepartment()
    {
        //variables
        $all_errors = [];
        $this->name = htmlspecialchars(strip_tags($_POST["dpt_name"]));
        $this->hod = htmlspecialchars(strip_tags($_POST["hod"]));

        //check if department already exists
        $check_query = "SELECT name FROM " . $this->table . " WHERE name = :name";
        $results = $this->conn->select($check_query, ['name' => $this->name]);

        if (count($results) != 0) {
            array_push($all_errors, "Department already exists, choose another name");
        }

        if (count($all_errors) === 0) {
            $select_query = "INSERT INTO " . $this->table . " (name, hod) VALUES(?,?)";
            $params = [$this->name, $this->hod];
            try {
                $this->conn->insert($select_query, $params);
                $msg = 'Department added to database succesfully!!';
                return [$msg, 'Success'];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return [$all_errors, 'Error'];
        }
    }

    public function getDepartments()
    {
        $departments = $this->conn->select('SELECT name, hod FROM departments');
        return $departments;
    }
}

class Ward
{
    private $conn;
    private $table = 'wards';
    public $name = "";
    public $incharge = "";
    public $capacity = "";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addWard()
    {
        $all_errors = [];
        $this->name = strtolower(htmlspecialchars(strip_tags($_POST["wardname"])));
        $this->incharge = htmlspecialchars(strip_tags($_POST["incharge"]));
        $this->capacity = (int)htmlspecialchars(strip_tags($_POST["capacity"]));

        //check if name exists
        $check_query = "SELECT name FROM " . $this->table . " WHERE name = ?";
        $check_params = [$this->name];
        $results = $this->conn->select($check_query, $check_params);
        if (count($results) > 0) {
            array_push($all_errors, "Ward name already exists");
        }

        if (count($all_errors) === 0) {
            $query = "INSERT INTO " . $this->table . " (name, incharge, capacity) VALUES(?,?,?)";
            $params = [$this->name, $this->incharge, $this->capacity];
            try {
                $this->conn->insert($query, $params);
                $msg = ucfirst($this->name) . ' ward added successfully';
                return [$msg, 'Success'];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return [$all_errors, 'Error'];
        }
    }

    public function getWards()
    {
        $wards = $this->conn->select('SELECT name, capacity FROM wards');
        return $wards;
    }
}

class Services
{
    private $conn;
    private $table = 'services';
    public $servicename = "";
    public $department = "";
    public $unitcharge = "";
    public $description = "";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addService()
    {
        $all_errors = [];
        $this->servicename = strtolower(htmlspecialchars(strip_tags($_POST["servicename"])));
        $this->department = htmlspecialchars(strip_tags($_POST["department"]));
        $this->unitcharge = (int)htmlspecialchars(strip_tags($_POST["unitcharge"]));
        $this->description = strtolower(htmlspecialchars(strip_tags($_POST["description"])));

        //check if name exists
        $check_query = "SELECT name FROM " . $this->table . " WHERE name = ?";
        $check_params = [$this->servicename];
        $results = $this->conn->select($check_query, $check_params);
        if (count($results) > 0) {
            array_push($all_errors, "Billable service already exists exists");
        }

        if (count($all_errors) === 0) {
            $query = "INSERT INTO " . $this->table . " (name, department, unit_charge, description) VALUES(?,?,?,?)";
            $params = [$this->servicename, $this->department, $this->unitcharge, $this->description];
            try {
                $this->conn->insert($query, $params);
                $msg = ucfirst($this->servicename) . ' service added successfully under ' . ucfirst($this->department) . ' department';
                return [$msg, 'Success'];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return [$all_errors, 'Error'];
        }
    }
}

class Supplier
{
    //supplier_id,name,company_name,status,email,phone_num,physical_address
    private $conn;
    private $table = 'suppliers';

    public $supplier_id = "";
    public $name = "";
    public $company_name = "";
    public $status = "";
    public $email = "";
    public $phone_num = "";
    public $physical_address = "";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addSupplier()
    {
        $all_errors = [];

        $this->supplier_id = htmlspecialchars(strip_tags($_POST['supplier_id']));
        $this->name = strtolower(htmlspecialchars(strip_tags($_POST['name'])));
        $this->company_name = strtoupper(htmlspecialchars(strip_tags($_POST['company_name'])));
        $this->status = htmlspecialchars(strip_tags($_POST['status']));
        $this->email = htmlspecialchars(strip_tags($_POST['email']));
        $this->phone_num = htmlspecialchars(strip_tags($_POST['phone_number']));
        $this->physical_address = htmlspecialchars(strip_tags($_POST['p_address']));

        //validation
        $new_validation = new Validate();
        $email_error = $new_validation->validateEmail($this->email);
        $address_error = $new_validation->validateAddress($this->physical_address);
        $phone_error = $new_validation->validatePhoneNumber($this->phone_num);
        $all_errors = array_merge($email_error, $address_error, $phone_error);

        //check if supplier exists (company name)
        $check_query = "SELECT company_name FROM " . $this->table . " WHERE company_name = ?";
        $check_params = [$this->company_name];
        $results = $this->conn->select($check_query, $check_params);
        if (count($results) > 0) {
            array_push($all_errors, "Supplier already exists");
        }

        if (count($all_errors) === 0) {
            $query = "INSERT INTO " . $this->table . "(supplier_id, name, company_name, status, email, phone_num, physical_address) VALUES (?,?,?,?,?,?,?)";
            $params = [
                $this->supplier_id,
                $this->name,
                $this->company_name,
                $this->status,
                $this->email,
                $this->phone_num,
                $this->physical_address
            ];

            try {
                $this->conn->insert($query, $params);
                $msg = ucwords($this->name) . ' added to supplier database successfully';
                return [$msg, "Success"];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            print_r($all_errors);
        }
    }
}

class Expense
{
    private $conn;
    //name	payment_method	paid_from_account	description	amount	status	due_date
    public $name = "";
    public $payment_method = "";
    public $paid_from_account = "";
    public $description = "";
    public $amount = "";
    public $status = "";
    public $due_date = "";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addExpense()
    {
        $errors = [];

        $this->name = htmlspecialchars(strip_tags($_POST['name']));
        $this->payment_method = htmlspecialchars(strip_tags($_POST['payment_method']));
        $this->paid_from_account = htmlspecialchars(strip_tags($_POST['paid_from_account']));
        $this->description = htmlspecialchars(strip_tags($_POST['description']));
        $this->amount = htmlspecialchars(strip_tags($_POST['amount']));
        $this->status = htmlspecialchars(strip_tags($_POST['status']));
        $this->due_date = htmlspecialchars(strip_tags($_POST['due_date']));

        //CHECKS if status is not paid, due date is compulsory
        if ($this->status === "Not Paid" and empty($this->due_date)) {
            array_push($errors, "Expenses not paid must have due date");
        }

        if ($this->status === 'Paid' and !empty($this->due_date)) {
            array_push($errors, "Paid expenses cant have due dates");
        }

        if (count($errors) === 0) {
            $query = "INSERT INTO expenses (name, payment_method, paid_from_account, description, amount, status, due_date) VALUES (?,?,?,?,?,?,?)";
            $params = [
                $this->name, $this->payment_method,
                $this->paid_from_account, $this->description, $this->amount, $this->status, $this->due_date
            ];

            try {
                $this->conn->insert($query, $params);
                $_SESSION['msg'] = "Expense " . $this->name . " added to database";
                echo $_SESSION['msg'];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            print_r($errors);
        }
    }

    public function addExpenseCategory()
    {
        $all_errors = [];
        //$this->table = 'expenses_category';
        $this->name = strtolower(htmlspecialchars(strip_tags($_POST['name'])));
        $this->description = htmlspecialchars(strip_tags($_POST['description']));
        $this->status = htmlspecialchars(strip_tags($_POST['status']));

        //check if category exists
        $check_query = "SELECT name FROM expenses_category WHERE name = ?";
        $check_params = [$this->name];
        $results = $this->conn->select($check_query, $check_params);
        if (count($results) > 0) {
            array_push($all_errors, "Expense category already exists");
        }

        if (count($all_errors) === 0) {
            $query = "INSERT INTO expenses_category (name, status, description) VALUES (?,?,?)";
            $params = [$this->name, $this->status, $this->description];

            try {
                $this->conn->insert($query, $params);
                $_SESSION['msg'] = "Operation okay";
                echo $_SESSION['msg'];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            print_r($all_errors);
        }
    }
}

class Drugs
{
    private $conn;
    public $name = "";
    public $category = "";
    public $unit_price = "";
    public $supplier = "";
    public $status = "";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addDrug()
    {
        $errors = [];

        $this->name = strtolower(htmlspecialchars(strip_tags($_POST['name'])));
        $this->category = htmlspecialchars(strip_tags($_POST['category']));
        $this->unit_price = htmlspecialchars(strip_tags($_POST['unit_price']));
        $this->supplier = htmlspecialchars(strip_tags($_POST['supplier']));
        $this->status = htmlspecialchars(strip_tags($_POST['status']));

        //check if name exists
        $check_query = "SELECT name FROM drugs WHERE name = ?";
        $check_params = [$this->name];
        $results = $this->conn->select($check_query, $check_params);
        if (count($results) > 0) {
            array_push($errors, "Drug already exists");
        }

        if (count($errors) === 0) {
            $query = "INSERT INTO drugs (name, category, unit_price, supplier, status) VALUES(?, ?, ?, ?, ?)";
            $params = [$this->name, $this->category, $this->unit_price, $this->supplier, $this->status];

            try {
                $this->conn->insert($query, $params);
                $_SESSION['msg'] = "Drug added";
                echo $_SESSION['msg'];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
}

class Notices
{
    private $conn;

    public $title = "";
    public $description  = "";
    public $start_date = "";
    public $end_date = "";
    public $status = "";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addNotice()
    {
        $errors = [];
        $this->title = strtolower(htmlspecialchars(strip_tags($_POST['title'])));
        $this->description  = htmlspecialchars(strip_tags($_POST['description']));
        $this->start_date = htmlspecialchars(strip_tags($_POST['start_date']));
        $this->end_date = htmlspecialchars(strip_tags($_POST['end_date']));
        $this->status = htmlspecialchars(strip_tags($_POST['status']));

        //check that end date is grater than start date
        if ($this->end_date < $this->start_date) {
            array_push($errors, "Start date cant be grater than end date");
        }

        if (count($errors) === 0) {
            $query = "INSERT INTO notices (title, description, start_date, end_date, status) VALUES(?, ?, ?, ?, ?)";
            $params = [$this->title, $this->description, $this->start_date, $this->end_date, $this->status];

            try {
                $this->conn->insert($query, $params);
                $_SESSION['msg'] = 'Notice added';
                echo $_SESSION['msg'];
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
}

class Message
{
    private $conn;
    private $table = "messages";

    //subject, to_email,cc_email,from_email,body,attachments
    public $subject = "";
    public $to_email = "";
    public $cc_email = "";
    public $from_email = "";
    public $body = "";
    public $attachment = "";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addMessage()
    {
        $errors = [];
        $this->subject = htmlspecialchars(strip_tags($_POST['subject']));
        $this->to_email = htmlspecialchars(strip_tags($_POST['to_email']));
        $this->cc_email = htmlspecialchars(strip_tags($_POST['cc_email']));
        $this->from_email = htmlspecialchars(strip_tags($_POST['from_email']));
        $this->body = htmlspecialchars(strip_tags($_POST['body']));
        $this->attachment = $_FILES['attachments'];
        $this->attachment = $_FILES['attachments'];
        $total_file_count = count($this->attachment['name']);

        if (count($errors) === 0) {
            $file_names = [];
            for ($i = 0; $i < $total_file_count; $i++) {
                array_push($file_names, $this->attachment['name'][$i]);
            }

            $all_attachements_to_string = $total_file_count === 0 ? " " : implode(",", $file_names);
            $query = "INSERT INTO " . $this->table . " (subject, to_email, cc_email, from_email, body, attachments) VALUES(?, ?, ?, ?, ?, ?)";
            $params = [$this->subject, $this->to_email, $this->cc_email, $this->from_email, $this->body, $all_attachements_to_string];
            try {
                //code...
                $this->conn->insert($query, $params);

                for ($i = 0; $i < $total_file_count; $i++) {
                    $tmpFilePath = $this->attachment['tmp_name'][$i];
                    $newFilePath = "../Attachments/" . $this->attachment['name'][$i];
                    move_uploaded_file($tmpFilePath, $newFilePath);
                }
                echo "Everything okay";
            } catch (Exception $e) {
                //throw $th;
                throw new Exception($e->getMessage());
            }
        }
    }
}

class settings
{
    private $conn;
    private $table = "settings";

    //subject, to_email,cc_email,from_email,body,attachments
    public $user_name = "";
    public $database_password = "";
    public $old_password = "";
    public $new_password = "";
    public $confirm_new_password = "";
    public $admin_email = "";
    public $hosp_name = "";
    public $hosp_email = "";
    public $hosp_vision = "";
    public $hosp_mission = "";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function updateHospitalSettings()
    {
        $all_errors = [];

        $this->hosp_name = htmlspecialchars(strip_tags($_POST('')));
        $this->hosp_email = htmlspecialchars(strip_tags($_POST('')));
        $this->hosp_vision = htmlspecialchars(strip_tags($_POST('')));
        $this->hosp_mission = htmlspecialchars(strip_tags($_POST('')));

        $new_validation = new Validate();
        $email_error = $new_validation->validateEmail($this->hosp_email, $all_errors);
        array_merge($all_errors, $email_error);

        if (count($all_errors) === 0) {

            $update_settings_query = "UPDATE " . $this->table . " SET 
                    hosp_name=?, 
                    hosp_email = ?, 
                    hosp_vision=?, 
                    hosp_mission=?";

            $update_settings_params = [
                $this->hosp_name,
                $this->hosp_email,
                $this->hosp_vision,
                $this->hosp_mission
            ];

            try {
                $this->conn->update($update_settings_query, $update_settings_params);
                $msg = 'Successfully updated user settings';
                return [$msg, 'Success'];
            } catch (Exception $th) {
                throw new Exception($th->getMessage());
            }
        } else {
            print_r($all_errors);
            return [$all_errors, 'Error'];
        }
    }

    public function updateLogins()
    {
        $alll_errors = [];
        $this->user_name = htmlspecialchars(strip_tags($_POST('')));
        $this->database_password = $_POST[''];
        $this->old_password = $_POST[''];
        $this->new_password = $_POST[''];
        $this->confirm_new_password = $_POST[''];

        //check that old password matches database password
        if ($this->old_password != $this->database_password) {
            array_push($all_errors, 'Old password doesnt match database password');
        }

        //check that new password matches confirm pass
        if ($this->new_password != $this->confirm_new_password) {
            array_push($all_errors, "Password mismatch: new password doesnt match confirm password");
        }

        if (count($all_errors) === 0) {
            $update_logins_query = "UPDATE " . $this->table . " SET 
                user_name=?, 
                password = ?";

            $update_logins_parameter = [$this->user_name, $this->new_password];

            try {
                //code...
                $this->conn->update($update_logins_query, $update_logins_parameter);
                return ['Successfully updated login credentials', 'Success'];
            } catch (\Throwable $th) {
                //throw $th;
                throw new Exception($th->getMessage());
            }
        } else {
            print_r($all_errors);
            return [$all_errors, 'Error'];
        }
    }
}

class Html
{
    public function populateSelect($array, $key)
    {
        foreach ($array as $option_item) {
            echo '<option value="' . $option_item[$key] . '">' . ucfirst($option_item[$key]) . '</option>';
        }
    }

    public function showSessionMessage()
    {
        echo '<div class="card-body">';
        if (isset($_SESSION['msg']) && count($_SESSION['msg']) > 0) {
            if ($_SESSION['msg'][1] === 'Success') {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>' . $_SESSION['msg'][0] . '</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }

            if ($_SESSION['msg'][1] === 'Error') {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h6>Please fix below and try again:</h6>
                        <ul>';

                foreach ($_SESSION['msg'][0] as $error) {
                    echo '<li>' . $error . '</li>';
                }
                echo '</ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
            }
            //sleep(5);
            //unset($_SESSION['msg']);
        }
    }
}
