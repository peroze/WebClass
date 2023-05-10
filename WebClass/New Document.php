<?php
session_start();
if (!$_SESSION['userId']){
    header("Location: login.php");
    exit();
}
$id='';
if(isset($_GET['id'])){
    $id=$_GET["id"];
}

?>


<!DOCTYPE html>

<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Web Class </title>
    <link href="documents.css" rel="stylesheet">
    <link href="menu.css" rel="stylesheet">
</head>


<body>
<div class="menu-container">
    <input type="checkbox" class="toggler">
    <div class="hamburger">
        <div></div>
    </div>
    <div class="menu">
        <div>
            <div>
                <ul>
                    <li><a href="index.php"> Αρχική Σελίδα</a> </li>
                    <li><a href="announcments.php"> Ανακοινώσεις</a> </li>
                    <li><a href="documents.php"> Έγγραφα</a></li>
                    <li><a href="homeworks.php"> Εργασίες</a></li>
                    <li><a href="communication.php"> Επικοινωνία</a></li>
                    <?php if(strcmp($_SESSION['userType'],"Professor")==0) echo"<li><a href=\"users.php\"> Διαχήρηση Χρηστών</a></li>"; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="title">
        <h1>WebClass </h1>
        <div class="Logout">
            <form action="Include/LogOut.php" method="post">
                <button type="submit" id="Log">Αποσύνδεση </button>
            </form>
        </div>
    </div>
    <div class="line">
    </div>
</div>
<div class="container">
    <div class="content">
        <div class="files">
            <?php
                    if($id) {
                    echo("
                        <h1>Επαιξεργασία  Έγγραφου</h1>
                        <div class=\"forma\">
                        <form action=\"Include/DocumentChange.php?id=$id.php\" enctype=\"multipart/form-data\" method=\"post\">");
                    }
                    else{
                        echo("
                             <h1>Δημιουργία Νέου Έγγραφου</h1>
                              <div class=\"forma\">
                                <form action=\"Include/Document.php\" enctype=\"multipart/form-data\" method=\"post\">");
                            }
                    ?>
                         <div class="inputs">
                            <input type="text" placeholder="Θέμα" name="theme">
                         </div>
                         <div class="inputs">
                            <textarea rows="4" type="text" name="description" placeholder="Γράψτε εδώ την περιγραφή... "></textarea>
                         </div>
                         <div class="Upload">
                            <input type="file" name='file' id="file">
                         </div>
                         <div class="buttons">
                            <button type="submit" name="submit">Ανάρτηση</button>
                         </div>
                    </form>
            </div>
        </div>
    </div>
</div>
