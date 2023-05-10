<?php
session_start();
if (!$_SESSION['userId']){
    header("Location: login.php");
    exit();
}
$sql='';
if(isset($_GET['sql'])){
    $sql=$_GET["sql"];
}
?>
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
			<h1> Εποικηνωνία</h1>
				<br>
				<br>
            <?php
            if(strcmp($sql,"error")==0) {
                echo("
                                <div class=\"error\">
                                    Το email δεν στάλθηκε,προσπαθήστε ξανά.
                                </div>
                                
                        ");
            }
            if (strcmp($sql,"success")==0)
            {
                echo("
                                <div class=\"success\">
                                    Η email στάλθηκε με επιτυχία.
                                </div>
                                
                        ");
            }
            ?>
				<h2>Αποστολή μέσω Web φόρμας</h2>
				<br>
				<a>Συμπληρώστε τα στοιχεία σας και το περιεχόμενο του μηνύματος για εποικηνωνήσετε με τον καθηγητή μέσω της φόρμας</a>
			<div>
				<div >
					<form  method="post" action="Include/Contact.php" method="post"">
						<input name="name" type="text" name="name" class="form-control" placeholder="Όνομα" required><br>
						<input name="mail" type="email" name="mail" class="form-control" placeholder="Το E-Mail σου " required><br>
						<input name="comment" type="text" name="comment" class="form-control" placeholder="Μήνυμα"  required></input><br>
						<input name="submit" type="submit"  class="form-control submit" value="Αποστολή"><br>
					</form>
				</div>
			</div>

			<h2>Αποστολή μέσω email</h2>
			<div>
				<br>
				<a>Εναλακτικά μπορείτε να εποικηνωνήστε με τους καθηγητες μέσω email στις διεύθηνσείς <br><br>
                    <ul>
                    <?php
                    require "Include/db.php";
                    $sql="SELECT * FROM users";
                    $statment=mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($statment,$sql)){
                        header("Location: ../login.php?error=sqlerror");
                        exit();
                    }
                    else {
                        mysqli_stmt_execute($statment);
                        $results = mysqli_stmt_get_result($statment);
                        if ($row = mysqli_fetch_assoc($results)) {
                            $Name = $row['Name'] . ' ' . $row['Surname'].' ';
                            $email = $row['Username'];
                            echo("<li><a><b> $Name</b><a href=\"mailto:tutor@csd.auth.gr\">$email ></li>");
                        }
                    }

                    ?>
                    </ul>
                </a>
			</div>
		</div>

	</div>
</body>
</html>