<?php
require '../connection.php';
global $cnx;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);


function CheckEmailExists($email, $cnx){
    $checkEmail = $cnx->prepare("SELECT * FROM users WHERE email = :email");
    $checkEmail->execute(['email' => $email]);

    if($checkEmail->rowCount() == 1){
        return true;
    } else {
        return false;
    }
}

function SendEmail($mail, $email,$code){
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'izangafe2007@gmail.com';
        $mail->Password = 'iitr ozty fljk rjvu';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente
        $mail->setFrom('izangafe2007@gmail.com', 'Tu Nombre');
        $mail->addAddress($email);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Password Recovery';
        $mail->Body = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            color: #333;
            background-image: url("https://www.google.com/url?sa=i&url=https%3A%2F%2Fstock.adobe.com%2Fsearch%3Fk%3Demail%2Bbackground%2Btexture&psig=AOvVaw1leX-e3cOlE3CmprQZe00x&ust=1744364017101000&source=images&cd=vfe&opi=89978449&ved=0CBUQjRxqFwoTCKDChr-UzYwDFQAAAAAdAAAAABAE");
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Password Recovery</h1>
        <p>Hello, we have received a request to recover your password. If you did not request this change, please ignore this message.</p>
        <p>This is your verification code:</p>
      <strong style="padding: 10px 20px; border-radius: 12px; font-size: 2rem; background-color: #f0f0f0; color: #333;">'. $code.'</strong>

        <p class="footer">This is an automated message, please do not reply to this email.</p>
    </div>

</body>
</html>';

        $mail->AltBody = 'This is the plain text content of the message. If you did not request this recovery, please ignore this email.';

        $mail->send();
        return json_encode(['status' => 'success']);
    } catch (Exception $e) {
        return json_encode(['status' => 'error', 'message' => $mail->ErrorInfo]);
    }
}

function AddVerificationCode($email,$cnx){
    $code = str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT);
    $addCode = $cnx->prepare("UPDATE users SET codigo_verificacion = :code WHERE email = :email");
    $addCode->execute(['code' => $code, 'email' => $email]);

    return $code;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    if (CheckEmailExists($email, $cnx)) {
        $code = AddVerificationCode($email, $cnx);
        echo SendEmail($mail, $email,$code);
    } else {
        echo json_encode([
            "status" => "emailNotFound",
        ]);
    }
}
