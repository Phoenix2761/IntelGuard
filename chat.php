<?php
    session_start();
    // require "db_conn.php";
    $_SESSION["currentWebpage"] = "Chats";
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
        <title>Chat</title>
    </head>
    <body id="chatBody">
        <?php
            require "./navigationBar.php";
            require "./sideMenu.php";
        ?>
        <div id="contentMenuContainer">
            <section class="chatSideMenu chatSideMenuShow">
                <span class="searchBar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                    <input type="text" name="searchBarInput" id="searchBarInput" placeholder="Search by name or username" /> 
                    <span class="searchResults">
                        <span class="searchResult">Mark Olueatimi</span>
                        <span class="searchResult">Jay Kipple</span>
                    </span>
                </span>
                <span class="chatItem">
                    <span class="imageContainer">
                        <img src="./clientImages/defaultProfileImage.jpg" alt="PROFILE IMAGE" />
                    </span>
                    <span class="userDetails">
                        <span class="topInfo">
                            <span class="userName">
                                John Awwayp
                            </span>
                            <span class="lastMessageDate">
                                12/10/2025
                            </span>
                        </span>
                        <span class="bottomInfo">
                            <span class="lastMessage">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </span>
                            <span class="unreadMessagesNo">
                                15
                            </span>
                        </span>
                    </span>
                </span>
            </section>
            <section class="chatContainer">
                <div class="chatHeader">
                    <span class="userInfoContainer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 640 640">
                            <path d="M201.4 297.4C188.9 309.9 188.9 330.2 201.4 342.7L361.4 502.7C373.9 515.2 394.2 515.2 406.7 502.7C419.2 490.2 419.2 469.9 406.7 457.4L269.3 320L406.6 182.6C419.1 170.1 419.1 149.8 406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3L201.3 297.3z"/>
                        </svg>
                        <span class="imageContainer">
                            <img src="./clientImages/defaultProfileImage.jpg" alt="PROFILE IMAGE">
                        </span>
                        <span class="usersInfo">
                            <span class="usersName">John Arrayi</span>
                            <span class="onlineStatus">Online</span>
                        </span>
                    </span>
                    <span class="moreInfoContainer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                          <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                        </svg>
                        <span class="moreInfo">
                            <span class="btn moreInfoItem report">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
                                  <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.38 1.38 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51q.205.03.443.051c.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.9 1.9 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2 2 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.2 3.2 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.8 4.8 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591"/>
                                </svg>
                                <span>Report</span>
                            </span>
                            <hr />
                            <span class="btn moreInfoItem block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                  <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                </svg>
                                <span>Block</span>
                            </span>
                        </span>
                    </span>
                </div>
                <div class="mainChat">
                    <div class="chat">
                        <span class="message received">
                            <span class="messageContent">Hello, I an John</span>
                            <span class="metaData">
                                <span class="time">11:33AM</span>
                            </span>
                        </span>
                        <span class="message sent">
                            <span class="messageContent">Hello, I an Michsa</span>
                            <span class="metaData">
                                <span class="time">10:23PM</span>
                                <span class="readStatus">Seen</span>
                            </span>
                        </span>
                        <span class="message sent">
                            <span class="messageContent">Hello, I an Michsa</span>
                            <span class="metaData">
                                <span class="time">10:23PM</span>
                                <span class="readStatus">Seen</span>
                            </span>
                        </span>
                        <span class="message sent">
                            <span class="messageContent">Hello, I an Michsa</span>
                            <span class="metaData">
                                <span class="time">10:23PM</span>
                                <span class="readStatus">Seen</span>
                            </span>
                        </span>
                        <span class="message received">
                            <span class="messageContent">Hello, I an John</span>
                            <span class="metaData">
                                <span class="time">11:33AM</span>
                            </span>
                        </span>
                        <span class="message received">
                            <span class="messageContent">Hello, I an John</span>
                            <span class="metaData">
                                <span class="time">11:33AM</span>
                            </span>
                        </span>
                        <span class="message received">
                            <span class="messageContent">Hello, I an John</span>
                            <span class="metaData">
                                <span class="time">11:33AM</span>
                            </span>
                        </span>
                        <span class="message received">
                            <span class="messageContent">Hello, I an John</span>
                            <span class="metaData">
                                <span class="time">11:33AM</span>
                            </span>
                        </span>
                    </div>
                    <div class="messageActionsContainer">
                        <input name="messageTxtBox" id="messageTxtBox" placeholder="Message..."/>
                        <span class="messageActions">
                            <span class="send">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>
            </section>
        </div>
    <script charset="UTF-8" src="./index.js" type="module"></script>
    </body>
</html>