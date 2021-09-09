<?php
    //$host='127.0.0.1';
    //$db='attendee_db';
    //$user='root';
    //$pass='';
    //$charset='utf8mb4';

      //Remote Database Connection
      $host = 'sql6.freesqldatabase.com';
      $db = 'sql6435807';
      $user = 'sql6435807';
      $pass = 'ZwGSlmWcNN';
      $charset = 'utf8mb4';
    $dsn="mysql:host=$host;dbname=$db;charset=$charset";
    try{
        $pdo=new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOExcepion $e) {
        throw new PDOException($e->getMessage());


    }
    require_once 'crud.php';
    require_once 'user.php';
    $crud= new crud($pdo);
    $user= new user($pdo);

    $user->insertUser("admin","password");
?>