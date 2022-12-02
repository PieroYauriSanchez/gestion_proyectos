<?php

    include_once(__DIR__."/../../public/assets/plugins/PHPMailer/Exception.php");
    include_once(__DIR__."/../../public/assets/plugins/PHPMailer/PHPMailer.php");
    include_once(__DIR__."/../../public/assets/plugins/PHPMailer/SMTP.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function enviarCorreo($data) {

        $mail = new PHPMailer(true);
        try {
            //Server seting
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';  
            $mail->Host='smtp.gmail.com';
            $mail->Username='piero.yauri.sanchez@gmail.com';
            $mail->Password='Piero26feb99';
            $mail->Port= 587;
            
            //Recipients
            $mail->setFrom('INNOVATESC@gmail.com','INNOVATESC');
            $mail->addAddress($data['destinatario'],$data['nombre_destinatario']);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $data['asunto'];
            $mail->Body = $data['mensaje'];

            return $mail->send();
        } catch (Exception $e) {
            echo 'Hubo un error al enviar el mensaje ', $mail->ErrorInfo;
            die();
        }
    }