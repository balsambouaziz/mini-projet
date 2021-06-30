<?php
session_start();
$medecin=$_GET["medecien"];
$malade=$_SESSION["malade"];
$rv=$_GET["rv"];
$cp=0;

  function check_dimanche($value) {
     
    preg_match(' /([0-9]+)\/([0-9]+)\/([0-9]+)/ ', $value , $match );
    $date = date("l", mktime(0, 0, 0, $match[2], $match[1], $match[3]));
    $date = trim($date);
    if (strstr($date,"Sunday")) return 1;
    else return 0;
    }
 $con=mysqli_connect("localhost","root","","hopital");
 $req1=mysqli_query($con,"select * from medecin where id='${medecin}'");
 $service=mysqli_fetch_array ($req1);
 $req=mysqli_query($con,"select * from rendezvous where idMedecin='${medecin}'and rendezVous='${rv}'");
 while($res=mysqli_fetch_array ($req)){
	 $cp=$cp+1;
	 
	 }
	 if ($cp<10){
		 $req2=mysqli_query($con,"insert into rendezvous values('${malade}','${medecin}','${rv}','${service}') "); 
		  header("location:compteMaladecalen.php");
	 }
	 else {
	
		 header("location:prendreRV.php?id=1");
	 }
		 
	 





?>
