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
  background-color: #6EA39E;
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

  <a class="active" href="compteMalade.php">mes informatons</a>
  <a href="compteMaladeMede.php">mes medecins</a>
  
  <a   href="deconnexion.php">deconnexion</a>
 
</div>
<div class="row">
<div class="col-3">

  
  
<div id="mySidenav" class="sidenav">
<a href="compteMaladecalen.php" id="about">mes rendez-vous</a>
  <a href="compteMaladeMedi.php" id="blog">mes medicaments</a>
  
</div>
</div>

<div class="col-8" style="background:url(bag.png); margin-top:50px ">

<div style="margin-left:350px;">

<?php
$malade=$_SESSION["malade"];

$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"select * from malade where id='{$malade}'");
$res=mysqli_fetch_array($req);
echo '<p><font class="titre">nom:</font>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$res["nom"].'<br><p><font class="titre"> prenom  :</font> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$res["prenom"].'</br>
<font class="titre">email : </font>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$res["dateNaiss"].'</br>

<font class="titre">password:</font> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.$res["pass"].'</br>
<font class="titre">telephone :</font>'.$res["numtel"].'</br>
<font class="titre">date de naissance :</font>'.$res["dateNaiss"].'</p>';

?>
</div>
</div>
<br><br>

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
