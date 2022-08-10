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

function fileUpload($file, $destination_folder){
    $img_errors = [];
    $img_name = $file['name'];
    $img_size = $file['size'];
    $img_ext  = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_tmp = $file["tmp_name"];

    $allowed_extensions = array('jpeg', 'jpg', 'png');
    if(!in_array($img_ext, $allowed_extensions)){
        array_push($img_errors, "Invalid image format");
    }

    if($img_size > 5097152){
        array_push($img_errors, "Image too big please choose a smaller file");
    }

    if(file_exists($destination_folder.$img_name)){
        array_push($img_errors, "File already exists");
    }

    if(count($img_errors) === 0){
        // move_uploaded_file($img_tmp, $destination_folder.$img_name);
        return $img_name;
    }else{
        return $img_errors;
    }
}
?>