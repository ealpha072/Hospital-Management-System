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

mailMessage()

?>