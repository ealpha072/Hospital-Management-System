<?php
function mailMessage(){
    $to = "weslysnipe066@gmail.com";
   $subject = "This is subject";
   $message = "This is simple text message.";
   $header = "From:ealpha072@gmail.com \r\n";
   $retval = mail ($to,$subject,$message,$header);
   if( $retval == true ){
      echo "Message sent successfully...";
   }else{
      echo "Message could not be sent...";
   }
}

function generateOutPatientNumber(){
    $op_number = null;

    for($i = 0; $i < 8; $i++){
        $random_digit = rand(0,9);
        $op_number .= $random_digit;
    }
    return $op_number;
}

echo(generateOutPatientNumber());

echo(ucfirst("oTienO"));
?>