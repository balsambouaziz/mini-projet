<html>
<head>
 <title>Formulaire d'Inscription d'un Infirmier</title>
    <link rel="shortcut icon" href="infirmier.jpg"/>
<style>
* {
  box-sizing: border-box;
   
   }

input[type=text], select, textarea {
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-top :50;
  margin-left :100;
  margin-right :100;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
label{
   margin-left: 200px;
}







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

</head>













<body style="background:url(font.png);">



<div class="container">
  <form action="ajoutInfirmier.php" method="GET">
  <div class="row">
    <div class="col-25">
      <label for="fname" >nom</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="nom" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">prenom</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="prenom" required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for=" date de naissance :"> date de naissance :</label>
    </div>
    <div class="col-75">
        <input type="date" name="date" required />    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for=" email :"> email:</label>
    </div>
    <div class="col-75">
        <input type="email" name="email" required />
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="mot de passe"> mot de passe :</label>
    </div>
    <div class="col-75">
    <input type="password" name="pwd"  size= "10" maxlength="10" autocomplete required>
</input>
    </div>
  </div>
  
  
 <div class="row">
    <div class="col-25">
      <label for="mot de passe"> situation civile</label>
    </div>
    <div class="col-75">
    <input type="Radio" name="civil" value="celebataire" >
</input>celebataire
 <input type="Radio" name="civil" value="marie" >
</input>marie
    </div>
  </div> 
  
  
  
  
   <div class="row">
    <div class="col-25">
      <label for="numt"> numero de telephonne</label>
    </div>
    <div class="col-75">
    <input type="tel"  name="numt"  size= "10" maxlength="8" autocomplete required>
</input>
    </div>
  </div>

  
  <div class="row">
    <div class="col-25">
      <label for="cartid"> carte d'identite</label>
    </div>
    <div class="col-75">
    <input type="number"  name="cartid"  size= "8" maxlength="8" autocomplete required>
</input>
    </div>
  </div>
  
  
   <div class="row">
    <div class="col-25">
      <label for="service"> service</label>
    </div>
   
     <div class="col-75">
      <select id="service" name="service" required>
	  <?php
	  $con=mysqli_connect("localhost","root","","hopital");
     $req=mysqli_query($con,"select * from service ");
	 while($obj=mysqli_fetch_array ($req)){
	         echo '<option value="'.$obj["id"].'">'.$obj["nom"].'</option>';
        
}?>

<div class="row">
    <input class="buttonn" type="submit" value="enregistrer" />
  </div>
  </form>
</div>
  
   
</body>
</html>
