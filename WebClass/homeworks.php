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

<!DOCTYPE html>

<html>
<head>
	
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width , user-scalable=no, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title> Web Class </title>
		<link href="homeworks.css" rel="stylesheet">
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
			<h1> Εργασίες </h1>
			<div class="homeworks">
                <?php
                if(strcmp($_SESSION['userType'],'Professor')==0) {
                    if(strcmp($sql,"error")==0) {
                        echo("
                                <div class=\"error\">
                                    H έργασία απέτυχε να αναρτηθεί,προσπαθήστε ξανά.
                                </div>
                                
                        ");
                    }
                    if (strcmp($sql,"success")==0)
                    {
                        echo("
                                <div class=\"success\">
                                    Η εργασία αναρτηθηκε με επιτυχία.
                                </div>
                                
                        ");
                    }
                    if (strcmp($sql,"successDelete")==0)
                    {
                        echo("
                                <div class=\"success\">
                                    Η εργασία διαγράφηκε με επιτυχία.
                                </div>
                                
                        ");
                    }
                    echo("
				        <div class=\"New File\">
					        <div class=\"new_btn\">
						        <a href=\"New%20Homework.php\">Προσθήκη Νέας Εργασίας </a>
					        </div>
				        </div>");
                }
				?>
                <div class="homework">
                    <?php
                    require "Include/db.php";
                    $sql="SELECT * FROM `homeworks`";
                    $statment=mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($statment,$sql)){
                        header("Location: home.php?error=sqlerror");
                        exit();
                    }
                    mysqli_stmt_execute($statment);
                    $results=mysqli_stmt_get_result($statment);
                    $count=0;
                    while ($row=mysqli_fetch_assoc($results)){
                        $count=$count+1;                     // Για να εμφανίζεται σωστά ο αριθμός της εργασίας αφου αν γίνει διαγράφη δεν καλύπτεται το κενό
                        $goals=nl2br($row["goals"]);
                        $ekf=$row["ekfon"];
                        $due=$row["due"];
                        $give=nl2br($row["give"]);
                        $Id=$row["id"];
                        echo("<h2>Εργασία $count  </h2>");
                        if(strcmp($_SESSION['userType'],'Professor')==0) {
                            echo ("<div class=\"control\">
                              <a href=\"New%20Homework.php?id=$Id\">Επεξεργασία|</a>
                              <a href=\"Delete.php?id=$Id&type=homeworks\">Διαγραφή</a>
                              </div>");
                        }
                        echo("
					         <div class=\"goals\" >
					         <a> Οι στόχοι της εργασίας είναι: <br> </a>
					         $goals	
					         </div> 
					        <div class=\"ekfonisi\">
						        <a> Την εκφώνηση θα την βρείτε <a href=\"$ekf\" download>εδώ</a></a>
					        </div>
					        <div class=\"paradotea\"
						        <a> Πραδοτέα:</a></br>
						        $give
						    </div>
                            <a> <span class=\"date\" > Ημερομηνία παράδωσης: </span> $due </a>
					        <div class=\"split\">
					        </div>");
                    }
                    ?>
                </div>
			</div>
		</div>

	</div>
</body>
</html>