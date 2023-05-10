<?php
session_start();
if (!$_SESSION['userId']){
    header("Location: login.php");
    exit();
}
$id='';
$type='';
if(isset($_GET['id'])&&isset($_GET['type'])){
    $id=$_GET["id"];
    $type=$_GET["type"];
}
else {
    header("Location: home.php");
}

?>

<!DOCTYPE html>

<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Web Class </title>
    <link href="communication.css" rel="stylesheet">
    <link href="menu.css" rel="stylesheet">
    <link href="New Announcment.css" rel="stylesheet">
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
        <h2>Επιβαιβέωση διαγραφής</h2>
        <br>
        <br>
        Είσαι σίγουρος οτί θέλεις να διαγράψεις την ακόλουθή καταχώρηση από την βάση δεδομένων : </br>
        <?php
            echo("<a>$type $id</a>");
            echo("<form action=\"Include/Delete.php?id=$id&type=$type\" method=\"post\">
                         <button type=\"submit\" name=\"submit\" value=\"submit\">Συνέχεια</button>
                         <button type=\"submit\" name=\"submit\" value=\"cancel\">Ακύρωση</button>
            </form>");
        ?>
    </div>
</div>
</body>