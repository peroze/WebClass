<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['userId'])){
    header("Location: index.php");
    exit();
}
$error="";
if(isset($_GET['error'])){
    $error=$_GET['error'];
}

?>
<html>
<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width , user-scalable=no, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title> Web Class </title>
		<link href="menu.css" rel="stylesheet">
		<link href="login.css" rel="stylesheet">
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
                            <li><a href="home.php"> Αρχική Σελιδά</a> </li>
                            <li><a href="announcments.php"> Ανακοινώσεις</a> </li>
                            <li><a href="documents.php"> Έγγραφα</a></li>
                            <li><a href="homework.php"> Εργασίες</a></li>
                            <li><a href="communication.php"> Επικοινωνία</a></li>
						</ul>
					</div>
			</div>
		</div>
		<div class="title">
			<h1>WebClass <h1>
		</div>
		<div class="line">
		</div>
	</div>
	<div class="container">
		<div class="content">
			<form action="Include/LoginCode.php" class="login-form" method="post">
				<div class="Log-in">
					<h1>Είσοδος</h1>
                    <div class="wrong">
                        <?php
                        if($error){
                            echo("<a>Λάθος Όνομα Χρήστη ή Κωδικός</a>");
                        }
                        ?>
                    </div>
					<div class="inputs">
						<input type="text" placeholder="Ονομα Χρήστη" name="usr" value="" required>
					</div>
					<div class="inputs">
						<input type="password" placeholder="Κωδικός" name="psw" value="" required>
					</div>

					<div class="valid">
						<button type="submit" name="submit">Είσοδος</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>