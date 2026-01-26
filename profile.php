<?php
    session_start();
    require "./db_conn.php";
    $_SESSION["currentWebpage"] = "Profile";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Profile</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" 
        rel="stylesheet" />
        <link rel="stylesheet" href="./styles.css" />
        <!-- favicon -->
        <!-- <link rel="icon" href="" /> -->
    </head>
    <body id="profileBody">
        
        <script charset="UTF-8" src="./index.js" type="module"></script>
    </body>
</html>