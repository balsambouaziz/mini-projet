<?php
session_start();
$nom=$_GET["nom"];
$prenom=$_GET["prenom"];
$date=$_GET["date"];
 $email=$_GET["email"];
 $pwd=$_GET["pwd"];
 $civil=$_GET["civil"];
 $numt=$_GET["numt"];
 
 $cartid=$_GET["cartid"];
 $service=$_GET["service"];
 
$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"insert into infirmier values(null,'${nom}','${prenom}','${date}','${civil}','${cartid}','${numt}','${email}','${pwd}','{$service}' )");
$req1=mysqli_query($con,"select * from  infirmier ");
while($res=mysqli_fetch_array($req1)){
	$_SESSION["infirmier"]=$res["id"];
}

$_SESSION["nom"]=$nom;
$_SESSION["prenom"]=$prenom;
$_SESSION["service"]= $service;

header("location:compteInfirmier.php");




?>