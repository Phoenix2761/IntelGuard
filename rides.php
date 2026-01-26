<?php
    session_start();
    require "db_conn.php";
    $_SESSION["currentWebpage"] = "Rides";
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
        <link rel="icon" href="../intelGuardLogo.svg" />
        <link rel="stylesheet" href="./styles.css" />
        <title>Rides</title>
    </head>
    <body id="ridesBody">
        <?php
            require "./navigationBar.php";
            require "./sideMenu.php";
        ?>
        <div id="contentMenuContainer">
            <section class="locationActions">
                <span class="searchBar pickupLocationSearchBar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                      <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                    </svg>
                    <input type="text" id="searchBarInput" name="destination" placeholder="Location" >
                    <span class="searchResults">
                        <span class="searchResult">Kogi, Lorem ipsum dolor sit.</span>
                        <span class="searchResult">logoa Lorem ipsum dolor sit amet consectetur.</span>
                    </span>
                </span>
                <span class="searchBar destinationSearchBar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                      <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                    </svg>
                    <input type="text" id="searchBarInput" name="destination" placeholder="Location" >
                    <span class="searchResults">
                        <span class="searchResult">Kogi, Lorem ipsum dolor sit.</span>
                        <span class="searchResult">logoa Lorem ipsum dolor sit amet consectetur.</span>
                    </span>
                </span>
            </section>
            <iframe>
            </iframe>
            <span class="actionsContainer">
                <button class="bookDriver">
                    Book
                </button>
            </span>
        </div>
    <script charset="UTF-8" src="./index.js" type="module"></script>
    </body>
</html>