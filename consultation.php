<?php 
session_start();
$date=date("d/m/Y");
$malade=$_SESSION["malademed"];
$medecin=$_SESSION["medecin"];
 $obser=$_POST["obser"];
 $trait=$_POST["trait"];
 $oper=$_POST["oper"];
 $dateOper=$_POST["dateoper"];
 $idService=$_SESSION["service"];
 $rendezVous=$_POST["rendProch"];



 $con=mysqli_connect("localhost","root","","hopital");
$req2=mysqli_query($con,"insert into dossiermedical values('${date}','${malade}','${medecin}','${obser}','${trait}','${oper}','${dateOper}','${idService}','${rendezVous}' ) ");

header("location:dossierMedical.php?id=$malade");


 


?>