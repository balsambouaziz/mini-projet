<?php
session_start();
if(!isset($_SESSION["secretaire"])){
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
  padding: 14px 200px;
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





/*menu left*/
#mySidenav a {
  position: absolute;
  left: -200px;
  transition: 0.3s;
  padding: 15px;
  width: 300px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
  left: 10;
}

#blog {
  top: 20px;
  background-color: #6EA39E;
}

#blog1 {
  top: 80px;
  background-color:#7BC6BF;
}

#blog2 {
  top: 170px;
  background-color:#7BC6BF;
}
#blog3 {
  top: 230px;
  background-color:#7BC6BF;
}








/*barre de recherche*/

.search-container {
  float: right;
}

input[type=text] {
  padding: 8px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.search-container button {
  float: right;
 padding: 14px 100px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
input[type=text],.search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 50%;
    margin-left:5px;
    padding: 10px;
  }
 input[type=text] {
    border: 1px solid #ccc;  
  }
}





.titre{
	font-style:italic;
	font-size:0.8cm;
    color: #79BAB3 ;
	font-style:italic;}


</style>
</head>
<body>

<div class="topnav">

  <a  href="compteSecretaire.php">mes informatons</a>
  <a  href="deconnexion.php">deconnexion</a>
  <div class="search-container">
    <form action="rechercheMalade.php" method="get">
      <input type="text" placeholder="malade.." name="recherche">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
  	  
</div>
<div class="row">
<div class="col-3">

  
  
<div id="mySidenav" class="sidenav">
  <a href="rendez-vousAujurdHui.php" id="blog">les rendez-vous d'aujourd'hui</a>
  <a href="maladeHospitalise.php"id="blog1">les malades hospitalises du service</a>
  <a href="listeMedecin.php"id="blog2">liste des medecins</a>
  <a href="listeinfirmier.php"id="blog3">liste des infirmiers</a>
</div>
</div>
<div class="col-8">
<table class="table table-striped table-hover" border="black" style="margin-top:60" >
<tr><th>id</th>
 <th>nom</th>
 <th>prenom</th>
 <th>date de naissence</th>
 <th>numero de telephone</th>
 <th>medecin</th>
 
</tr>

<?php
$service=$_SESSION["service"];

$con=mysqli_connect("localhost","root","","hopital");
$date=date("Y-m-d");
$req=mysqli_query($con,"select * from rendezvous where idService='{$service}'and rendezVous='{$date}'");
while($res=mysqli_fetch_array($req)){
	$malade=$res["idMalade"];
$medecin=$res["idMedecin"];
	$req1=mysqli_query($con,"select * from malade where id='{$malade}'");
	$req2=mysqli_query($con,"select * from malade where id='{$medecin}'");
	$res1=mysqli_fetch_array($req1);
	$res2=mysqli_fetch_array($req2);
    echo '<tr><td>'.$res1["id"].'</td><td>'.$res1["nom"].' </td><td>'.$res1["prenom"].' </td><td> '.$res1["dateNaiss"].'</td> <td>'.$res1["numtel"].'</td> <td>'.$res2["nom"].'</td></tr>';

	
	
}



?>




</table>

</div>
</div>
</div>
<div class="alert alert-success" role="alert" style="width:100%; margin-top:220;">
  
    <p align="right"> <font color="#7DA9A5" style="margin-right:100px;" > <a href="#">
          <span class="glyphicon glyphicon-earphone"></span>
        </a>  tel:75 292 700 </p>
            <p align="right"> <font color="#7DA9A5" style="margin-right:95px"  ><i class="fa fa-print"></i>Fax : 75292530 </p> 
	<p align="right"> <font color="#7DA9A5" > <i class="fa fa-map-marker"></i> Adresse : M'TORECH GABES</p>
    <p align="right"> <font color="#7DA9A5" style="margin-right:142px"  >E-mail :</font></p>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-google"></a> 
    <a href="#" class="fa fa-instagram"></a>
</div>
</body>
</html>

