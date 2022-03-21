<?php 
    
    
    function sendMessage($customerMail, $name){

        require 'PHPMailerAutoload.php';
        require 'class.smtp.php';
        $mail  = new PHPMailer;
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';


        $mail->Username = 'sblogger810@gmail.com';
        $mail->Password='Shourya@zero01?';
         
        // $content = file_get_contents('../mail/congraTemp.php');
        $mail->setFrom("sblogger810@gmail.com", "SSGC Bank");
        $mail->addAddress($customerMail);
        $mail->addReplyTo("sblogger810@gmail.com");

        $mail->isHTML(true);
        $mail->Subject="Account Created Sucessfully!";

        $swap_var = array(

            "{Name}"=> "$name"

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