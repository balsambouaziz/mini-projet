<?php
session_start();
$nom=$_GET["nom"];
$prenom=$_GET["prenom"];
$date=$_GET["date"];
 $email=$_GET["email"];
 $pwd=$_GET["pwd"];
 $civil=$_GET["civil"];
 $numt=$_GET["numt"];
 $numb=$_GET["numb"];
 $cartid=$_GET["cartid"];
 $service=$_GET["service"];
 $specialite=$_GET["specialite"];
$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"insert into medecin values(null,'${nom}','${prenom}','${date}','${civil}','${cartid}','${numt}','${numb}','${email}','${pwd}','{$specialite}','{$service}' )");
$req1=mysqli_query($con,"select * from medecin ");
while($res=mysqli_fetch_array($req1)){
	$_SESSION["medecin"]=$res["id"];
}

$_SESSION["nom"]=$nom;
$_SESSION["prenom"]=$prenom;
$_SESSION["service"]= $service;

header("location:compteMedecin.php");




?>
