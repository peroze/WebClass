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
    <link href="communication.css" rel="stylesheet">
    <link href="menu.css" rel="stylesheet">
    <link href="New%20User.css" rel="stylesheet">
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
    <?php
        if($id) {
            echo("
                <h1>Επεξεργασία Χρήστη $id</h1>
                <div class=\"forma\">
                    <form action=\"Include/UserChange.php?id=$id\" method=\"post\">
                        <div class=\"inputs\">
                            <input type=\"text\" placeholder=\"Όνομα\" name=\"Name\" required>
                        </div>
                        <div class=\"inputs\">
                            <input type=\"text\" placeholder=\"Επίθετο\" name=\"Surname\" required>
                        </div>
                        <div class=\"inputs\">
                            <input type=\"text\" placeholder=\"Username-Email\" name=\"Username\" required>
                        </div>
                        <div class=\"inputs\">
                            <br>
						    <input type=\"password\" placeholder=\"Κωδικός\" name=\"psw\" value=\"\" required>
					    </div>
					    <select name='type' required>
                             <option value=\"Student\">Μαθητής</option>
                              <option value=\"Professor\">Καθηγητής</option>
                        </select>
                        
                        <div class=\"buttons\">
                            <button type=\"submit\" name=\"submit\">Αλλάγη</button>
                        </div>
                    </form>
                </div>");
        }
        else{
            echo("
                <h1>Δημιουργεία Χρήστη </h1>
                <div class=\"forma\">
                    <form action=\"Include/User.php\" method=\"post\">
                        <div class=\"inputs\">
                            <input type=\"text\" placeholder=\"Όνομα\" name=\"Name\">
                        </div>
                        <div class=\"inputs\">
                            <input type=\"text\" placeholder=\"Επίθετο\" name=\"Surname\">
                        </div>
                        <div class=\"inputs\">
                            <input type=\"text\" placeholder=\"Username-Email\" name=\"Username\">
                        </div>
                        <div class=\"inputs\">
						    <input type=\"password\" placeholder=\"Κωδικός\" name=\"psw\" value=\"\" required>
					    </div>
					    <select name='type'>
                             <option value=\"Student\">Μαθητής</option>
                              <option value=\"Professor\">Καθηγητής</option>
                        </select>
                        
                        <div class=\"buttons\">
                            <button type=\"submit\" name=\"submit\">Αλλάγη</button>
                        </div>
                    </form>
                </div>");
        }

            ?>
    </div>
</div>
</body>