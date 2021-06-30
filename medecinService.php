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

p{flot:right;}



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
<div style="margin-left:250px;">
<?php
$service=$_SESSION["service"];
$a=0;
$con=mysqli_connect("localhost","root","","hopital");
$req1=mysqli_query($con,"select * from medecin where idService={$service}");

while($res1=mysqli_fetch_array($req1)){
	
		$a=$a+1;
	if ($a=4){
		$a=0;
		echo "<br>";
	}
		$medecin=$res1["id"];
		if ($res1["id"]=$medecin){
			 echo '<div class="card">
			  <img src="avatar.jpg" alt="Avatar" style="width:30%;">
			    <div class="container">
                  <h4><b> DR. '.$res1["nom"].'     '.$res1["prenom"].'</b></h4> 
                  <p>'.$res1["numtel"].'</p> 
	                <p>'.$res1["email"].'</p> 
                       </div>
                       </div>';
			 
	                    break;
	
   }
	
	}




?>




</div>

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
