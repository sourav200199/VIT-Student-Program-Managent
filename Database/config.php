<?php
    //--------Use of PDO--------
    $host = '127.0.0.1'; //or '127.0.0.1'
    $db = 'attendance_db';
    $user = 'root'; //username
    $pass = ''; //password
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";//data source name//ODBC like connector
    
    try{
        $pdo = new PDO($dsn, $user, $pass); //Calling the PDO Class
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        //echo "<h1 class='text-danger'>No Database found</h1>";
        throw new PDOException($e->getMessage());//Here, 'e' is the object
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>