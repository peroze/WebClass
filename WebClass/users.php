<?php
session_start();
if (!$_SESSION['userId']){
    if(!strcmp($_SESSION['userType'],"Professor")==0)
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
			<h1>Έγγραφα</h1>
			<div class="files">
                <?php
                    if(strcmp($sql,"error")==0) {
                        echo("
                                <div class=\"error\">
                                    Ο χρήστης απέτυχε να αναρτηθεί,προσπαθήστε ξανά.
                                </div>
                                
                        ");
                    }
                    if (strcmp($sql,"success")==0)
                    {
                        echo("
                                <div class=\"success\">
                                    Ο χρήστης δημιουργήθηκε με επιτυχία.
                                </div>
                                
                        ");
                    }
                    if (strcmp($sql,"successDelete")==0)
                    {
                        echo("
                                <div class=\"success\">
                                    Ο χρήστης διαγράφηκε με επιτυχία.
                                </div>
                                
                        ");
                    }
                    echo("
				          <div class=\"New File\">
					          <div class=\"new_btn\">
						           <a href=\"New%20User.php\">Προσθήκη Νέου Χρήστη </a>
					           </div>
				           </div>");

                ?>
                <div class="">
                    <?php
                    require "Include/db.php";
                    $sql="SELECT * FROM `users`";
                    $statment=mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($statment,$sql)){
                        header("Location: home.php?error=sqlerror");
                        exit();
                    }
                    mysqli_stmt_execute($statment);
                    $results=mysqli_stmt_get_result($statment);
                    while ($row=mysqli_fetch_assoc($results)){
                        $Name=$row["Name"];
                        $Surname=$row["Surname"];
                        $Name=$Name." ".$Surname;
                        $Pass=$row["Pass"];
                        $Id=$row["id"];
                        $Username=$row['Username'];
                        $Type=$row['type'];


                        echo("<h2> $Username </h2>");
                        echo ("<div class=\"control\">
                              <a href=\"New%20User.php?id=$Id\">Επεξεργασία|</a>
                              <a href=\"Delete.php?id=$Id&type=users\">Διαγραφή</a>
                              </div>");

                        echo("
					         <div class=\"description\" >
					          Ονοματεπόνυμο : $Name </br>	
					         </div> 
					        <div class=\"download\">
						       Password: $Pass
					        </div>
					        <div class=\"description\" >
					          Τύπος : $Type </br>	
					         </div> 
					        <div class=\"split\">
					        </div>");
                    }
                    ?>
                </div>

		</div>

	</div>
</body>
</html>