<?php
    $servername="webpagesdb.it.auth.gr:3306";
    $dbUsername="kperrakis";
    $dbPassword="5733Grlamia";
    $dBName="webclass";
    $conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dBName);
	$conn -> set_charset("utf8");

    if(!$conn){
        die("Connection failed :".mysqli_connect_error());
    }