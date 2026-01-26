<?php
    // require "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>    
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sign Up</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" 
        rel="stylesheet" />
        <link rel="stylesheet" href="../sFiles/styles.css" />
        <link rel="icon" href="../intelGuardLogo.svg" />
    </head>
    <body id="signUpBody">
        <div id="registerContainer" class="loginContainer">
            <div class="registerToggleContainer">
                <button id="signUpSectionButton">Sign Up</button>
                <button id="loginSectionButton" class="hiddenSectionButton">Sign In</button>
            </div>
            <div id="signUpDiv" class="">
                <h1 class="signUpH1">Create an account</h1>
                <span class="statusSpan">
                    <?php
                        if (isset($_GET["status"])) {
                            echo $_GET["status"];
                        }
                        else {
                            // No execution
                        }
                    ?>
                </span>
                <?php
                    if (isset($_GET["fileIssues"])) {
                        $largeFilesArray = $_GET["fileIssues"];
                ?>
                        <p><?php echo $largeFilesArray ?></p>
                <?php
                        }
                    else {

                    }
                ?>
                <form action="./signUpH.php?intent=signUp" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <div id="infoDiv">
                            <div id="flNameDiv">
                                <input type="text" id="fName" name="fName" placeholder="First Name" required />
                                <input type="text" id="lName" name="lName" placeholder="Last Name" required />
                            </div>
                            <input type="text" id="userName" name="uName" placeholder="Username" required/>
                            <span class="userNameUsed"></span>
                            <input type="email" id="eMail" name="eMail" placeholder="Email" required />
                            <input type="text" id="pNumber" name="pNumber" placeholder="Phone Number" required />
                            <input type="text" id="stateOfOrigin" name="stateOfOrigin" placeholder="Place of Origin" required />
                            <input type="text" id="stateOfResidence" name="stateOfResidence" placeholder="State of Residence" required />
                            <input type="text" id="currentResidentialAddress" name="currentResidentialAddress" placeholder="Current residential address" required />
                            <input type="password" id="pWord" name="pWord" placeholder="Password" minlength=12 required />
                            <input type="password" id="pWordConfirm" name="pWordConfirm" placeholder="Confirm Password" minlength=12 required />
                            <?php
                                if (isset($_GET["passwordIssue"])) {
                            ?>
                                    <p><?php echo $_GET["passwordIssue"]?> </p>
                            <?php
                                }
                            ?>
                            <input type="file" id="profileImage" name="profileImage" required class="fileInput" accept=".png, .jpeg, .pdf"/>
                            <button id="profileImageButton">Upload Profile Image</button>
                            <input type="file" id="alternativeImage" name="alternativeImage" required class="fileInput" accept=".png, .jpeg, .pdf"/>
                            <button id="alternativeImageButton">Upload Alternative Image</button>
                            <input type="file" id="alternativeImageTwo" name="alternativeImageTwo" required class="fileInput" accept=".png, image/jpeg, .pdf"/>
                            <button id="alternativeImageTwoButton">Upload Second Alternative Image</button>
                            <input type="file" id="meansOfIdImage" name="meansOfIdImage" required class="fileInput" accept=".png, .jpeg, .pdf"/>
                            <button id="meansOfIdImageButton">Upload Valid ID</button>
                            <input type="text" id="guarantorName" name="guarantorName" placeholder="Guarantor Name" required />
                            <input type="text" id="guarantorPhoneNumber" name="guarantorPhoneNumber" placeholder="Guarantor Phone Number" required accept=".png, .jpeg, .pdf"/>
                            <input type="text" id="guarantorEmail" name="guarantorEmail" placeholder="Guarantor Email" required />
                            <input type="file" id="guarantorImage" name="guarantorImage" required class="fileInput" accept=".png, .jpeg, .pdf"/>
                            <button id="guarantorImageButton">Upload Guarantor Image</button>
                        </div>
                        <div>
                            <button type="submit">Create an account</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div id="loginDiv" class="hiddenSection">
                <h1 class="signUpH1">Sign In</h1>
                <form action="./signUpH.php?intent=login" method="POST">
                    <fieldset>
                        <div id="infoDiv">
                            <input type="email" id="eMail" name="email" placeholder="johndoe@gmail.com" required />
                            <input type="password" id="pWord" name="password" />
                            <div>
                                <button type="submit">Login</button>
                            </div> 
                        </div> 
                    </fieldset>
                </form>
            </div>
        </div>
        <?php
            if (isset($_GET["issue"])) {
                echo $_GET["issue"];
            }
            else {
                
            }
        ?>
        <script src="../sFiles/index.js" charset="UTF-8" type="module"></script>
    </body>
</html>