<?php
    session_start();
    require "db_conn.php";

    $chatId = $_POST["chatId"];
    $userOneUserName = $_POST["userOneUserName"];
    $userTwoUserName = $_POST["userTwoUserName"];
    $userMessage = $_POST["userMessage"];
    $dateSent = $_POST["dateSent"];
    $sqlMessageQuery = "SELECT * FROM chats WHERE id='$chatId'";
    $sqlMessageQueryResultSetObject = mysqli_query($connect, $sqlMessageQuery);
    // $dateTime = new DateTime();
    if (mysqli_num_rows($sqlMessageQueryResultSetObject) === 1) {
        /* $time = $dateTime->format("Y-m-d H:i"); */
        $messagesArray = mysqli_fetch_assoc($sqlMessageQueryResultSetObject);
        $messages = json_decode($messagesArray["messages"]);
        $messages = $messages->chat;
        $messages[] = ["name"=>$userOneUserName, "message"=>$userMessage, "time"=>$dateSent];
        $messages = ["chat" => $messages];
        $messages = json_encode($messages);
        $sqlMessageInsertQuery = "UPDATE chats SET messages='$messages' WHERE id=$chatId";
        $sqlMessageInsertQuery = str_ireplace('\n', " ", $sqlMessageInsertQuery);
        $sqlMessageInsertQueryResultSetObject = mysqli_query($connect, $sqlMessageInsertQuery);
        if ($sqlMessageInsertQueryResultSetObject === true) {
            // echo "SQL query successful";
            ?>
            
            <?php
                // $id = $_POST["chaId"];
                $sqlChatQuery = "SELECT * FROM chats WHERE id=$chatId";
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
                }
                ?>

<?php
        }
        else {
            echo "SQL query unsuccessful";
        }
        // header("Location: ./chat.php");
        // exit();
    }
    else {
        header("Location: ./login.php?status=Please Log In");
        exit();
    }
    // header("refresh: 3");
?>