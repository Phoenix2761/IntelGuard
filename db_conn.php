<?php

    $sName = "localhost";
    $userName = "intelguard";
    $dbPassword = "Nodejs64apex#";
    $dbName = "intelguard";

    $connect = new mysqli($sName, $userName, $dbPassword, $dbName);

    if ($connect->error) {
        header("Location: ./login.php?status=Database connection failed.");
        exit();
    }
    else {
        // echo "Database connection successful";
    }  
?>