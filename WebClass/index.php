<?php
    session_start();
    if (!$_SESSION['userId']){
        header("Location: login.php");
        exit();
    }
?>


<!DOCTYPE html>

<html>
<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width , user-scalable=no, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title> Web Class </title>
		<link href="index.css" rel="stylesheet">
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
            <h1>WebClass</h1>
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
            <h1> Δημιουργία Στατικών Ιστοσελίδων </h1>
            <div class="maintext">
                <br>
                <br>
                <h2>Ανάλυση μαθήματος</h2>
                <p> <br> <br> Καλησπέρα σας, η πάρουσα ιστοσελίδα χρησιμοποίητε ως βοηθημα στην εκμάθηση δημιουργίας ιστοσέλιδων,<br>
                    πιο συγκερκίμενα, μόλις ολοκληρώσετε το μάθημα θα έχετε την δυνατότητα να συντάσετε στατικές ιστοσέλιδες<br>
                    με την χρήση της γλώσσες html άλλα και να τις μορφοποίητε με την γλώσσα css που θα εξηγηθούν αναλυτικά απο τους καθηγητές .<br>
                    <br><h2>Πλοήγηση στην σελίδα</h2><br>
                Μέσω της σέλιδας θα έχετε την δυνατότητα να δείτε τις διάφορες ανακοίνωσείς που αναρτούν οι καθηγητές <br>
                πατόντας στο πλήκτρο για το μένου (τρέις γραμμές επάνω αριστερά) και επιλέγοντας το πλήκτρο "Ανακοινώσεις".<br>
                Oμοια μπορείτε να δείτε της έργασίες που έχουν ανάρτησεί οι καθηγητές επιλέγοντας το πλήκτρο "Εργασίες"<br>
                ή τα διαθέσημα έγγραφα ( Διαφάνειες κτλ) επιλέγοντας το πλήκτρο Έγγραφα. Τέλος εαν θέλετε να εποικηνωνήσετε,<br>
                με τον καθηγητή τότε μπορείτε να πατήσετε το πλήκτρο επικοινωνία που βρήσκεται στο μενου.<br>
                </p>
            </div>
		</div>

	</div>
</body>
</html>