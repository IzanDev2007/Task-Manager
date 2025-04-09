<?php
try{
    $cnx = new PDO("mysql:host=localhost;dbname=task_manager", "root", "");
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}
