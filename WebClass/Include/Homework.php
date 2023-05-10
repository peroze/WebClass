<?php

if(isset($_POST['submit'])){
    require 'db.php';
    $goals=$_POST['goals'];
    $give=$_POST['give'];
    $date=$_POST['date'];
    $file=$_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileTmpLoc=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileExt=explode('.',$fileName);
    $fileExt=strtolower(end($fileExt));
    if($fileSize<30000000){
        $fileNameNew= uniqid('',true).".".$fileExt;
        $fileDest="Uploads/Homeworks/".$fileNameNew;
        move_uploaded_file($fileTmpLoc,'../'.$fileDest);
    }
    else{
        echo("File too big");
        exit();
    }
    $sql="INSERT INTO homeworks( goals,ekfon,give,due) VALUES (?,?,?,?)";
    $statment=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statment,$sql)){
        header("Location: ../homeworks.php?sql=error");
        exit();
    }
    else{
        mysqli_stmt_bind_param($statment,"ssss",$goals, $fileDest, $give,$date);
        mysqli_stmt_execute($statment);
        //  mysqli_stmt_store_result()($statment);
    }
    mysqli_query($conn,$sql);
    header("Location: ../homeworks.php?sql=success");
    exit();
}