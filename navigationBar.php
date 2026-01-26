<?php
    // require "./db_conn.php";
?>
<head>
    <link rel="stylesheet" href="./styles.css" />
</head>
<nav class="navigationBar">
    <button class="hamburgerMenuTwo">
        <span class="hamburgerMenuBarOne"></span>
        <span class="hamburgerMenuBarTwo"></span>
    </button>
    
    <span class="homeNavbarLogoContainer">
        <h2>
            <?php
                if (isset($_SESSION["uNameSecurityPersonnel"])) {
                    echo $_SESSION["uNameSecurityPersonnel"];
                }
                else {
                    echo "Unknown User";
                }
            ?>
        </h2>
    </span>

    <!--
    <div class="menuSubContainer">
        <form action="./logoutH.php" method="POST" id="homePageForm">
            <fieldset id="homePageFormFieldset">
                <input type="submit" name="logout" value="Logout" class="sectionTwoButton" 
                id="sectionTwoButtonFour"/>
            </fieldset>
        </form>
    </div>-->

    <a href="<?php if (isset($_SESSION["uNameSecurityPersonnel"])) {
            echo "./userAccount.php";
        }
        else {
            echo "./signUp.php";
        }
    ?>
    " id="userInfoLink">
        <?php
        if (isset($_SESSION["uNameSecurityPersonnel"])) {
        ?>
            <span id="profileInfoSpan">
                <?php
                if (isset($_SESSION["profilePicturePath"])) {
                ?>
                    <img src="<?php echo $_SESSION["profilePicturePath"]; ?>" alt="Profile Picture" id="profilePictureIcon" />
                <?php
                }
                else {
                    echo "./clientImages/defaultProfileImage.jpg";
                }
                ?>        
                <span class="userInfo">
                    <?php   
                    $userName = $_SESSION["uNameSecurityPersonnel"];
                    $userFullNameQuery = "SELECT fName, lName FROM securityPersonnel WHERE uNameSecurityPersonnel='$userName'";
                    $userFullNameQueryResultSetObject = mysqli_query($connect, $userFullNameQuery);
                    if (mysqli_num_rows($userFullNameQueryResultSetObject) === 1) {
                        $userFullNameRow = mysqli_fetch_assoc($userFullNameQueryResultSetObject);
                        echo $userFullNameRow["fName"] . " " . $userFullNameRow["lName"];
                    }
                    else {
                        // This condition should never be satisfied
                        echo "Sign In";
                    }?>
                </span>
            </span>
            <?php
        }
        else {
            echo "Sign in";
        }
        ?>
    </a>
</nav>
