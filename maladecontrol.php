<?php
session_start();
if(!isset($_SESSION["infirmier"])){
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
  padding: 14px 110px;
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
  left: -100px;
  transition: 0.3s;
  padding: 15px;
  width: 200px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
  left: 10;
}

#about {
  top: 20px;
  background-color: #6EA39E;
}

#blog {
  top: 80px;
  background-color:#7BC6BF;
}





/*sortie*/
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #04AA6D;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}



</style>
</head>
<body>

<div class="topnav">

  <a class="active" href="compteInfirmier.php">mes informatons</a>
  <a href="maladecontrol.php">mes malades a contoles</a>
  <a href="medecinService.php">les medecins du Service</a>
  	  <a  href="deconnexion.php">deconnexion</a>
 
</div>
<div class="row">

  


<div class="col-8" style="margin:150px">
<table class="table table-striped table-hover" border="black" style="margin-top:60" >
 <tr><th>id</th>
 <th>nom</th>
 <th>prenom</th>
 <th>date de naissance</th>
 <th>medecin</th>
 <th>chambre</th>
 <th>date d entree</th>

 

<?php
$infirmier=$_SESSION["infirmier"];

$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"select * from maladehos where idInfirmier='{$infirmier}'");
while($res=mysqli_fetch_array($req)){
	if ($res["dateSortie"]==null){
	$malade=$res["idMalade"];
	$medecin=$res["idMedecin"];
	
	$req1=mysqli_query($con,"select * from malade where id='{$malade}'");
	$req2=mysqli_query($con,"select * from medecin where id='{$medecin}'");
	
	$res2=mysqli_fetch_array(req2);
	
	
echo '<tr><td><a href="dossierMedical.php?id='.$res1["id"].'">'.$res1["id"].'</a> </td><td>'.$res1["nom"].' </td> <td>'.$res1["prenom"].' </td> <td> '.$res1["dateNaiss"].'</td> <td>'.$res2["nom"].'</td> <td>'.$res["chambre"].'</td><td>'.$res["dateEntree"].'</td></tr>';
	
	}
	}
?>




</table>

</div>
</div>
</div>
<div class="alert alert-success" role="alert" >
  
    <p align="right"> <font color="#7DA9A5" style="margin-right:100px" > <a href="#">
          <span class="glyphicon glyphicon-earphone"></span>
        </a>  tel:75 292 700 </p>
            <p align="right"> <font color="#7DA9A5" style="margin-right:95px"  ><i class="fa fa-print"></i>Fax : 75292530 </p> 
	<a href="https://www.google.com/maps/place/H%C3%B4pital+r%C3%A9gional+Mohamed+Ben+Sassi+de+Gab%C3%A8s/@33.863817,10.1125624,17.78z/data=!4m5!3m4!1s0x12556e51e64dc8ab:0x729da1797251c395!8m2!3d33.8634805!4d10.1153674"><p align="right"> <font color="#7DA9A5" > <i class="fa fa-map-marker"></i> Adresse : M'TORECH GABES</font></p></a>
    <p align="right"> <font color="#7DA9A5" style="margin-right:142px"  >E-mail :</font></p>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-google"></a> 
    <a href="#" class="fa fa-instagram"></a>
</div>
</body>
</html>
