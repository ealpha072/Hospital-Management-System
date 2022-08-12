<?php
function generateSupplierId(){
    $supplier_id = null;
    $lower_case_letters = ['a','b','c','d','x','q','w','z','g','p','i', 'k'];
    for($i = 0; $i <= 4; $i++){
        $random_digit = rand(0,9);
        $supplier_id .= $random_digit;
    }

    for($i = 0; $i <=5; $i++){
        $random_index = rand(0, count($lower_case_letters)-1);
        $random_alphabet = $lower_case_letters[$random_index];
        $supplier_id .= $random_alphabet;
    }

    echo (strtoupper($supplier_id));
}

generateSupplierId();
?>