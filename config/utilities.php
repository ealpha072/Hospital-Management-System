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

function fileUpload($file){
    $img_errors = [];
    $destination_folder = "../images/";
    $img_name = $file['name'];
    $img_size = $file['size'];
    $img_ext  = pathinfo($img_name, PATHINFO_EXTENSION);

    $allowed_extensions = array('jpeg', 'jpg', 'png');
    if(!in_array($img_ext['extension'], $allowed_extensions)){
        array_push($img_errors, "Invalid image format");
    }

    if($img_size > 5097152){
        array_push($img_errors, "Image too big please choose a smaller file");
    }

    if(file_exists($destination_folder.$img_name)){
        array_push($img_errors, "File already exists");
    }

    return $img_errors;
}
?>