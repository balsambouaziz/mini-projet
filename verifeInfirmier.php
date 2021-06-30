
<?php
session_start();
$email=$_POST["email"];
$motDePasse=$_POST["psw"];
$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"select * from infirmier where email='{$email}' and pass='{$motDePasse}' ");

$nb= mysqli_num_rows($req);
if($nb>0){
	$obj=mysqli_fetch_array ($req);
	$id=mysqli_insert_id($con);
$_SESSION["infirmier"]=$obj["id"];
$_SESSION["nom"]=$obj["nom"];
$_SESSION["prenom"]=$obj["prenom"];
$_SESSION["service"]=$obj["idService"];
	header("location:compteInfirmier.php");
}
else{
header("location:pageOff.php");
}


?>
