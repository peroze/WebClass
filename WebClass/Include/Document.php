<?php

if(isset($_POST['submit'])){
    require 'db.php';
    $theme=$_POST['theme'];
    $description=$_POST['description'];
    $file=$_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileTmpLoc=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileExt=explode('.',$fileName);
    $fileExt=strtolower(end($fileExt));
    if($fileSize<30000000){
        $fileNameNew= uniqid('',true).".".$fileExt;
        $fileDest="Uploads/Documents/".$fileNameNew;
        move_uploaded_file($fileTmpLoc,'../'.$fileDest);
    }
    else{
        echo("File too big");
        exit();
    }
    $sql="INSERT INTO documents(title,description, link) VALUES (?,?,?)";
    $statment=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statment,$sql)){
        header("Location: ../documents.php?sql=error");
        exit();
    }
    else{
        mysqli_stmt_bind_param($statment,"sss",$theme, $description,$fileDest);
        mysqli_stmt_execute($statment);
        //  mysqli_stmt_store_result()($statment);
    }
    mysqli_query($conn,$sql);
    header("Location: ../documents.php?sql=success");
    exit();
}