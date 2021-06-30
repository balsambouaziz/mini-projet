<?php
session_start();
$con=mysqli_connect("localhost","root","","hopital");
$req1=mysqli_query($con,"select * from medecin");
while($res=mysqli_fetch_array($req1)){
echo $res["id"];}
$_SESSION["medecin"]=$res["id"];
echo $res["id"];
header("location:compteMedecin.php");
?>