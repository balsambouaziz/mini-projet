<?php
session_start();
$nom=$_GET["nom"];
$prenom=$_GET["prenom"];
$date=$_GET["date"];
 $email=$_GET["email"];
 $pwd=$_GET["pass"];
 $adresse=$_GET["adresse"];
 $civil=$_GET["civil"];
 $numt=$_GET["numt"];
 $cartid=$_GET["cartid"];
 if (isset($_GET["trait"]))
 $trait=$_GET["trait"];
else $trait=null;
$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"insert into malade values(null,'${nom}','${prenom}','${date}','${adresse}','${civil}','${cartid}','${numt}','${email}','${pwd}','${trait}' )");
$req2=mysqli_query($con,"select * from malade");
while($res=mysqli_fetch_array($req2)){
	$_SESSION["malade"]=$res["id"];
	
}

$_SESSION["nom"]=$nom;
$_SESSION["prenom"]=$prenom;
	
header("location:compteMalade.php");






?>
