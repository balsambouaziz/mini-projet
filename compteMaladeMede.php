<?php
session_start();
if(!isset($_SESSION["malade"])){
	header("location:pageOff.php");
}


?>
<html>
<head>
<title><?= $_SESSION["nom"]."  ".$_SESSION["prenom"]?></title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
  padding:  14px 180px;
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
  background-color: #7BC6BF;
}

#blog {
  top: 80px;
  background-color:#7BC6BF;
}


/*modifier*/
.buttonn {
  margin-left :1000;
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #6EA39E;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.buttonn:hover {background-color: #7BC6BF}

.buttonn:active {
  background-color: #7BC6BF;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
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

  <a  href="compteMalade.php">mes informatons</a>
  <a class="active" href="compteMaladeMede.php">mes medecins</a>
  
  <a   href="deconnexion.php">deconnexion</a>
 
</div>
<div class="row">
<div class="col-3">

  
  
<div id="mySidenav" class="sidenav">
<a href="compteMaladecalen.php" id="about">mes rendez-vous</a>
  <a href="compteMaladeMedi.php" id="blog">mes medicaments</a>
  
</div>
</div>
<div class="col-8" style="align:right">
<br><br><br><br>

<?php
$idMalade=$_SESSION["malade"];
$a=0;
$con=mysqli_connect("localhost","root","","hopital");
$req1=mysqli_query($con,"select * from medecin");
$req=mysqli_query($con,"select * from dossiermedical where idMalade='{$idMalade}'");
while($res1=mysqli_fetch_array($req1)){
	
	while($res=mysqli_fetch_array($req)){
		$a=$a+1;
	if ($a=4){
		$a=0;
		echo "<br>";
	}
		$medecin=$res["idMedecin"];
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
}






?>

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
