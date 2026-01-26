<?php
    session_start();
    require "./db_conn.php";
    $_SESSION["currentWebpage"] = "Personnel Feed";
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
        <link rel="stylesheet" href="./styles.css" />
        <link rel="icon" href="../intelGuardLogo.svg" />
        <title>Personnel Feed</title>
    </head>
    <body id="personnelFeedBody">
        <?php
            require "./navigationBar.php";
            require "./sideMenu.php";   
        ?>
        <div id="contentMenuContainer">
            <span class="searchBar">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
                <input type="text" name="searchBarInput" id="searchBarInput" placeholder="Search by name, location..." /> 
                <span class="searchResults"></span>
            </span>
            <section class="personnelFeedContainer">
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
                <figure class="personnelCard">
                    <img src="./clientImages/defaultProfileImage.jpg" alt="Profile Image" />
                    <figcaption class="fullName">John Toyin</figcaption>
                    <figcaption class="State">Kogi</figcaption>
                    <figcaption class="Country">Nigeria</figcaption>
                </figure>
            </section>
        </div><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="./index.js" charset="UTF-8" type="module"></script>
    </body>
</html>