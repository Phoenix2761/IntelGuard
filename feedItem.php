<?php
    session_start();
    require "./db_conn.php";

    $sqlJobQuery = "SELECT id FROM jobs";
    $sqlIdQueryResultSetObject = mysqli_query($connect, $sqlJobQuery);
    $resultRow2 = [];
    $resultRowNums = mysqli_num_rows($sqlIdQueryResultSetObject);
    $numOfFeedItems = 6;
    $numOfMoreItems = null;
    $numOfSentItems = null;


    if (isset($_GET["n"])) {
        $numOfFeedItems = $_GET["n"];
    }
    if (isset($_GET["loadMoreItems"])) {
        $numOfMoreItems = $_GET["loadMoreItems"];
    }
    if (isset($_GET["numOfSentItems"])) {
        $numOfSentItems = $_GET["numOfSentItems"];
    }


    if (isset($_GET["loadMoreItems"])) {
        $sqlQuery="";
        if ($resultRowNums <= $numOfSentItems) {
            // No execution
        }
        else if (($resultRowNums > $numOfSentItems) && ($resultRowNums > ($numOfSentItems + $numOfMoreItems))) {
            $numsItemsLeft = $resultRowNums - $numOfSentItems;
            $numOfRequested = $numsItemsLeft - $numOfMoreItems;
            $sqlQuery = "SELECT * FROM jobs";
            $sqlQueryResultSetObject = mysqli_query($connect, $sqlQuery);
            $itemsLeftResultSetRow = [];
            $resultSetRow = null;
            for ($i=0; $i<$numsItemsLeft; $i++) {
                $itemsLeftResultSetRow[] = mysqli_fetch_assoc($sqlQueryResultSetObject);
            }

            for ($index=($numsItemsLeft-1); $index>=($numOfRequested); $index--) {
                $resultSetRow = $itemsLeftResultSetRow[$index];
                // $resultSetRow
?>
                <div class="post">
                    <div class="userInfoContainer">
                        <span class="imageContainer">
                            <img src="
                            <?php
                                if (isset($resultRow2[$j]["profilePhotoImagePath"])) {
                                    echo $resultRow2[$j]["profilePhotoImagePath"];
                                }
                                else if ($resultRow2[$j]["jobImagePath"] = null) {
                                    echo "../clientImages/defaultProfileImage.jpg";
                                }
                                else {
                                    // No execution
                                }
                            ?>" alt="POST IMAGE" />
                        </span>
                        <span class="userInfo">
                            <span class="userName">
                                <?php
                                    if (isset($resultRow2[$j]["postedBy"])) {
                                        echo $resultRow2[$j]["postedBy"];
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>
                            </span>
                            <span class="otherUserData">
                                <?php
                                    if (isset($resultRow2[$j]["datePosted"])) {
                                        echo " " . $resultRow2[$j]["datePosted"] . " ";
                                        // echo $resultRow2[$j]["timePosted"];
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>
                            </span>
                        </span>
                    </div>
                    <span class="postDetails">
                        <span class="postTitle">
                            <?php
                                if (isset($resultRow2[$j]["title"])) {
                                    echo $resultRow2[$j]["title"];
                                }
                                else {
                                    // No execution
                                }
                            ?>
                        </span>
                        <span class="postDescription">
                            <p><?php
                                if (isset($resultRow2[$j]["jobDescription"])) {
                                    echo $resultRow2[$j]["jobDescription"];
                                }
                                else {
                                    // No executed
                                }
                            ?></p>
                        </span>
                    </span>
                    <div class="postLastItemsContainer">
                        <span class="buttonsContainer">
                            <button class="commentButton btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                  <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"/>
                                </svg>
                                <span class="commentsCount">2103</span>
                                <span>Comments</span>
                            </button>
                            <button class="likeButton btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF0000" class="bi bi-heart-fill hide" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                                <span class="likesCount">5120</span>
                                <span>Likes</span>
                            </button>
                        </span>
                        <button class="btn seeMoreButton">
                            See More
                        </button>
                        <button class="btn seeLessButton">
                            See Less
                        </button>
                    </div>
                    <div class="commentsContainer">
                        <div class="createCommentContainer">
                            <span class="imageContainer">
                                <img src="
                                <?php
                                    if (isset($resultRow2[$j]["profilePhotoImagePath"])) {
                                        echo $resultRow2[$j]["profilePhotoImagePath"];
                                    }
                                    else if ($resultRow2[$j]["jobImagePath"] = null) {
                                        echo "../clientImages/defaultProfileImage.jpg";
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>" alt="POST IMAGE" />
                            </span>
                            <input type="text" name="userComment" class="userComment" placeholder="Comment..." />
                        </div>
                        <div class="commentSection">
                            <div class="comment">
                                <span class="imageContainer">
                                    <img src="
                                    <?php
                                        if (isset($resultRow2[$j]["profilePhotoImagePath"])) {
                                            echo $resultRow2[$j]["profilePhotoImagePath"];
                                        }
                                        else if ($resultRow2[$j]["jobImagePath"] = null) {
                                            echo "../clientImages/defaultProfileImage.jpg";
                                        }
                                        else {
                                            // No execution
                                        }
                                    ?>" alt="POST IMAGE" />
                                </span>
                                <span class="userInfo">
                                    <span class="userName">
                                        Mary002
                                    </span>
                                    <span class="otherUserData">
                                        Can't wait!
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
            
<?php
            }
            // echo "testString";
        }
        else if ($resultRowNums > $numOfSentItems) {
            $sqlQueryTwo = "SELECT * FROM jobs";
            $sqlQueryResultTwoResultSetObject = mysqli_query($connect, $sqlQueryTwo);
            $resultSetRowThreeArray = [];            
            for ($i=$resultRowNums; $i>0; $i--) {
                $resultSetRowThreeArray[] = mysqli_fetch_assoc($sqlQueryResultTwoResultSetObject);
            }

            $startIndex = (count($resultSetRowThreeArray) - $numOfSentItems) - 1;
            for ($index2=0; $index2 <= $startIndex; $index2++) {
                // $resultSetRowThreeArray[$index2]
?>
                <div class="post">
                    <div class="userInfoContainer">
                        <span class="imageContainer">
                            <img src="
                            <?php
                                if (isset($resultSetRowThreeArray[$index2]["profilePhotoImagePath"])) {
                                    echo $resultSetRowThreeArray[$index2]["profilePhotoImagePath"];
                                }
                                else if ($resultSetRowThreeArray[$index2]["jobImagePath"] = null) {
                                    echo "../clientImages/defaultProfileImage.jpg";
                                }
                                else {
                                    // No execution
                                }
                            ?>" alt="POST IMAGE" />
                        </span>
                        <span class="userInfo">
                            <span class="userName">
                                <?php
                                    if (isset($resultSetRowThreeArray[$index2]["postedBy"])) {
                                        echo $resultSetRowThreeArray[$index2]["postedBy"];
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>
                            </span>
                            <span class="otherUserData">
                                <?php
                                    if (isset($resultSetRowThreeArray[$index2]["datePosted"])) {
                                        echo " " . $resultSetRowThreeArray[$index2]["datePosted"] . " ";
                                        // echo $resultRow2[$j]["timePosted"];
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>
                            </span>
                        </span>
                    </div>
                    <span class="postDetails">
                        <span class="postTitle">
                            <?php
                                if (isset($resultSetRowThreeArray[$index2]["title"])) {
                                    echo $resultSetRowThreeArray[$index2]["title"];
                                }
                                else {
                                    // No execution
                                }
                            ?>
                        </span>
                        <span class="postDescription">
                            <p><?php
                                if (isset($resultSetRowThreeArray[$index2]["jobDescription"])) {
                                    echo $resultSetRowThreeArray[$index2]["jobDescription"];
                                }
                                else {
                                    // No executed
                                }
                            ?></p>
                        </span>
                    </span>
                    <div class="postLastItemsContainer">
                        <span class="buttonsContainer">
                            <button class="commentButton btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                  <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"/>
                                </svg>
                                <span class="commentsCount">2103</span>
                                <span>Comments</span>
                            </button>
                            <button class="likeButton btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF0000" class="bi bi-heart-fill hide" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                                <span class="likesCount">5120</span>
                                <span>Likes</span>
                            </button>
                        </span>
                        <button class="btn seeMoreButton">
                            See More
                        </button>
                        <button class="btn seeLessButton">
                            See Less
                        </button>
                    </div>
                    <div class="commentsContainer">
                        <div class="createCommentContainer">
                            <span class="imageContainer">
                                <img src="
                                <?php
                                    if (isset($resultSetRowThreeArray[$index2]["profilePhotoImagePath"])) {
                                        echo $resultSetRowThreeArray[$index2]["profilePhotoImagePath"];
                                    }
                                    else if ($resultSetRowThreeArray[$index2]["jobImagePath"] = null) {
                                        echo "../clientImages/defaultProfileImage.jpg";
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>" alt="POST IMAGE" />
                            </span>
                            <input type="text" name="userComment" class="userComment" placeholder="Comment..." />
                        </div>
                        <div class="commentSection">
                            <div class="comment">
                                <span class="imageContainer">
                                    <img src="
                                    <?php
                                        if (isset($resultSetRowThreeArray[$index2]["profilePhotoImagePath"])) {
                                            echo $resultSetRowThreeArray[$index2]["profilePhotoImagePath"];
                                        }
                                        else if ($resultSetRowThreeArray[$index2]["jobImagePath"] = null) {
                                            echo "../clientImages/defaultProfileImage.jpg";
                                        }
                                        else {
                                            // No execution
                                        }
                                    ?>" alt="POST IMAGE" />
                                </span>
                                <span class="userInfo">
                                    <span class="userName">
                                        Mary002
                                    </span>
                                    <span class="otherUserData">
                                        Can't wait!
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
<?php
            }
        }
        else {
            // No execution
        }
        // $numOfMoreItems--;
    }
    else if (isset($_GET["n"])) {
        if ($resultRowNums >= $numOfFeedItems) {
            // $resultRow2 = [];
            // for ($currentIndex=$numOfFeedItems; $currentIndex>0; $currentIndex--) {
            $sqlLastItemQuery = "SELECT * FROM jobs";
            $sqlJobQueryResultSetObject = mysqli_query($connect, $sqlLastItemQuery);
            // $resultRowNums--;
            for ($i=$resultRowNums; $i>0; $i--) {
                $resultRow2[] = mysqli_fetch_assoc($sqlJobQueryResultSetObject);
            }
                $resultRowTwoNum = (count($resultRow2) - 1);
                for ($j=$resultRowTwoNum; $j >= ($resultRowTwoNum - ($numOfFeedItems - 1)); $j--) {
                    // $resultRow2 = mysqli_fetch_assoc($sqlJobQueryResultSetObject);
                    // echo "Test";
?>                  
                    <div class="post">
                        <div class="userInfoContainer">
                            <span class="imageContainer">
                                <img src="
                                <?php
                                    if (isset($resultRow2[$j]["profilePhotoImagePath"])) {
                                        echo $resultRow2[$j]["profilePhotoImagePath"];
                                    }
                                    else if ($resultRow2[$j]["jobImagePath"] = null) {
                                        echo "../clientImages/defaultProfileImage.jpg";
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>" alt="POST IMAGE" />
                            </span>
                            <span class="userInfo">
                                <span class="userName">
                                    <?php
                                        if (isset($resultRow2[$j]["postedBy"])) {
                                            echo $resultRow2[$j]["postedBy"];
                                        }
                                        else {
                                            // No execution
                                        }
                                    ?>
                                </span>
                                <span class="otherUserData">
                                    <?php
                                        if (isset($resultRow2[$j]["datePosted"])) {
                                            echo " " . $resultRow2[$j]["datePosted"] . " ";
                                            // echo $resultRow2[$j]["timePosted"];
                                        }
                                        else {
                                            // No execution
                                        }
                                    ?>
                                </span>
                            </span>
                        </div>
                        </span>
                        <span class="postDetails">
                            <span class="postTitle">
                                <?php
                                    if (isset($resultRow2[$j]["title"])) {
                                        echo $resultRow2[$j]["title"];
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>
                            </span>
                            <span class="postDescription">
                                <p><?php
                                    if (isset($resultRow2[$j]["jobDescription"])) {
                                        echo $resultRow2[$j]["jobDescription"];
                                    }
                                    else {
                                        // No executed
                                    }
                                ?></p>
                            </span>
                        </span>
                        <div class="postLastItemsContainer">
                            <span class="buttonsContainer">
                                <button class="commentButton btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                      <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                      <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"/>
                                    </svg>
                                    <span class="commentsCount">2103</span>
                                    <span>Comments</span>
                                </button>
                                <button class="likeButton btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF0000" class="bi bi-heart-fill hide" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                                    <span class="likesCount">5120</span>
                                    <span>Likes</span>
                                </button>
                            </span>
                            <button class="btn seeMoreButton">
                                See More
                            </button>
                            <button class="btn seeLessButton">
                                See Less
                            </button>
                        </div>
                        <div class="commentsContainer">
                            <div class="createCommentContainer">
                                <span class="imageContainer">
                                    <img src="
                                    <?php
                                        if (isset($resultRow2[$j]["profilePhotoImagePath"])) {
                                            echo $resultRow2[$j]["profilePhotoImagePath"];
                                        }
                                        else if ($resultRow2[$j]["jobImagePath"] = null) {
                                            echo "../clientImages/defaultProfileImage.jpg";
                                        }
                                        else {
                                            // No execution
                                        }
                                    ?>" alt="POST IMAGE" />
                                </span>
                                <input type="text" name="userComment" id="userComment" placeholder="Comment..." />
                            </div>
                            <div class="commentSection">
                                <div class="comment">
                                    <span class="imageContainer">
                                        <img src="
                                        <?php
                                            if (isset($resultRow2[$j]["profilePhotoImagePath"])) {
                                                echo $resultRow2[$j]["profilePhotoImagePath"];
                                            }
                                            else if ($resultRow2[$j]["jobImagePath"] = null) {
                                                echo "../clientImages/defaultProfileImage.jpg";
                                            }
                                            else {
                                                // No execution
                                            }
                                        ?>" alt="POST IMAGE" />
                                    </span>
                                    <span class="userInfo">
                                        <span class="userName">
                                            Mary002
                                        </span>
                                        <span class="otherUserData">
                                            Can't wait!
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
<?php
                }
            }
        // }
        else if ($resultRowNums < $numOfFeedItems) {
            $sqlLastItemQuery="SELECT * FROM jobs";
            $sqlJobQueryResultSetObject = mysqli_query($connect, $sqlLastItemQuery);
            $resultRow2 = [];
            for ($k=0; $k<$resultRowNums; $k++) {
                $resultRow2[] = mysqli_fetch_assoc($sqlJobQueryResultSetObject);
            }
            $resultRowNums -= 1;
            for ($currentIndex=$resultRowNums; $currentIndex>=0; $currentIndex--) {
?> 
                <div class="post">
                    <div class="userInfoContainer">
                        <span class="imageContainer">
                            <img src=" <?php
                                if (isset($resultRow2[$currentIndex]["profilePhotoImagePath"])) {
                                    echo $resultRow2[$currentIndex]["profilePhotoImagePath"];
                                }
                                else if ($resultRow2[$currentIndex]["jobImagePath"] = null) {
                                    echo "../clientImages/defaultProfileImage.jpg";
                                }
                                else {
                                    // No execution
                                }
                            ?>" alt="POST IMAGE" />
                        </span>
                        <span class="userInfo">
                            <span class="userName">
                                <?php
                                    if (isset($resultRow2[$currentIndex]["postedBy"])) {
                                        echo $resultRow2[$currentIndex]["postedBy"];
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>
                            </span>
                            <span class="otherUserData">
                                <?php
                                    if (isset($resultRow2[$currentIndex]["datePosted"])) {
                                        echo " " . $resultRow2[$currentIndex]["datePosted"] . " ";
                                        // echo $resultRow2[$j]["timePosted"];
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>
                            </span>
                        </span>
                    </div>
                    <span class="postDetails">
                        <span class="postTitle">
                            <?php
                                if (isset($resultRow2[$currentIndex]["title"])) {
                                    echo $resultRow2[$currentIndex]["title"];
                                }
                                else {
                                    // No execution
                                }
                            ?>
                        </span>
                        <span class="postDescription">
                            <p>
                            <?php
                                if (isset($resultRow2[$currentIndex]["jobDescription"])) {
                                    echo $resultRow2[$currentIndex]["jobDescription"];
                                }
                                else {
                                    // No executed
                                }
                            ?></p>
                            <section class="postMediaCarousel">
                                <section class="mediaContainer">
                                    <img src="./clientImages/flyer2.png" alt="POST IMAGE"  class="postImage activePostMedia" />
                                    <img src="./clientImages/image3.png" alt="POST IMAGE"  class="postImage" />
                                    <img src="./clientImages/sampleImage2.png" alt="POST IMAGE"  class="postImage" />
                                    <video controls class="postVideo">
                                        <source src="../securityWebApplicationDemo.mp4" type="video/mp4">
                                    </video>
                                </section>
                                <button class="previous">&#60;</button>
                                <button class="next">&#62;</button>
                                <span class="slideIndicatorsContainer">
                                    <span class="slideIndicator slideIndicatorActive"></span>
                                    <span class="slideIndicator"></span>
                                    <span class="slideIndicator"></span>
                                    <span class="slideIndicator"></span>
                                </span>
                            </section>
                        </span>
                    </span>
                    <div class="postLastItemsContainer">
                        <span class="buttonsContainer">
                            <button class="commentButton btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                                  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                  <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2"/>
                                </svg>
                                <span class="commentsCount">2103</span>
                                <span>Comments</span>
                            </button>
                            <button class="likeButton btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF0000" class="bi bi-heart-fill hide" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                                <span class="likesCount">5120</span>
                                <span>Likes</span>
                            </button>
                        </span>
                        <button class="btn seeMoreButton">
                            See More
                        </button>
                        <button class="btn seeLessButton">
                            See Less
                        </button>
                    </div>
                    <div class="commentsContainer">
                        <div class="createCommentContainer">
                            <span class="imageContainer">
                                <img src="
                                <?php
                                    if (isset($resultRow2[$currentIndex]["profilePhotoImagePath"])) {
                                        echo $resultRow2[$currentIndex]["profilePhotoImagePath"];
                                    }
                                    else if ($resultRow2[$currentIndex]["jobImagePath"] = null) {
                                        echo "../clientImages/defaultProfileImage.jpg";
                                    }
                                    else {
                                        // No execution
                                    }
                                ?>" alt="POST IMAGE" />
                            </span>
                            <input type="text" name="userComment" id="userComment" placeholder="Comment..." />
                        </div>
                        <div class="commentSection">
                            <div class="comment">
                                <span class="imageContainer">
                                    <img src="
                                    <?php
                                        if (isset($resultRow2[$currentIndex]["profilePhotoImagePath"])) {
                                            echo $resultRow2[$currentIndex]["profilePhotoImagePath"];
                                        }
                                        else if ($resultRow2[$currentIndex]["jobImagePath"] = null) {
                                            echo "../clientImages/defaultProfileImage.jpg";
                                        }
                                        else {
                                            // No execution
                                        }
                                    ?>" alt="POST IMAGE" />
                                </span>
                                <span class="userInfo">
                                    <span class="userName">
                                        Mary002
                                    </span>
                                    <span class="otherUserData">
                                        Can't wait!
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
<?php       
            }
        }
        else {
            echo "Null data value.";
        }
    }
    else {
        echo "No execution";
    }
?>  

