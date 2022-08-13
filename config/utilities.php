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

function bulkUploadAttachments($file_name_array){
    $attachments = array_filter($file_name_array['name']);
    $total_count = count($file_name_array['name']);
    $tmpFilePaths = [];

    for( $i=0 ; $i < $total_count ; $i++ ) {
        //The temp file path is obtained
        $tmpFilePath = $file_name_array['tmp_name'][$i];
        array_push($tmpFilePaths, $tmpFilePath );
    }
    return $tmpFilePaths;
}

function generateSupplierId(){
    $supplier_id = null;
    $lower_case_letters = ['a','b','c','d','x','q','w','z','g','p','i','k'];
    for($i = 0; $i <= 4; $i++){
        $random_digit = rand(0,9);
        $supplier_id .= $random_digit;
    }

    for($i = 0; $i <=5; $i++){
        $random_index = rand(0, count($lower_case_letters)-1);
        $random_alphabet = $lower_case_letters[$random_index];
        $supplier_id .= $random_alphabet;
    }

    return strtoupper($supplier_id);
}

function generateOutPatientNumber(){
    $op_number = null;

    for($i=0; $i < 8; $i++){
        $random_digit = rand(0,9);
        $op_number .= $random_digit;
    }
    return $op_number;
}


?>