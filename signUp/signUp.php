<?php
include '../connection.php';
global $cnx;

function CheckUserExits($cnx,$username,$email){
    $checkUser = $cnx->prepare("SELECT * FROM users WHERE usuario = :username");
    $checkUser->execute(array("username" => $username));

    if($checkUser->rowCount() > 0){
        return true;
    }
    return false;
}

function CheckEmailExits($cnx,$email){
    $checkEmail = $cnx->prepare("SELECT * FROM users WHERE email = :email");
    $checkEmail->execute(array("email" => $email));

    if($checkEmail->rowCount() > 0){
        return true;
    }
    return false;
}

function SignUp($username,$email,$password,$cnx){
    $addUser = $cnx->prepare("INSERT INTO users (usuario, email, contrasena) VALUES (:usuario, :email, :password)");
    $addUser->execute(array("usuario" => $username, "email" => $email, "password" => password_hash($password, PASSWORD_DEFAULT)));
}


if($_SERVER['REQUEST_METHOD'] === "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeat-password"];

    $errors = [];

    if(CheckUserExits($cnx,$username,$email)){
        $errors[] = "errorUserExist";
    }


    if(CheckEmailExits($cnx,$email)){
        $errors[] = "errorEmailExist";
    }


    if($password !== $repeatPassword){
        $errors[] = "errorPasswordNotMatch";
    }


    if(!empty($errors)){
        echo json_encode([
            'status' => 'error',
            'errors' => $errors
        ]);
        return;
    }else{
        SignUp($username, $email, $password, $cnx);
        echo json_encode(['status' => 'success']);
    }
}

