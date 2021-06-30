<?php
session_start();
if(!isset($_SESSION["secretaire"])){
	header("location:pageOff.php");
}

$_SESSION["service"];
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
  background-color: #7BC6BF;
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
  
}

input[type=text] {
	margin-left:100px;
  padding: 8px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.search-container button {
  
 padding: 10px 50px;
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
	
	
	
	
	
	
/*alert*/

.alertt {
  padding:20px;
  weight:50px;
  background-color: #ddd;
  color: black;
  margin:50px;
}

.closebtn {
  margin-left: 15px;
  color: black;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}




</style>
</head>
<body>

<div class="topnav">

  <a class="active" href="compteSecretaire.php">mes informatons</a>
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
<div class="col-8" style="background:url(bag.png); margin-top:50px">
<?php
if ((isset($_GET["id"]))and($_GET["id"]==1)){
	echo '<div class="alertt">
  <span class="closebtn" onclick="this.parentElement.style.display='."'none'".';">&times;</span> 
  <strong>on a pas un malade avec ce nom!!!</strong>
</div>';
}
?>
<div style="margin-left:350px;">
<?php
$secretaire=$_SESSION["secretaire"];

$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"select * from secretaire where id='{$secretaire}'");
$res=mysqli_fetch_array($req);
echo '<p><font class="titre">nom:</font>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$res["nom"].'<br><p><font class="titre"> prenom  :</font> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$res["prenom"].'</br>
<font class="titre">email : </font>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$res["dateNaiss"].'</br>
<font class="titre">situation civil:</font> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$res["civil"].'</br>
<font class="titre">password:</font> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$res["pass"].'</br>
<font class="titre">telephone :</font>'.$res["numtel"].'</br>
<font class="titre">date de naissance :</font>'.$res["dateNaiss"].'</p>';


?>





</div>
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

