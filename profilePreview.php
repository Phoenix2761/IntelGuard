<?php
    /* require "db_conn.php";
    // session_start();
    // $_SESSION["currentWebpage"] = "John Toyin"; */
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" 
        rel="stylesheet" />
        <link rel="icon" href="../IntelGuardLogo.svg" />
        <link rel="stylesheet" href="./styles.css" />
        <title>Personnel Feed</title>
    </head>
    <body id="profilePreviewBody">
        <?php
            require "./navigationBar.php";
            require "./sideMenu.php";
        ?>
        <div id="contentMenuContainer">
            <?php
                /*$userId = $_GET["id"];
                if (isset($_SESSION["uNameSecurityPersonnel"])) {
                    $securityPersonnelUserName = $_SESSION["uNameSecurityPersonnel"];
                }
                else {
                    $securityPersonnelUserName = null;
                }
                
                // echo $userId;
                $sqlQuery = "SELECT * FROM jobs WHERE id=$userId";
                $sqlQueryResultSetObject = mysqli_query($connect, $sqlQuery);
                if (mysqli_num_rows($sqlQueryResultSetObject) === 1) {
                    $resultSetRow = mysqli_fetch_assoc($sqlQueryResultSetObject);
                ?>
                <div class="jobPreviewContainer">
                    <span class="profileImageContainer">
                        <img src=" <?php 
                        if (isset($resultSetRow["profilePhotoImagePath"])) {
                            echo $resultSetRow["profilePhotoImagePath"];
                        }
                        else {
                            echo "./clientImages/defaultProfileImage.jpg";
                        }?>" alt="Profile Image" />
                    </span>
                    <span class="jobTitle">
                        <?php
                            if (isset($resultSetRow["title"])) {
                                echo $resultSetRow["title"];
                            }
                            else {
                                echo "No job title";
                            }
                        ?>
                    </span>
                    <span class="postedBy">
                        <?php
                            echo $resultSetRow["postedBy"];
                        ?>
                    </span>
                    <span class="jobDescription">
                        <?php
                            echo $resultSetRow["jobDescription"];
                        ?>
                    </span>
                    <span class="jobLocation">
                        <?php
                            echo "Location: " . $resultSetRow["jobLocation"];
                        ?>
                    </span>
                    <span class="datePosted">
                        <?php
                            echo "Date Posted: " . $resultSetRow["datePosted"];
                        ?>
                    </span>
                    <?php
                        if (isset($_SESSION["uNameSecurityPersonnel"])) {
                            $securityPersonnelUName = $_SESSION["uNameSecurityPersonnel"];
                            $sqlIdQuery = "SELECT personnelId FROM securityPersonnel WHERE uNameSecurityPersonnel='$securityPersonnelUName'";
                            $sqlIdQueryResultSetObject = mysqli_query($connect, $sqlIdQuery);
                            
                            if (mysqli_num_rows($sqlIdQueryResultSetObject) == 1) {
                                $sqlIdQueryResultSetRow = mysqli_fetch_assoc($sqlIdQueryResultSetObject);
                                $jobId = $resultSetRow["id"];
                                $sqlApplicantsQuery = "SELECT applicants FROM jobs WHERE id=$jobId";
                                $sqlApplicantsQueryResultSetObject = mysqli_query($connect, $sqlApplicantsQuery);
                                if (mysqli_num_rows($sqlApplicantsQueryResultSetObject) == 1) {
                                    $sqlApplicantsQueryResultSetRow = mysqli_fetch_assoc($sqlApplicantsQueryResultSetObject);
                                    $sqlApplicantsJsonObject = json_decode($sqlApplicantsQueryResultSetRow["applicants"]);
                                    $sqlApplicantsJsonObjectIdsArray = $sqlApplicantsJsonObject->ids;
                                    $notPresent = true;
                                    for ($i=0; $i<count($sqlApplicantsJsonObjectIdsArray); $i++) {
                                        if ($sqlApplicantsJsonObjectIdsArray[$i] == $sqlIdQueryResultSetRow["personnelId"]) {
                                            ?>
                                                <a href="./jobH.php?cancelApplication=true&applicantsUserName=<?php
                                                    $jobId = $resultSetRow["id"];
                                                    if (isset($_SESSION["uNameSecurityPersonnel"])) {
                                                        echo $securityPersonnelUserName;
                                                    }
                                                    else {
                                                        echo null;
                                                    }?>&jobId=<?php echo $jobId?>" class="applyPreviewLinkCancel">Cancel Application</a>
                                            <?php
                                            global $notPresent;
                                            $notPresent = false;
                                        }
                                        else {
                                            continue;
                                        }
                                    }
                                    if ($notPresent == true) {
                                        ?>
                                            <span class="applicationLinkSpan">
                                                <a href="./jobH.php?applicantUserName=<?php
                                                $jobId = $resultSetRow["id"];
                                                if (isset($_SESSION["uNameSecurityPersonnel"])) {
                                                    echo $securityPersonnelUserName;
                                                }
                                                else {
                                                    echo null;
                                                }?>&jobId=<?php echo $jobId ?>" class="applyPreviewLink">Confirm Application</a>
                                            </span>
                                        <?php
                                    }
                                }
                                else {
                                    // This condition should never be satisfied
                                    header("Location: ./jobs.php?status=Please try applying again");
                                    exit();
                                }
                            }
                            else {
                                header("Location: ./jobs.php?status=Please login");
                                exit();
                            }
                        }
                        else {
                            ?>
                                <span>
                                    <a href="./login.php" class="applyPreviewLink">Login</a>
                                </span>
                            <?php
                        }
                    ?>
                </div>
                <?php
                }
                else {
                    echo "No job selected";
                }*/
            ?>
            <section class="userBioInfo">
                <section class="userBioOne">
                    <span class="imageContainer">
                        <img src="./clientImages/defaultprofileImage.jpg" alt="PROFILE IMAGE">
                    </span>
                    <span class="userBio">
                        <h3>
                            <span class="firstName">John</span>
                            <span class="lastName"> Toyin</span>
                        </h3>
                        <span class="userName">johnnyy_</span>
                        <span class="age">26</span>
                    </span>
                </section>
                <table class="moreUserInfo">
                    <tbody>
                        <tr>
                            <td class="address">Address</td>
                            <td>No. 12 Olukpya Street Ogun State</td>
                        </tr>
                        <tr>
                            <td class="currentPosition">Current Position</td>
                            <td>Head Guard</td>
                        </tr>
                        <tr>
                            <td class="currentJobTitle">Job Title</td>
                            <td>Chief Security Guard</td>
                        </tr>
                    </tbody>
                </table>
                <section class="experienceContainer">
                    <h3>Experience</h3>
                    <span class="experienceItems">
                        <span class="experienceItem">
                            <h5 class="experienceTitle">Wedding Protocol</h5>
                            <span>Served as the protocol at a wedding event. Aided in crowd control, access control and surveillance.</span>
                            <img src="./clientImages/heroSectionBackground.png" alt="EXPERIENCE IMAGE">
                        </span>
                        <span class="experienceItem">
                            <h5 class="experienceTitle">Wedding Protocol</h5>
                            <span>Served as the protocol at a wedding event. Aided in crowd control, access control and surveillance.</span>
                            <img src="./clientImages/heroSectionBackground.png" alt="EXPERIENCE IMAGE">
                        </span>
                        <span class="experienceItem">
                            <h5 class="experienceTitle">Wedding Protocol</h5>
                            <span>Served as the protocol at a wedding event. Aided in crowd control, access control and surveillance.</span>
                            <img src="./clientImages/heroSectionBackground.png" alt="EXPERIENCE IMAGE">
                        </span>
                        <span class="experienceItem">
                            <h5 class="experienceTitle">Wedding Protocol</h5>
                            <span>Served as the protocol at a wedding event. Aided in crowd control, access control and surveillance.</span>
                            <img src="./clientImages/heroSectionBackground.png" alt="EXPERIENCE IMAGE">
                        </span>
                        <span class="experienceItem">
                            <h5 class="experienceTitle">Wedding Protocol</h5>
                            <span>Served as the protocol at a wedding event. Aided in crowd control, access control and surveillance.</span>
                            <img src="./clientImages/heroSectionBackground.png" alt="EXPERIENCE IMAGE">
                        </span>
                    </span>
                </section>
                <button class="beginChatButton">Chat</button>
            </section>
        </div>
        <script src="./index.js" charset="UTF-8" type="module"></script>
    </body>
</html>