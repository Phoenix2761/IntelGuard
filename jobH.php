<?php
    /*session_start();
    require "./db_conn.php";
    // $_GET["applicantUserName"] = "kin1";
    if (isset($_GET["applicantUserName"])) {
        $applicantUserName = $_GET["applicantUserName"];
        $jobId = $_GET["jobId"];
        $sqlIdQuery = "SELECT personnelId FROM securityPersonnel WHERE uNameSecurityPersonnel='$applicantUserName'";
        $sqlIdQueryResultSetObject = mysqli_query($connect, $sqlIdQuery);
        if (mysqli_num_rows($sqlIdQueryResultSetObject) == 1) {
            $sqlIdRow = mysqli_fetch_assoc($sqlIdQueryResultSetObject);
            $sqlApplicantsQuery = "SELECT applicants FROM jobs WHERE id='$jobId'";
            $sqlApplicantsQueryResultSetObject = mysqli_query($connect, $sqlApplicantsQuery);
            if (mysqli_num_rows($sqlApplicantsQueryResultSetObject) == 1) {
                $sqlApplicantsJsonRow = mysqli_fetch_assoc($sqlApplicantsQueryResultSetObject);
                $applicantId = $sqlIdRow["personnelId"];
                $userIdJsonData = json_decode($sqlApplicantsJsonRow["applicants"]);
                $userIdJsonDataIds = $userIdJsonData->ids;
                $userIdJsonDataIds[] = $applicantId;
                $userIdJsonDataIdsArray = ["ids"=>$userIdJsonDataIds];
                $userIdJsonData = json_encode($userIdJsonDataIdsArray);
                $sqlInsertQuery = "UPDATE jobs SET applicants='$userIdJsonData' WHERE id='$jobId'";
                $sqlInsertQueryResultSetObject = mysqli_query($connect, $sqlInsertQuery);
                if ($sqlInsertQueryResultSetObject == true) {
                    $sqlSecurityPersonnelJobsQuery = "SELECT pendingJobs FROM securityPersonnel WHERE personnelId=$applicantId";
                    $sqlSecurityPersonnelJobsQueryResultSetObject = mysqli_query($connect, $sqlSecurityPersonnelJobsQuery);
                    if (mysqli_num_rows($sqlSecurityPersonnelJobsQueryResultSetObject) == 1) {
                        $sqlJobsIdsRow = mysqli_fetch_assoc($sqlSecurityPersonnelJobsQueryResultSetObject);
                        $pendingJobsArray = json_decode($sqlJobsIdsRow["pendingJobs"])->jobs;
                        $pendingJobsArray[] = $jobId;
                        $pendingJobsArray = ["jobs"=>$pendingJobsArray];
                        $pendingJobsArray = json_encode($pendingJobsArray);
                        $sqlPendingJobsUpdateArrayQuery = "UPDATE securityPersonnel SET pendingJobs='$pendingJobsArray' WHERE personnelId=$applicantId";
                        $sqlPendingJobsUpdateResultSetObject = mysqli_query($connect, $sqlPendingJobsUpdateArrayQuery);
                        if ($sqlPendingJobsUpdateResultSetObject == true) {
                            header("Location: ./jobs.php?status=Application Successful!");
                            exit();
                        }
                        else {
                            header("Location: ./jobs.php?status=Application unsuccessful, please try again");
                            exit();
                        }
                    }
                    else {
                        header("Location: ./jobs.php?status=User has no current Jobs");
                        exit();
                    }
                }
                else {
                    // This condition will never be satisfied
                    header("Location: ./jobs.php?status=Application for failed");
                    exit();
                }
            }
            else {
                header("Location: ./jobs.php?status=Unknown applicant");
                exit();
            }
            
        }
        else {
            header("Location: ./jobs.php?status=Unknown User");
            exit();
        }
    }
    else if (isset($_GET["cancelApplication"])) {
        $applicantUserName = $_GET["applicantsUserName"];
        $jobId = $_GET["jobId"];
        $sqlIdQuery = "SELECT personnelId FROM securityPersonnel WHERE uNameSecurityPersonnel='$applicantUserName'";
        $sqlIdQueryResultSetObject = mysqli_query($connect, $sqlIdQuery);
        if (mysqli_num_rows($sqlIdQueryResultSetObject) == 1) {
            $sqlIdRow = mysqli_fetch_assoc($sqlIdQueryResultSetObject);
            // echo $jobId;
            $sqlApplicantsQuery = "SELECT applicants FROM jobs WHERE id=$jobId";
            $sqlApplicantsQueryResultSetObject = mysqli_query($connect, $sqlApplicantsQuery);
            if (mysqli_num_rows($sqlApplicantsQueryResultSetObject) == 1) {
                // echo "Test2";
                $sqlApplicantsJsonRow = mysqli_fetch_assoc($sqlApplicantsQueryResultSetObject);
                $applicantId = $sqlIdRow["personnelId"];
                // echo $applicantId;
                $userIdJsonData = json_decode($sqlApplicantsJsonRow["applicants"]);
                // var_dump($userIdJsonData);
                $userIdJsonDataIds = $userIdJsonData->ids;
                // var_dump($userIdJsonDataIds);
                for ($i=0; $i<count($userIdJsonDataIds); $i++) {
                    // echo "Test3";
                    if ($userIdJsonDataIds[$i] == $applicantId) {
                        // echo "Test4";
                        array_splice($userIdJsonDataIds, $i, 1);
                        $userIdJsonDataIds = array_values($userIdJsonDataIds);
                        $userIdJsonData = ["ids"=>$userIdJsonDataIds];
                        var_dump($userIdJsonData);
                        $userIdJsonData = json_encode($userIdJsonData);
                        $sqlJobsUpdateQuery = "UPDATE jobs SET applicants='$userIdJsonData' WHERE id=$jobId";
                        $sqlJobsUpdateQueryResultSetObject = mysqli_query($connect, $sqlJobsUpdateQuery);
                        if ($sqlJobsUpdateQueryResultSetObject == true) {
                            // echo "Test5";
                            $sqlSecurityPersonnelJobsQuery = "SELECT pendingJobs FROM securityPersonnel WHERE personnelId=$applicantId";
                            $sqlSecurityPersonnelJobsQueryResultSetObject = mysqli_query($connect, $sqlSecurityPersonnelJobsQuery);
                            if (mysqli_num_rows($sqlSecurityPersonnelJobsQueryResultSetObject) == 1) {
                                // echo "Test6";
                                $sqlPendingJobsRow = mysqli_fetch_assoc($sqlSecurityPersonnelJobsQueryResultSetObject);
                                $sqlJobsIdsJsonObject = json_decode($sqlPendingJobsRow["pendingJobs"]);
                                $sqlJobsIdsRow = $sqlJobsIdsJsonObject->jobs;
                                for ($j=0; $j<count($sqlJobsIdsRow); $j++) {
                                    if ($sqlJobsIdsRow[$j] == $jobId) {
                                        // echo "Test7";
                                        array_splice($sqlJobsIdsRow, $j, 1);
                                        $sqlJobsIdsRow = array_values($sqlJobsIdsRow);
                                        $sqlJobsIdsJsonObject = ["jobs"=>$sqlJobsIdsRow]; 
                                        $sqlJobsIdsJsonObject = json_encode($sqlJobsIdsJsonObject);
                                        $sqlPendingJobsInsertQuery = "UPDATE securityPersonnel SET pendingJobs='$sqlJobsIdsJsonObject' WHERE personnelId=$applicantId";
                                        $sqlPendingJobsInsertQueryResultSetObject = mysqli_query($connect, $sqlPendingJobsInsertQuery);
                                        if ($sqlPendingJobsInsertQueryResultSetObject == true) {
                                            echo "Section containing header reached";
                                            header("Location: ./jobs.php?status=Application cancelled Successfully!");
                                            exit();
                                        }
                                        else {
                                            header("Location: ./jobs.php?status=UNKNOWN USER!");
                                            exit();
                                        }
                                    }
                                    else {
                                        continue;
                                    }
                                }
                            }
                            else {
                                header("Location: ./jobs.php?status=User not recognized");
                                exit();
                            }
                        }
                        else {
                            header("Location: ./jobs.php?status=Application cancellation failed");
                            exit();
                        }
                    }
                    else {
                        continue;
                    }
                    // echo "TestPre";
                }
                // echo "Test";
                /*
                if ($sqlInsertQuery == true) {
                    header("Location: ./jobs.php?status=Application cancellation Successful!");
                    exit();
                }
                else {
                    // This condition will never be satisfied
                    header("Location: ./jobs.php?status=Application for failed");
                    exit();
                }
            }
            else {
                header("Location: ./jobs.php?status=Unknown applicant");
                exit();
            }
            
        }
        else {
            header("Location: ./jobs.php?status=Unknown User!");
            exit();
        }
    }
    else {
        header("Location: ./jobs.php?status=unknown user, please login.");
        exit();
    }*/
?>