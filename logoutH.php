<?php

    if (isset($_POST["logout"])) {
        session_unset();
        session_destroy();
        header("Location: ./signUp.php?status=Logout successful!");
        exit();
    }
    else {
        header("Location: ./signUp.php");
        exit();
    }

?>