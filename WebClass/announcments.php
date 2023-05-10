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
		<link href="announcments.css" rel="stylesheet">
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
			<h1> Ανακοινώσεις </h1>
			<div class="announcments">
                <?php

                if(strcmp($_SESSION['userType'],'Professor')==0) {
                    if(strcmp($sql,"error")==0) {
                        echo("
                                <div class=\"error\">
                                    Η ανακοίνωση απέτυχε να αναρτηθεί,προσπαθήστε ξανά.
                                </div>
                                
                        ");
                    }
                    if (strcmp($sql,"success")==0)
                    {
                        echo("
                                <div class=\"success\">
                                    Η ανακοίνωση αναρτηθηκε με επιτυχία.
                                </div>
                                
                        ");
                    }
                    if (strcmp($sql,"successDelete")==0)
                    {
                        echo("
                                <div class=\"success\">
                                    Η ανακοίνωση διαγράφηκε με επιτυχία.
                                </div>
                                
                        ");
                    }
                    echo("
				        <div class=\"New Announcment\">
					        <div class=\"new_btn\">
						        <a href=\"New%20Announcment.php?\">Προσθήκη Νέας Ανακοίνωσης </a>
					        </div>
				        </div>");
                }
                ?>
				<div class="announcment">
                    <?php
                    require "Include/db.php";
                    $sql="SELECT * FROM `announcments` ORDER BY id DESC";
                    $statment=mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($statment,$sql)){
                        header("Location: home.php?error=sqlerror");
                        exit();
                    }
                    mysqli_stmt_execute($statment);
                    $results=mysqli_stmt_get_result($statment);
                    while ($row=mysqli_fetch_assoc($results)){
                        $Theme=$row["Title"];
                        $Date= $row["Dat"];
                        $Text=nl2br($row["MainText"]);
                        $Id=$row["id"];
                        echo("<h2>$Theme</h2>");
                              if(strcmp($_SESSION['userType'],'Professor')==0) {
                                  echo ("<div class=\"control\">
                              <a href=\"New%20Announcment.php?id=$Id\">Επεξεργασία|</a>
                              <a href=\"Delete.php?id=$Id&type=announcments\">Διαγραφή</a>
                              </div>");
                              }
					          echo("<div class=\"date\"> <a> <b> Ημερομηνία : </b> $Date</a></div>
					          <div class=\"text\"><a>$Text</a>
					          </div>
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