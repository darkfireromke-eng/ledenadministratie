<?php

$host = "localhost";
$user = "root";
$password = "mysql"; //later verwijderen
$databasename = "ledenadministratie";
//adress van de database 

try {
    $pdo = new PDO ("mysql:host=$host;dbname=$databasename;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    }
    catch (PDOException $e) 
    {
        die("Database verbinding mislukt: " . $e->getMessage());

    }
//deel voor het bereiken van de database en een foutmelding voor wanneer niet
?>
