<?php

try {
    $db_host = 'localhost';
    $db_name = 'ecoshop';
    $db_root = 'root';
    $db_pass = '';
    
    $access = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", "$db_root", "$db_pass");
    
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
} catch (Exception $e) {
    $e->getMessage();
}


?>
