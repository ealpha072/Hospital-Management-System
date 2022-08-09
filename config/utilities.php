<?php 
//utility functions
function sanitizeEmail($email){
    $clean_mail = "";
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $clean_mail = filter_var($email, FILTER_VALIDATE_EMAIL);
        return $clean_mail;
    }else{
        echo "Could not filter email";
    }
    
}
?>