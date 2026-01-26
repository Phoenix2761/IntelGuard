<?php
    require "db_conn.php";

    if (isset($_GET["userName"])) {
        $userName = $_GET["userName"];
        $sqlQuery = "SELECT organizationWorkedWith FROM securityPersonnel WHERE uNameSecurityPersonnel='$userName'";
        $sqlQueryResultSetObject = mysqli_query($connect, $sqlQuery);
        if (mysqli_num_rows($sqlQueryResultSetObject) === 1) {
            $organizationsRow = mysqli_fetch_assoc($sqlQueryResultSetObject);
            echo $organizationsRow["organizationWorkedWith"];
        }
        else {
            echo "Hasn't worked with any organizations yet";
        }
    }
    else {
        echo "Invalid Username";
    }
?>