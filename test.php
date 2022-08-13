<?php
$address = "Daraja Mbili";
$address_condition = [];
 if(preg_match('/\s/', $address)){
    $address_array = explode(" ", $address);
    foreach ($address_array as $single_address) {
        $is_all_alphabetical = ctype_alpha($single_address) ? "True" : "False";
        array_push($address_condition, $is_all_alphabetical);
    }

    if(in_array("False", $address_condition)){echo "Found error in address";}else{echo"No error found";}
}
?>