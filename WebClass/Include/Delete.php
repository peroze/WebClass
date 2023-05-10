<?php


$table='';
$id='';
if(isset($_POST['submit'])&&isset($_GET['id'])&isset($_GET['type'])){
    $id = $_GET['id'];
    $table= $_GET['type'];
    if(strcmp($_POST['submit'],"submit")==0){                 //Εαν ο χρήστης πάτησε Submit
        require 'db.php';
        $sql = "DELETE FROM $table WHERE id=?";
        $statment = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($statment, $sql)) {
            header("Location: ../$table.php?sql=error");
            exit();
        } else {
            mysqli_stmt_bind_param($statment, "s", $id);
            mysqli_stmt_execute($statment);
            //  mysqli_stmt_store_result()($statment);
        }
        mysqli_query($conn, $sql);
        header("Location: ../$table.php?sql=successDelete");
        exit();
    }
    else{
        header("Location:../$table.php");           // Εαν ο χρήστης πατήσε Cancel
    }
}