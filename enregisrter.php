<?php
session_start();
$malade=$_GET["id"];

$medecin=$_GET["medecin"];
$infirmier=$_GET["infirmier"];
$date=$_GET["date"];

 $chambre=$_GET["chambre"];
 $service=$_SESSION["service"];
$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"insert into maladehos values('${malade}',${infirmier},'${chambre}','${service}','${medecin}'','${date}' )");

header("location:maladeHospitalise.php");







?>
