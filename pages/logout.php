<?php  
    require_once "../config/classes.php";
    require '../public/header.php';
    //end session here 
    echo '<di class="card row h-100 justify-content-center align-items-center">
        <div class="card-header">
            You have been logged out successfully. <a href="login.php">Login</a>
        </div>
    </di>';

    session_destroy();

    require '../public/footer.php';

    exit();
?>


