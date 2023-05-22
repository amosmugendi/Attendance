<?php
    require 'vendor/autoload.php';


    class SendEmail{
        public static function SendMail($to,$subject,$content){
            $key='ewrthfsdfhjtygdfytdhjthfdgghj';

            $email= new \SendGrid\Mail\Mail();
            $email->setFrom("amosmugendi@gmail.com","Amos Mugendi");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain",$content);

            $sendgrid= new \SendGrid($key);

            try{
                $respnse= $sendgrid->send($email);
                return $respnse;

            }catch(Exception $e){
                echo 'Email exception caught:'.$e->getMessage()."\n";
                return false;
            }
        }
    }
?>