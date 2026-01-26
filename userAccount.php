<?php
    session_start();
    // require "./db_conn.php";
    $_SESSION["currentWebpage"] = "Account";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Change the "Settings" webpage to an "Account" webpage and 
        incorporate the  appearance and functionality of profile.php into the "Accounts" 
        webpage then delete profile.php-->
        <title>Account</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" 
        rel="stylesheet" />
        <link rel="stylesheet" href="./styles.css" />
        <link rel="icon" href="../intelGuardLogo.svg" />
    </head>
    <body id="userAccountBody">
        <?php
            require "./navigationBar.php";
            require "./sideMenu.php";
        ?>
        <div id="contentMenuContainer">
            <?php
                $resultSetRow = [];
                $fName = null;
                $lName = null;
                $securityPersonnelEMail = null;
                $securityPersonnelPhoneNumber = null;
                // Remove the true in the if statement and the logical OR symbol
                if (isset($_SESSION["uNameSecurityPersonnel"]) || true) {
                    $securityPersonnelUName = $_SESSION["uNameSecurityPersonnel"];
                    /*$sqlStatement = $connect->prepare("SELECT * FROM securityPersonnel WHERE uNameSecurityPersonnel=?");
                    $sqlStatement->bind_param("s", $securityPersonnelUName);
                    $sqlStatement->execute();
                    $sqlStatementResultSetObject = $sqlStatement->get_result();
                    if ($sqlStatementResultSetObject->num_rows == 1) {
                        global $resultSetRow;
                        $resultSetRow = $sqlStatementResultSetObject->fetch_assoc();
                        $fName = $resultSetRow["fName"];
                        $lName = $resultSetRow["lName"];
                        $securityPersonnelEMail= $resultSetRow["eMail"];
                        $securityPersonnelPhoneNumber = $resultSetRow["phoneNumber"];
                    }
                    else {
                        echo "Unknown User";
                    }*/
            ?>
                    <h2 id="userName">Welcome,
                        <span> 
                        <?php
                            if (isset($_SESSION["uNameSecurityPersonnel"])) {
                                echo $_SESSION["uNameSecurityPersonnel"];
                            }
                            else {
                                echo "No Username";
                            }
                        ?>
                        </span>
                    </h2>
                    <img src="<?php
                            if (isset($_SESSION["profilePicturePath"])) {
                                echo $_SESSION["profilePicturePath"];
                            }
                            else {
                                echo "./clientImages/defaultProfileImage.jpg";
                            }
                        ?>" alt="PROFILE PICTURE" id="profilePicture" />
                    <?php 
                    if (($lName != null) || true) {
                    ?>
                        <form enctype="multipart/form-data" action="./settingsUpdate.php" method="POST" class="accountInfoUpdateForm">
                            <fieldset>
                                <input type="file" accept="image/*" name="profileImage" id="profileImageInput" />
                                <input type="submit" name="submit" value="Upload" class="profileBtn"/>
                            </fieldset>
                        </form>
                        <form action="./settingsUpdate.php" method="POST" class="profileInfoUpdateForm">
                            <fieldset>
                                <label for="firstNameUpdate">First Name: </label>
                                <input type="text" name="firstNameUpdate" value="<?php echo "John" ?>" />
                                <label for="lastNameUpdate">Last Name: </label>
                                <input type="text" name="lastNameUpdate" value="<?php echo "Markp" ?>" />
                                <label for="securityPersonnelEMailUpdate">E-Mail: </label>
                                <input type="text" name="securityPersonnelEMailUpdate" value="<?php echo "mark@gmail.com" ?>" />
                                <label for="securityPersonnelPhoneNumberUpdate">Phone number: </label>
                                <input type="text" name="securityPersonnelPhoneNumberUpdate" value="<?php echo "+2349081230876" ?>" />
                                <input type="submit" value="update" class="profileBtn"/>
                            </fieldset>
                            <?php
                                if (isset($_GET["statusOfSettingsUpdate"])) {
                                    echo $_GET["statusOfSettingsUpdate"];
                                }
                                else {
                                    // No excecution
                                }
                            ?>
                        </form>
                        <?php
                            $statsRowArray = [];
                            if (isset($_SESSION["uNameSecurityPersonnel"]) || true) {
                                /*$userNameClient = $_SESSION["uNameSecurityPersonnel"];
                                $sqlQuery = "SELECT personnelId, fName, lName, jobsCompleted, averageRating, currentJobs FROM securityPersonnel WHERE uNameSecurityPersonnel='$userNameClient'";
                                $sqlQueryResultSetObject = mysqli_query($connect, $sqlQuery);
                                if (mysqli_num_rows($sqlQueryResultSetObject) === 1) {
                                    $statsRowArray = mysqli_fetch_assoc($sqlQueryResultSetObject);
                                    // $_SESSION["securityPersonnelId"] = $statsRowArray["id"];
                                }
                                else {
                                    $statsRowArray["fName"] = null;
                                    $statsRowArray["lName"] = null;
                                    $statsRowArray["jobsCompleted"] = null;
                                    $statsRowArray["averageRating"] = null;
                                }*/
                            }
                        ?>
                        <div class="statsContainer">
                            <span class="profileButton" id="jobsCompleted">Jobs Completed:
                                <span>500
                                    <?php
                                        if (isset($statsRowArray["jobsCompleted"])) {
                                            echo $statsRowArray["jobsCompleted"];
                                        }
                                        else {
                                            echo null;
                                        }
                                    ?>
                                </span>
                            </span>
                            <span class="profileButton" id="averageRating">Average Rating:
                                <span>1000
                                    <?php
                                        if (isset($statsRowArray["averageRating"])) {
                                            echo $statsRowArray["averageRating"];
                                        }
                                        else {
                                            echo null;
                                        }
                                    ?>
                                </span>
                            </span>
                        </div>
                        <h2 id="organizationsWorkedWithTitle">Organization Worked With</h2>
                        <div class="organizations">
                        </div>
                        <form action="./logoutH.php" method="POST" class="logoutForm">
                            <input type="submit" value="Logout" class="profileBtn"/>
                        </form>
                        </div>
                <?php
                    }
                    else {
                        echo "Please login";
                    }
                }
                else {
                    echo "PLEASE LOGIN!";
                }
                ?>
        </div>
        <script charset="UTF-8" src="./index.js" type="module"></script>
    </body>
</html>