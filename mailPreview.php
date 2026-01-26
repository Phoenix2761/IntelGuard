<?php
    session_start();
    // header("Refresh: 3");
    require "db_conn.php";
    $_SESSION["currentWebpage"] = "Chat Preview";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" width="device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Kameron:wght@400..700&family=Kantumruy+Pro:ital,wght@0,100..700;1,100..700&display=swap" 
        rel="stylesheet" />
        <link rel="stylesheet" href="./styles.css" />
        <title>Inbox</title>
    </head>
    <body id="chatPreviewBody">
        <?php
            require "./navigationBar.php";
            require "./sideMenu.php";
        ?>
        <div id="contentMenuContainer">
            <div id="chatDiv">
            <?php
                $id = $_GET["id"];
                $sqlChatQuery = "SELECT * FROM chats WHERE id=$id";
                $sqlChatQueryResultSetObject = mysqli_query($connect, $sqlChatQuery);
                if (mysqli_num_rows($sqlChatQueryResultSetObject) === 1) {
                    $sqlQueryResultSetRow = mysqli_fetch_assoc($sqlChatQueryResultSetObject);
                    if (isset($sqlQueryResultSetRow)) {
                        $messages = json_decode($sqlQueryResultSetRow["messages"], false);
                        for ($i=0; $i<count($messages->chat); $i++) {
                ?>
                            <div class="<?php if ($messages->chat[$i]->name === $_SESSION["uNameSecurityPersonnel"]) {echo "userOneChatSubContainer";} else if ($messages->chat[$i]->name !== $_SESSION["uNameSecurityPersonnel"]) {echo "userTwoChatSubContainer";}
                                            else {
                                                // No execution
                                            }
                                        ?>">
                                <span class="<?php if ($messages->chat[$i]->name === $_SESSION["uNameSecurityPersonnel"]) {echo "userOneUserNameSpan";}
                                                else if ($messages->chat[$i]->name !== $_SESSION["uNameSecurityPersonnel"]) {echo "userTwoUserNameSpan";}
                                                else {
                                                    // No execution
                                                }
                                            ?>">
                                    <?php
                                        echo $messages->chat[$i]->name;
                                    ?>
                                </span>
                                <span class="<?php
                                                if ($messages->chat[$i]->name === $_SESSION["uNameSecurityPersonnel"]) {echo "userOneMessageSpan";}
                                                else if ($messages->chat[$i]->name !== $_SESSION["uNameSecurityPersonnel"]) {echo "userTwoMessageSpan";}
                                                else {
                                                    // No execution
                                                }
                                            ?>">
                                    <?php
                                        // var_dump($messages);
                                        echo $messages->chat[$i]->message;
                                    ?>
                                </span>
                            </div>
                <?php
                        }
                    }
                    else {
                        echo "sqlQueryResultRow variable is not set";
                    }
                ?>
            </div>
            <div id="messageSubContainer" class="<?php
                    if (isset($sqlQueryResultSetRow["id"])) {
                        echo $sqlQueryResultSetRow["id"];
                    }
                    else {
                        // No execution
                    }
                ?>">
                <textarea type="text" name="userMessage" id="userMessage" placeholder="Type message"></textarea>
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="22" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
                    </svg>
                </button>
            </div>
            <?php
                }
            ?>
        </div>
        <script src="./index.js" charset="UTF-8"></script>
    </body>
</html>