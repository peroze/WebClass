<?php

    if(isset($_POST['submit'])) {
        require 'db.php';
        $Name=$_POST['name'];
        $email=$_POST['mail'];
        $text=$_POST['comment'];
        $type = "Professor";
        if(empty($username)||empty($password)){
            header("Location: ..communication.php?sql=error");
            exit();
        }
        else {
            $sql="SELECT * FROM users WHERE type=?";
            $statment=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statment,$sql)){
                header("Location: ../communication.php?sql=error");
                exit();
            }
            else {
                mysqli_stmt_bind_param($statment,s,$type);
                mysqli_stmt_execute($statment);
                $results=mysqli_stmt_get_result($statment);
                while ($row=mysqli_fetch_assoc($results)){
                    $mailTo=$row["Username"];
                    $headers= "From: ".$email;
                    mail($mailTo,$Name,$text,$headers);
                    header("Location: ..communication.php?sql=success");
                    exit();
                }
            }
        }
    }

