<?php

if(isset($_POST['submit'])){
    require 'db.php';
    $Name=$_POST['Name'];
    $Surname=$_POST['Surname'];
    $User=$_POST['Username'];
    $Pass=$_POST['psw'];
    $type=$_POST['type'];


    $sql="INSERT INTO `users` ( `Name`, `Surname`, `Pass`, `Username`, `type`) VALUES (?, ?, ?,?,?)";
    $statment=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statment,$sql)){
        header("Location: ../users.php?sql=error");
        exit();
    }
    else{
        mysqli_stmt_bind_param($statment,"sssss",$Name, $Surname,$Pass, $User,$type);
        mysqli_stmt_execute($statment);
      //  mysqli_stmt_store_result()($statment);
    }
    mysqli_query($conn,$sql);
    header("Location: ../users.php?sql=success");
    exit();
}