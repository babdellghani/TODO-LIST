<?php
    $dsn = 'mysql:host=localhost;dbname=project2';
    $user = 'root';
    $pass = '';
    $options = [
        PDO::MYSQL_ATTR_COMPRESS => "SET NAMES utf8"
    ];

    try {
        $PDO = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die();
    }
?>
