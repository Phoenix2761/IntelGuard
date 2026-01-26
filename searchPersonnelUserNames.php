<?php
    require "./db_conn.php";
    require "../vendor/autoload.php";
    use Dotenv\Dotenv;
    class SearchClass {
        public $searchQuery;
        function __construct($searchQuery) {
            $dotEnvObject = Dotenv::createImmutable(__DIR__);
            // $dotEnv->load();        
        }

        public static function searchForUsername() {
            global $searchQuery;
            global $connect;
            if (isset($_GET["userName"])) {
                $searchQuery = $_GET["userName"];
            }
            else {
                $searchQuery = null;
            }
            if ((strlen($searchQuery) > 0) && ($searchQuery != null)) {
                // echo "eoj";
                $mySqliPrepareStatement = $connect->query("SELECT uNameSecurityPersonnel FROM pendingPersonnelApplications");
                /*$mySqliPrepareStatement->execute();
                $mySqliPrepareStatement->get_result();*/
                $mySqliPrepareStatementLength = $mySqliPrepareStatement->num_rows;
                $userNameStatus = "";
                for ($i=0; $i<$mySqliPrepareStatementLength; $i++) {
                    $row = $mySqliPrepareStatement->fetch_assoc();
                    if (stristr($row["uNameSecurityPersonnel"], $searchQuery) != false) {
                        $userNameStatus = "currentUserNameTaken";
                        break;
                    }
                    else {
                        continue;
                    }
                }
                if ($userNameStatus != "currentUserNameTaken") {
                    echo "Username is ok";
                }
                else {
                    echo "Username already taken";
                }                
            }
        }
    }

    if (isset($_GET["userName"])) {
        SearchClass::searchForUsername();
    }
    else {
        
    }
?>