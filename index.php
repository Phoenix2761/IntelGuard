<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" 
        rel="stylesheet" />
        <link rel="stylesheet" href="./homePageStyles.css" />
        <title>IntelGuard</title>
        <link rel="icon" href="./intelGuardLogo.svg" />
    </head>
    <body>
        <div class="heroSection" id="heroSectionDiv">
            <img src="./heroSectionBackground.png" alt="HERO SECTION" class="heroSectionImage" />
            <nav>
                <span class="navbarLogoContainer">
                    <h2>IntelGuard</h2>
                </span>
                <ul class="navUl">
                    <hr class="hrFirst" />
                    <li><a href="./index.php">HOME</a></li>
                    <hr />
                    <li><a href="#footer">CONTACT US</a></li>
                    <hr />
                    <li><a href="./about.php">ABOUT</a></li>
                    <hr />
                    <li><a href="./login.php">LOGIN</a></li>
                    <hr class="hrSecondToLast" />
                    <li class="getStartedLinkListItem">
                    <a href="#" class="getStartedListItemLink">GET STARTED</a></li>
                    <hr class="hrLast" />
                </ul>
                <a href="#" class="getStartedLink">
                    GET STARTED
                </a>
                <button class="hamburgerMenu">
                    <span class="hamburgerMenuBarOne"></span>
                    <span class="hamburgerMenuBarTwo"></span>
                </button>
            </nav>

            <h2 class="heroSectionh2">PREPARED TO SECURE OUR CLIENTS <br />
                ANYTIME, ANYWHERE <br />
                <p class="heroSectionP">We connect you to professional security personnel<br />
                as quickly and reliably as possible.</p>
            </h2>
        </div>
        <div class="sectionTwo">
            <h2 class="sectionTwoH2">We offer a wide range of <br /> security services</h2>
            <div class="servicesContainer">
                <div class="servicesSubContainer" id="servicesSubContainerOne">
                    <span id="servicesContainerItemOne">Airport Pickup</span>
                </div>
                <div class="servicesSubContainer" id="servicesSubContainerTwo">
                    <span id="servicesContainerItemTwo">Crowd Control</span>
                </div>
                <div class="servicesSubContainer" id="servicesSubContainerThree">
                    <span id="servicesContainerItemThree">Personal Escorts <br />
                    </span>
                </div>
                <div class="servicesSubContainer" id="servicesSubContainerFour">
                    <span id="servicesContainerItemFour">Access Control</span>
                </div>
            </div>
        </div>
        <div class="sectionThree" id="sectionThree">
            <h2 class="sectionThreeH2">How can we help?</h2>
            <div class="categoriesContainer">
                <div class="cardOne">
                    <p>Get as many security personnel <br />
                    as you need within minutes.</p>
                    <a class="categoryOne" href="#">GET PERSONNEL</a>
                </div>
                <div class="cardTwo">
                    <p>We also provide jobs for <br />
                    promising security personnel.</p>
                    <a class="categoryTwo" href="#">GET A GIG</a>
                </div>
            </div>
        </div>
        <?php
            require "./footer.php";
        ?>
        <script src="./homePage.js" charset="UTF-8" type="module"></script>
    </body>

</html>
