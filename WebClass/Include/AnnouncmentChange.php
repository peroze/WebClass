<?php
$id=$_GET["id"];
if(isset($_POST['submit'])){
    require 'db.php';
    $theme=$_POST['theme'];
    $text=$_POST['text'];
    if(empty($theme)||empty($text)){
        header("Location: ..announcments.php?sql=error");
        exit();
    }
    $sql="UPDATE announcments SET Title =?, MainText =? WHERE id = ?";
    $statment=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statment,$sql)){
        header("Location: ../announcments.php?sql=error");
        exit();
    }
    else{
        mysqli_stmt_bind_param($statment,"ssss",$theme, $date, $text,$id);
        mysqli_stmt_execute($statment);
      //  mysqli_stmt_store_result()($statment);
    }
    mysqli_query($conn,$sql);
    header("Location: ../announcments.php?sql=success");
    exit();
}