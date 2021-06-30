<html>
<head>
 <title>Formulaire d'Inscription d'un Patient</title>
    <link rel="shortcut icon" href="avatar.jpg"/>
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

</style>

</head>















<body style="background:url(font.png);">

<div class="container">
  <form action="ajoutMalade.php">
  <div class="row">
    <div class="col-25">
      <label for="fname" >nom</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="nom" placeholder="Your name.." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">prenom</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="prenom" placeholder="Your last name.." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for=" date de naissance :"> date de naissance :</label>
    </div>
    <div class="col-75">
        <input type="date" name="date"/>
    </div>
  </div>
   <div class="row">
    <div class="col-25">
      <label for="adresse"> adresse:</label>
    </div>
    <div class="col-75">
        <input type="text" name="adresse" required />
    </div>
  </div>
  
  
  
   
   <div class="row">
    <div class="col-25">
      <label for="numt"> numero de telephone</label>
    </div>
    <div class="col-75">
        <input type="number" name="numt" required />
    </div>
  </div>
  
    
	
	  <div class="row">
    <div class="col-25">
      <label for="cart"> carte d'identite</label>
    </div>
    <div class="col-75">
        <input type="number" name="cartid" required />
    </div>
  </div>
  
  
  
  <div class="row">
    <div class="col-25">
      <label for=" email :"> email:</label>
    </div>
    <div class="col-75">
        <input type="email" name="email"/>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="mot de passe"> mot de passe :</label>
    </div>
    <div class="col-75">
    <input type="password"  name="pass"  size= "10" maxlength="10" required>
</input>
    </div>
  </div>
  
  
 <div class="row">
    <div class="col-25">
      <label for="situation civile">situation civile:</label>
    </div>
    <div class="col-75">
    <input type="Radio" name="civil" >
</input>celebataire
 <input type="Radio" name="civil" >
</input>marie
    </div>
  </div> 
  
  
  <div class="row">
    <div class="col-25">
      <label for=" trait:"> traitement</label>
    </div>
    <div class="col-75">
        <input type="text" name="trait"/>
    </div>
  </div>
  <div class="row">
    <input type="submit" value="enregistrer">
  </div>

</div>

</form>
</body>
</html>

