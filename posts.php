<?php
    session_start();
    require "./db_conn.php";
    $_SESSION["currentWebpage"] = "Posts";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Posts</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" 
        rel="stylesheet" />
        <link rel="stylesheet" href="./styles.css" />
        <link rel="icon" href="../intelGuardLogo.svg" />
    </head>
    <body id="postsBody">
        <?php
            require "./navigationBar.php";
            require "./sideMenu.php";
        ?>
        <div id="contentMenuContainer">
            <div class="contentContainer">
                <h2>Posts coming soon!</h2>
            </div>
            <button id="loadMoreButton">Load more</button>
            <dialog id="postDialog" class="postDialogShow">
                <button id="removePostModal">&#215;</button>
                <form action="./userPost.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="postTitle" id="postTitle" placeholder="Title...">
                    <textarea name="postBody" id="postBody" placeholder="Content..."></textarea>
                    <section class="inputUploadPreviewContainer">
                        <!--<figure>
                            <img src="./clientImages/defaultProfileImage.jpg" alt="IMAGE POST">
                            <span>Image Name</span>
                            <span class="removeMediaItem">&times;</s>
                            <input type="file" name="fileUploadInput" id="fileUploadInput" />
                        </figure>-->
                    </section>
                    <span id="specialActionsContainer">
                        <span class="postDataBtn" id="fileUploadButton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                              <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z"/>
                            </svg>
                        </span>
                        <button class="postDataBtn" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                              <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                            </svg>
                        </button>
                    </span>
                </form>
            </dialog>
            <button id="postButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FFFFFF" class="bi bi-pen" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                </svg>
            </button>
            <?php
                if (isset($_GET["status"])) {
                    echo $_GET["status"];
                }
                else {
                    // No execution
                }
            ?>
        </div>
        <script charset="UTF-8" src="./index.js" type="module"></script>
    </body>
</html>