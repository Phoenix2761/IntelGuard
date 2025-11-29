<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" 
        rel="stylesheet" />
        <title>About</title>
        <link rel="icon" href="./intelGuardLogo.svg" />
        <link rel="stylesheet" href="./homePageStyles.css"/>
    </head>
    <body id="aboutBody">
        <div class="heroSection" id="heroSectionDiv">
            <img src="../images/heroSectionBackground.png" alt="HERO SECTION" class="heroSectionImage" />
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
                    <li><a href="#">ABOUT</a></li>
                    <hr />
                    <li><a href="./login.php">LOGIN</a></li>
                    <hr class="hrSecondToLast" />
                    <li class="getStartedLinkListItem">
                    <a href="#" class="getStartedListItemLink">GET STARTED</a></li>
                    <hr class="hrLast" />
                </ul>
                <a href="./index.php#sectionThree" class="getStartedLink">
                    GET STARTED
                </a>
                <button class="hamburgerMenu">
                    <span class="hamburgerMenuBarOne"></span>
                    <span class="hamburgerMenuBarTwo"></span>
                </button>
            </nav>

            <h2 class="heroSectionh2">About
                <p class="heroSectionP">IntelGuard is a security company that provides 24/7 access to reliable security personnel accross Nigeria.</p>
            </h2>
            
            <section class="aboutCard" id="aboutCardOne">
                <h2 class="title">
                    Our Mission
                </h2>
                <p>To provide world class security to out customers allowing them to go anywhere, anytime.</p>
            </section>
            <section class="aboutCard" id="aboutCardTwo">
                <h2 class="title">
                    Our Vision
                </h2>
                <p>To create a society where every persons safety is the uptmost priority.</p>
            </section>
            <section class="aboutCard" id="aboutCardThree">
                <h2 class="title">
                    Our Services
                </h2>
                <ul>
                    <li>Personel Escorting</li>
                    <li>Secure and Reliable rides</li>
                    <li>Crowd Control</li>
                    <li>Access Control</li>
                    <li>Security Contract Services</li>
                </ul>
                <p>We also provide jobs upportunitied for security personnel.</p>
            </section>
        </div>
        <?php
            require "./footer.php";
        ?>
        <script charset="UTF-8" src="./homepage.js"></script>
    </body>
</html>