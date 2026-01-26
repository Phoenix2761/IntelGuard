<?php
    // All php scripts that interact with the AWS SDK should have the autoload.php file required in them
    require "../vendor/autoload.php";
    session_start();
    require "db_conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userIntent = $_GET["intent"];
        function validate($parameter) {
            $paramter = trim($parameter);
            $parameter = stripslashes($parameter);
            $parameter = htmlspecialchars($parameter);
            return $parameter;
        }
        if ($userIntent == "signUp") {
            $fName = $_POST["fName"];
            $lName = $_POST["lName"];
            $uName = $_POST["uName"];
            $eMail = $_POST["eMail"];
            $pNumber = $_POST["pNumber"];
            $stateOfOrigin = $_POST["stateOfOrigin"];
            $stateOfResidence = $_POST["stateOfResidence"];
            $currentResidentialAddress = $_POST["currentResidentialAddress"];
            $pWord = $_POST["pWord"];
            $pWordConfirm = $_POST["pWordConfirm"];
            $guarantorName = $_POST["guarantorName"];
            $guarantorPhoneNumber = $_POST["guarantorPhoneNumber"];
            $guarantorEmail = $_POST["guarantorEmail"];
            
            $fName = validate($fName);
            $lName = validate($lName);
            $uName = validate($uName);
            $eMail = strtolower(validate($eMail));
            $pNumber = validate($pNumber);
            $stateOfOrigin = validate($stateOfOrigin);
            $stateOfResidence = validate($stateOfResidence);
            $currentResidentialAddress = validate($currentResidentialAddress);
            $pWord = validate($pWord);
            $pWordConfirm = validate($pWordConfirm);
            $guarantorName = validate($guarantorName);
            $guarantorPhoneNumber = validate($guarantorPhoneNumber);
            $guarantorEmail = validate($guarantorEmail);
            $profileImageUploadDirectory = null;

            if ($pWord != $pWordConfirm) {
                header("Location: ./signUp.php?passwordIssue=Both password fields must have the same value");
                exit;
            }
            $profileImageFileArray = $_FILES["profileImage"];
            $altProfileImageFileArray = $_FILES["alternativeImage"];
            $altProfileImageTwoFileArray = $_FILES["alternativeImageTwo"];
            $meansOfIdImageFileArray = $_FILES["meansOfIdImage"];
            $guarantorImage = $_FILES["guarantorImage"];
            
            function fileIssuesPrompt($array) {
                $names = $array[0];
                for ($j=1; $j < count($array); $j++) {
                    $names .= (", <br/>".$array[$j]);
                }
                header("Location: ./signUp.php?fileIssues=$names");
                exit;
            }
            $filesWithIssues = [];
            if (str_contains($profileImageFileArray["type"], "image/") == false) {
                $filesWithIssues[] = "Profile Image upload not an image";
            }
            if (str_contains($altProfileImageFileArray["type"], "image/") == false) {
                $filesWithIssues[] = "Alternative profile Image upload not an image";
            }
            if (str_contains($altProfileImageTwoFileArray["type"], "image/") == false) {
                $filesWithIssues[] = "Second Alternative profile Image upload not an image";
            }
            if (str_contains($meansOfIdImageFileArray["type"], "image/") == false) {
                $filesWithIssues[] = "Valid ID Image upload not an image";
            }
            if (str_contains($guarantorImage["type"], "image/") == false) {
                $filesWithIssues[] = "Guarantor Image upload not an image";
            }

            if (count($filesWithIssues) > 0) {
                fileIssuesPrompt($filesWithIssues);
            }
            

            $tooLargeFilesArray = [];
            if ($profileImageFileArray["size"] > 5242880) {
                $tooLargeFilesArray[] = "Profile Image too large";
            }
            if ($altProfileImageFileArray["size"] > 5242880) {
                $tooLargeFilesArray[] = "Alternative Image too large";
            }
            if ($altProfileImageTwoFileArray["size"] > 5242880) {
                $tooLargeFilesArray[] = "Second Alternative Image too Large";
            }
            if ($meansOfIdImageFileArray["size"] > 5242880) {
                $tooLargeFilesArray[] = "Valid Id File too Large";
            }
            if ($guarantorImage["size"] > 5242880) {
                $tooLargeFilesArray[] = "Guarantor Image too Large";
            }

            if (count($tooLargeFilesArray) > 0) {
                fileIssuesPrompt($tooLargeFilesArray);
            }
            else {
                
            }
            
            /* if (gettype($uName) == "string") {
                $profileImageName = ($profileImageFileArray["name"]);
                $profileImageUploadDir = ("./securityPersonnelProfileImages/" . basename($profileImageName));
                $moveUploadedFileReturnValue = move_uploaded_file($profileImageFileArray["tmp_name"], $profileImageUploadDir);
                if ($moveUploadedFileReturnValue == true) {
                    $profileImageUploadDirectory = $profileImageUploadDir;
                }
                else {
                    header("Location: ./signUp.php?status=Profile Image not sent via HTTP POST method");
                    exit;
                }
                
            }
            else {
                header("Location: ./signUp.php?status=Invalid Profile Image.");
                exit();
            }*/

            
            
            $sqlIdQuery = "SELECT personnelId FROM securityPersonnel";
            $sqlIdResultSet = mysqli_query($connect, $sqlIdQuery);
            $sqlResultSetObjectRowCopy = [];
            if (mysqli_num_rows($sqlIdResultSet) > 0) {
                while (true) {
                    $sqlResultSetObjectRow = mysqli_fetch_assoc($sqlIdResultSet);
                    if ($sqlResultSetObjectRow != null) {
                        $sqlResultSetObjectRowCopy = $sqlResultSetObjectRow;
                        continue;
                    }
                    else {
                        $uName = ($uName . ($sqlResultSetObjectRowCopy["personnelId"] + 1));
                        break;
                    }
                }
            }
            else {
                $uName = $uName . (string)1;
            }

            $sqlUNameQuery = "SELECT uNameSecurityPersonnel FROM securityPersonnel WHERE uNameSecurityPersonnel='$uName'";
            $sqlUNameResultSet = mysqli_query($connect, $sqlUNameQuery);
            if ($sqlUNameResultSet->num_rows == 0) {
                $profileImageFileArray["name"] = (basename($profileImageFileArray["tmp_name"], ".tmp") . basename($profileImageFileArray["name"]));
                $altProfileImageFileArray["name"] = (basename($altProfileImageFileArray["tmp_name"], ".tmp") . basename($altProfileImageFileArray["name"]));
                $altProfileImageTwoFileArray["name"] = (basename($altProfileImageTwoFileArray["tmp_name"], ".tmp") . basename($altProfileImageTwoFileArray["name"]));
                $meansOfIdImageFileArray["name"] = (basename($meansOfIdImageFileArray["tmp_name"], ".tmp") . basename($meansOfIdImageFileArray["name"]));
                $guarantorImage["name"] = (basename($guarantorImage["tmp_name"], ".tmp") . basename($guarantorImage["name"]));
                $profileImageFilePath = null;
                $altProfileImageFilePath = null;
                $altProfileImageTwoFilePath = null;
                $meansOfIdImageFilePath = null;
                $guarantorImagePath = null;
                if (file_exists($profileImageFileArray["tmp_name"]) == true) {
                    $nameOfImage = $profileImageFileArray["name"];
                    $tmpNameOfImage = $profileImageFileArray["tmp_name"];
                    move_uploaded_file($tmpNameOfImage, "./securityPersonnelProfileImages/$nameOfImage");
                    $profileImageFilePath = ("./securityPersonnelProfileImages/".$nameOfImage);
                }
                else {
                    header("Location: ./signUp.php?issue=Profile Image File Name Already Used");
                    exit();
                }

                if (file_exists($altProfileImageFileArray["tmp_name"]) == true) {
                    $nameOfImage = $altProfileImageFileArray["name"];
                    $tmpNameOfImage = $altProfileImageFileArray["tmp_name"];
                    move_uploaded_file($tmpNameOfImage, "./securityPersonnelProfileImages/$nameOfImage");
                    $altProfileImageFilePath = ("./securityPersonnelProfileImages/".$nameOfImage);
                }
                else {
                    header("Location: ./signUp.php?issue=Alternative Profile Image File Name Already Used");
                    exit();
                }

                if (file_exists($altProfileImageTwoFileArray["tmp_name"]) == true) {
                    $nameOfImage = $altProfileImageTwoFileArray["name"];
                    $tmpNameOfImage = $altProfileImageTwoFileArray["tmp_name"];
                    move_uploaded_file($tmpNameOfImage, "./securityPersonnelProfileImages/$nameOfImage");
                    $altProfileImageTwoFilePath = ("./securityPersonnelProfileImages/".$nameOfImage);
                }
                else {
                    header("Location: ./signUp.php?issue=Alternative Profile Image Two File Name Already Used");
                    exit();
                }
                
                if (file_exists($meansOfIdImageFileArray["tmp_name"]) == true) {
                    $nameOfImage = $meansOfIdImageFileArray["name"];
                    $tmpNameOfImage = $meansOfIdImageFileArray["tmp_name"];
                    move_uploaded_file($tmpNameOfImage, "./securityPersonnelProfileImages/$nameOfImage");
                    $meansOfIdImageFilePath = ("./securityPersonnelProfileImages/".$nameOfImage);
                }
                else {
                    header("Location: ./signUp.php?issue=Means Of Id Image File Name Already Used");
                    exit();
                }

                if (file_exists($guarantorImage["tmp_name"]) == true) {
                    $nameOfImage = $guarantorImage["name"];
                    $tmpNameOfImage = $guarantorImage["tmp_name"];
                    move_uploaded_file($tmpNameOfImage, "./securityPersonnelProfileImages/$nameOfImage");
                    $guarantorImagePath = ("./securityPersonnelProfileImages/".$nameOfImage);
                }
                else {
                    header("Location: ./signUp.php?issue=Guarantor Image File Name Already Used");
                    exit();
                }
                $blockedStatus = "false";
                $restrictedStatus = "false";
                $sqlResultSet = $connect->prepare("INSERT INTO pendingPersonnelApplications (fName, lName, 
                uNamePersonnel, eMail, phoneNumber, pWord, stateOfOrigin, stateOfResidence, 
                homeAddress, profileImgReference, blocked, restricted, altProfileImgReference, altProfileImgTwoReference, meansOfIdImgReference, guarantorImgReference, guarantorEmail, guarantorPhoneNumber, guarantorName) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $sqlResultSet->bind_param("sssssssssssssssssss", $fName, $lName, $uName, $eMail, $pNumber, $pWord, $stateOfOrigin,
                $stateOfResidence, $currentResidentialAddress, $profileImageFilePath, $blockedStatus, $restrictedStatus, $altProfileImageFilePath, $altProfileImageTwoFilePath, $meansOfIdImageFilePath, $guarantorImagePath, $guarantorEmail, $guarantorPhoneNumber, $guarantorName);
                $sqlResultSet = $sqlResultSet->execute();
                if ($sqlResultSet == true) {
                    header("Location: ./signUp.php?status=Account creation successful!");
                    exit();
                }
                else {
                    header("Location: ./signUp.php?status=Account creation unsuccessful.");
                    exit();
                }
            }
            else {
                header("Location: ./signUp.php?status=Username has already been used.");
                exit();
            }
        }
        else if ($userIntent == "login") {
            $eMail = $_POST["email"];
            $password = $_POST["password"];
            $eMail = strtolower(validate($eMail));
            $password = validate($password);

            $sqlQuery = "SELECT * FROM pendingPersonnelApplications WHERE eMail='$eMail' AND pWord='$password'";
            // $sqlQuery = "SELECT * FROM securityPersonnel WHERE eMail='$eMail' AND pWord='$password'";
        
            $sqlResultSetObject = mysqli_query($connect, $sqlQuery);
        
            if (mysqli_num_rows($sqlResultSetObject) === 1) {
                $row = mysqli_fetch_assoc($sqlResultSetObject);
                if (($row["eMail"] === $eMail) && ($row["pWord"] === $password)) {
                    $mySqliUserNameQueryResultSetObject = $connect->query("SELECT uNameSecurityPersonnel FROM securityPersonnel WHERE eMail='$eMail' AND pWord='$password'");
                    // $sqlEmailQueryResultSetObject = mysqli_query($connect, $sqlEmailQuery);
                    if (($mySqliUserNameQueryResultSetObject->num_rows) === 1) {
                        $uName = $mySqliUserNameQueryResultSetObject->fetch_assoc()["uNameSecurityPersonnel"];
                        $_SESSION["uNamePersonnel"] = $uName;
                    }
                    else {
                        // No execution
                    }
                    if ($row["profileImagePath"] !== "") {
                        $_SESSION["profilePicturePath"] = $row["profileImagePath"];
                    }
                    else {
                        // No execution
                    }
                    $_SESSION["eMail"] = $eMail;
                    $_SESSION["password"] = $password;
                    header("Location: ./personnel.php?status=Login Successful!");
                    exit();
                }
                // This condition is never going to be satisfied
                else {
                    header("Location: ./jobs.php?status=Login unsuccessful");
                    exit();
                }
            }
            else {
                header("Location: ./signUp.php?status=Username or password incorrect.");
                exit();
            }
        }
        
    }
    else {
        session_unset();
        session_destroy();
        header("Location: ./signUp.php?status=Invalid request.");
        exit();
    }

?>