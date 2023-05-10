<?php
$id=$_GET["id"];
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
    $sql="UPDATE documents  SET title=?,description=?, link=?  WHERE id=?";
    $statment=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statment,$sql)){
        header("Location: ../documents.php?sql=2");
        exit();
    }
    else{
        mysqli_stmt_bind_param($statment,"ssss",$theme, $description,$fileDest,$id);
        mysqli_stmt_execute($statment);
        //  mysqli_stmt_store_result()($statment);
    }
    mysqli_query($conn,$sql);
    header("Location: ../documents.php?sql=1");
    exit();
}