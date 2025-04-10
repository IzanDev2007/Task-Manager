<?php
require '../connection.php';

global $cnx;

function CheckUserExist($cnx,$user){
    $checkUser = $cnx->prepare("SELECT * FROM users WHERE usuario = :username");
    $checkUser->execute(['username' => $user]);

    if($checkUser->rowCount() < 1) {
        return false;
    }
    return true;
}

function Login($user,$password,$cnx){
    $getUsers = $cnx->prepare("SELECT * FROM users WHERE usuario = :username");
    $getUsers->execute(['username' => $user]);
    $user = $getUsers->fetch();

    if(password_verify($password, $user['contrasena'])){
        return true;
    }else{
        return false;
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(CheckUserExist($cnx,$username) && Login($username,$password,$cnx)){
        session_start();
        $_SESSION['username'] = $username;
        echo json_encode(['status' => 'loged']);
    }else{
        echo json_encode(['status' => 'error']);
        return;
    }
}