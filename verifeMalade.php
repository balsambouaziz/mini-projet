<?php
session_start();
$email=$_POST["email"];
$motDePasse=$_POST["psw"];
$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"select * from malade where email='{$email}' and pass='{$motDePasse}' ");

$nb= mysqli_num_rows($req);
if($nb>0){
	$obj=mysqli_fetch_array ($req);
$_SESSION["malade"]=$obj["id"];
$_SESSION["nom"]=$obj["nom"];
$_SESSION["prenom"]=$obj["prenom"];
	header("location:compteMalade.php");
}
else{
header("location:pageOff.php");
}


?>