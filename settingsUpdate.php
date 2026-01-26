<?php
    session_start();
    require "./db_conn.php";
    /* $fileInfo = new finfo(FILEINFO_MIME);
    $fileType = $fileInfo->file($_FILES["profileImage"]["tmp_name"]);
    $fileMIME = substr($fileType, 0, strpos($fileType, ";")); */
    // $imageName = basename($_FILES["profileImage"]["name"]);
    if (isset($_SESSION["uNameSecurityPersonnel"])) {
        $securityPersonnelUName = $_SESSION["uNameSecurityPersonnel"];
        if (isset($_FILES["profileImage"])) {
            $imageTmpName = $_FILES["profileImage"]["tmp_name"];
            $imagePath = "../clientImages/" . $_FILES["profileImage"]["name"];
            move_uploaded_file($imageTmpName, $imagePath);
            $sqlUpdateQuery = "UPDATE securityPersonnel SET profileImagePath='$imagePath' WHERE uNameSecurityPersonnel='$securityPersonnelUName'";
            $sqlQueryResultSetObject = mysqli_query($connect, $sqlUpdateQuery);

            if ($sqlQueryResultSetObject === true) {
                $_SESSION["profilePicturePath"] = $imagePath;
                header("Location: ./settings.php?response=Profile photo changed successfully!");
                exit();
            }
            else {
                header("Location: ./settings.php?response=Profile photo change failed!");
                exit();
            }
        }
        else if (isset($_POST["firstNameUpdate"])) {
            $sqliPrepareObject = $connect->prepare("UPDATE securityPersonnel SET fName=?, lName=?, eMail=?, phoneNumber=? WHERE uNameSecurityPersonnel=?");
            $sqliPrepareObject->bind_param("sssss", $_POST["firstNameUpdate"], $_POST["lastNameUpdate"], $_POST["securityPersonnelEMailUpdate"], $_POST["securityPersonnelPhoneNumberUpdate"], $securityPersonnelUName);
            $sqliExecuteReturnValue = $sqliPrepareObject->execute();
            // $sqliPrepareObjectResultSet = $sqliPrepareObject->get_result();
            if ($sqliExecuteReturnValue == true) {
                header("Location: ./settings.php?statusOfSettingsUpdate=Settings update successful!");
                exit();
            }
            else {
                header("Location: ./settings.php?statusOfSettingsUpdate=Settings update failed, please try again");
                exit();
            }
        }
        else {
            // No execution
        }
    }
    else {
        header("Location: ./login.php?status=Please login");
        exit();
    }
    

?>