<?php
session_start();
if(!isset($_SESSION["medecin"])){
	header("location:pageOff.php");
}
?>
<html>
<head>
<title><?= $_SESSION["nom"]."  ".$_SESSION["prenom"]?></title>
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
/*entete*/
.topnav {
  overflow: hidden;
  background-color:#7BC6BF;
  
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 195px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #6EA39E;
  color: black;
}

.topnav a.active {
  background-color: #6EA39E;
  color: white;
}
.topnav a.btn{
background-color:#587388;
}





/*menu left*/
#mySidenav a {
  position: absolute;
  left: -200px;
  transition: 0.3s;
  padding: 15px;
  width: 350px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
  left: 10;
  background-color: #6EA39E;
}

#about {
  top: 20px;
  background-color: #6EA39E;
}

#blog {
  top: 80px;
  background-color:#7BC6BF;
}
#about a.active{
	 background-color: #6EA39E;
color: white;}


</style>
</head>
<body>

<div class="topnav">

  <a  href="compteMalade">mes informatons</a>
	  <a href="compteMedecinMala.php">mes malades</a>
	 
	  <a  href="deconnexion.php">deconnexion</a>

	 
	</div>
	<div class="containe">
	<div class="row">
	<div class="col-3">

	  
	  
	<div id="mySidenav" class="sidenav">
	<a href="compteMedecinRV.php" id="about">liste des rendez-vous d'aujourd'hui</a>
	 <a href="compteMedecinOper.php" id="blog">les operations</a>
	</div>
	</div>




<div class="col-8">

<table class="table table-striped table-hover" border="black" style="margin-top:60" >

 <tr><th>id</th>
 <th>nom</th>
 <th>prenom</th>
 <th>date de naissence</th>
 <th>numero de telephone</th>

<?php
$Medecin=$_SESSION["medecin"];

$con=mysqli_connect("localhost","root","","hopital");
$date=date("Y-m-d");
$req=mysqli_query($con,"select * from rendezvous where idMedecin='{$Medecin}'and rendezVous='{$date}'");
while($res=mysqli_fetch_array($req)){
	$malade=$res["idMalade"];
	
	$req1=mysqli_query($con,"select * from malade where id='{$malade}'");
	$res1=mysqli_fetch_array($req1);
    echo '<tr><td><a href="dossierMedical.php?id='.$res1["id"].'">'.$res1["id"].'</a> </td><td>'.$res1["nom"].' </td><td>'.$res1["prenom"].' </td><td> '.$res1["dateNaiss"].'</td> <td>'.$res1["numtel"].'</td> </tr>';

	
	
}



?>
</table>





</div>



</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="alert alert-success" role="alert" >
  
    <p align="right"> <font color="#7DA9A5" style="margin-right:100px" > <a href="#">
          <span class="glyphicon glyphicon-earphone"></span>
        </a>  tel:75 292 700 </p>
            <p align="right"> <font color="#7DA9A5" style="margin-right:95px"  ><i class="fa fa-print"></i>Fax : 75292530 </p> 
	<a href="https://www.google.com/maps/place/H%C3%B4pital+r%C3%A9gional+Mohamed+Ben+Sassi+de+Gab%C3%A8s/@33.863817,10.1125624,17.78z/data=!4m5!3m4!1s0x12556e51e64dc8ab:0x729da1797251c395!8m2!3d33.8634805!4d10.1153674"><p align="right"> <font color="#7DA9A5" > <i class="fa fa-map-marker"></i> Adresse : M'TORECH GABES</font></p></a>
    <p align="right"> <font color="#7DA9A5" style="margin-right:142px"  ><i class='fas fa-envelope-open'></i>E-mail :</font></p>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-google"></a> 
    <a href="#" class="fa fa-instagram"></a>
</div>
</body>
</html>