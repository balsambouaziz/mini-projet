
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  padding: 14px 180px;
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
  left: -150px;
  transition: 0.3s;
  padding: 15px;
  width: 250px;
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
  /*calendrier*/
  
#libelle { margin: 0 auto; padding: 0; }
 .ligne { margin: 0 auto; padding: 0; }
 #libelle li { float : left; } 
 .ligne li { color: #000; float : left;  } 
 .ligne li a:hover{ list-style: none; text-decoration: none; } 
 li.itemCurrentItem { /* A vous de configurer l'apparence de la date du jour */ 
  padding: 5px;
  background: #1abc9c;
  color: white !important;}
 li.itemSelectedItem { /* A vous de configurer l'apparence du jour sélectionné */ }
 
 
 
 
  /*calendrier*/
  
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

.month {
  padding: 70px 25px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next{
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}


/*prendre un rendez-vous*/
.buttonn {
	margin-top:100;
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

</style>


<head>
<body>

<div class="topnav">

  <a  href="compteMalade.php">mes informatons</a>
  <a  href="compteMaladeMede.php">mes medecins</a>
  
  <a   href="deconnexion.php">deconnexion</a>
 
</div>
<div class="row">
<div class="col-3">

  
  
<div id="mySidenav" class="sidenav">
<a href="compteMaladecalen.php" id="about">mes rendez-vous</a>
  <a href="compteMaladeMedi.php" id="blog">mes medicaments</a>
  
</div>
</div>
<div class= "col-8">
<?php


 
 


 // fonctions utiles, $valeur 
 //représente une date au format AAAA-MM-JJ
 
 function getSecond($valeur) {
 return substr($valeur, 17, 2);
   }

   function getMinute($valeur) {
       return substr($valeur, 14, 2);
   }

  function getHour($valeur) {

      return substr($valeur, 11, 2);
  }

  function getDay($valeur)     {
     return substr($valeur, 8, 2);
  }

  function getMonth($valeur)     {
     return substr($valeur, 5, 2);
  }

  function getYear($valeur) {
     return substr($valeur, 0, 4);
 }

  function monthNumToName($mois) {
    $tableau = Array("", "Janvier", "Février", 
    "Mars", "Avril", "Mai", "Juin", "Juillet", 
    "Aôut", "Septembre", "Octobre", "Novembre", "Décembre");

    return (intval($mois) > 0 && intval($mois) 
    < 13) ? $tableau[intval($mois)] : "Indéfini";
}
// Fonction pour afficher le calendrier
 function showCalendar($periode) {
    $leCalendrier = "";
    // Tableau des valeurs possibles pour un numéro 
    //de jour dans la semaine
    $tableau = Array("0", "1", "2", "3", "4", "5", "6", "0");

    $nb_jour = Date("t", mktime(0, 0, 0, getMonth($periode), 
    1, getYear($periode)));
    $pas = 0;
    $indexe = 1;

    

    
    // Tant que l'on n'a pas affecté tous les jours du mois traité
	while ($pas < $nb_jour) {
		$a="";
	$malade=$_SESSION["malade"];
        $a2= Date("Y-m-d", mktime(0, 0, 0, getMonth($periode),
          1 + $pas, getYear($periode)));
		 $con=mysqli_connect("localhost","root","","hopital");
		  $req=mysqli_query($con,"select * from rendezvous where idMalade='${malade}'and rendezVous='${a2}' ");
		  $res=mysqli_fetch_array($req);
		  $a=$res["rendezVous"];
        if ($indexe == 1) $leCalendrier .= 
        "\n\t<ul class=\"days\">";

        // Si le jour calendrier == jour de la semaine en cours
        if (Date("w", mktime(0, 0, 0, getMonth($periode), 
        1 + $pas, getYear($periode))) == $tableau[$indexe]) {
          // Si jour calendrier == aujourd'hui
          $afficheJour = Date("j", mktime(0, 0, 0, 
          getMonth($periode), 1 + $pas, getYear($periode)));
		  
          if (Date("Y-m-d", mktime(0, 0, 0, getMonth($periode),
          1 + $pas, getYear($periode))) == Date("Y-m-d")) {
                $class = " class=\"itemCurrentItem\"";
				

          }
          else {
                // 1 est toujours vrai => on affiche 
                //un lien à chaque fois
                // A vous de faire les tests 
                //nécessaire si vous gérer un agenda par exemple
				if (Date("Y-m-d", mktime(0, 0, 0, getMonth($periode),
          1 + $pas, getYear($periode))) == Date($a)) {
			  
                $class = " class=\"fas\"";
		  $afficheJour ="&#xf0f0;";


		  }
                else {
                    $class = " class=\"itemExistingItem\"";
                    $afficheJour =  Date("j",
                    mktime(0, 0, 0, getMonth($periode), 1 + 
                    $pas, getYear($periode)));

                     }
                    
                     }
                     // Ajout de la case avec la date
                     $leCalendrier .= "\n\t\t<li$class>
                     $afficheJour</li>";
                     $pas++;
             }
             //
             else {

                    // Ajout d'une case vide
                    $leCalendrier .= "\n\t\t<li>&nbsp;</li>";
             }
             if ($indexe == 7 && $pas < $nb_jour) 
             { $leCalendrier 
             .= "\n\t</ul>"; $indexe = 1;} else {$indexe++;}
          }

          // Ajustement du tableau
          for ($i = $indexe; $i <= 7; $i++) {
               $leCalendrier .= "\n\t\t<li>&nbsp;</li>";
          }
          $leCalendrier .= "\n\t</ul>\n";

          // Retour de la chaine contenant le Calendrier
          return $leCalendrier;

 }
	

?>




<div class= "col-12">
<br><br><br><br><br><br>
<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
   
    <li>
      <?php echo monthNumToName(getMonth(date("Y-m"))) ; ?>
      <span style="font-size:18px">2021</span>
    </li>
	<li class="next">&#10095;</li>
  </ul>
</div>

<ul class="weekdays">
  <li>lun</li>
  <li>mar</li>
  <li>mer</li>
  <li>jeu</li>
  <li>ven</li>
  <li>Sa</li>
  <li>di</li>
</ul>

<ul class="days">  
 <?php

 echo showCalendar(date("Y-m"));?>
</ul>
</div >

</div>
<br><br><br>
<a href="prendreRV.php"><button class="buttonn" >prendre un rendez-vous</button></a>
</div><br><br><br><br>
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


























<body>
</html>