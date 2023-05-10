<?php

    if(isset($_POST['submit'])) {
        require 'db.php';
        $username = $_POST['usr'];
        $password = $_POST['psw'];
        if(empty($username)||empty($password)){
            header("Location: ..login.php?error=emptyfields");
            exit();
        }
        else {
            $sql="SELECT * FROM users WHERE Username=?";
            $statment=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($statment,$sql)){
                header("Location: ../login.php?error=sqlerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($statment,s,$username);
                mysqli_stmt_execute($statment);
                $results=mysqli_stmt_get_result($statment);
                if($row=mysqli_fetch_assoc($results)){
                   if($password==$row['Pass']){
                       session_start();
                       $_SESSION['userId']=$row['Username'];
                       $_SESSION['userType']=$row['type'];
                       header("Location: ../index.php");
                       exit();

                   }
                   else{
                       header("Location: ../login.php?error=wrongpwd");
                       exit();
                   }
                }
                else{
                    header("Location: ../login.php?error=noUser");
                    exit();
                }
            }
        }
    }
    else {
    }

