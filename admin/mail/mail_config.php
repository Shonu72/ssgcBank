<?php 
    
    
    function sendOtp($customerMail, $otp, $name){

        require 'PHPMailerAutoload.php';
        require 'class.smtp.php';
        $mail  = new PHPMailer;
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

         
        $mail->Username = 'XYZ@gmail.com';
        $mail->Password='*******';
        
        $content = file_get_contents('../mail/otpMail.php');
        
        $mail->setFrom("XYZ@gmail.com", "SSGC Bank");
        $mail->addAddress($customerMail);
        $mail->addReplyTo("XYZ@gmail.com");

        $mail->isHTML(true);
        $mail->Subject="Email Verification";

        $swap_var = array(

            "{Name}"=> "$name",
            "{otp}"=>"$otp"

        );

        foreach(array_keys($swap_var) as $key){
            if(strlen($key) > 2 && trim($key) !=""){
                $content = str_replace($key, $swap_var[$key], $content);
            }

        }
         
        $mail->Body="$content";
        

        if(!$mail->send()){
            echo"mail not sent";
        }
        
    }  
?>