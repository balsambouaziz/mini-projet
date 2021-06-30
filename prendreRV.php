<?php
session_start();
if(!isset($_SESSION["malade"])){
	header("location:pageOff.php");
}


?>
<html>
<head>
<title><?= $_SESSION["nom"]."  ".$_SESSION["prenom"]?></title>
<style>
* {
  box-sizing: border-box;
   
}






/*alert*/

.alert {
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
  margin:200px;
  
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 50px;
}
.col-75 {
  float: right;
  width: 50%;
  margin-top: 3px;
}
.col-25 {
  float: left;
  width: 50%;
  margin-top: 3px;
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









input.submit{
 margin-left :730;
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
text-color: #fff;}
input.submit:hover {background-color: #7BC6BF}

input.submit:active {
  background-color: #7BC6BF;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

/*hospitaliser*/
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
<body>
<?php
if ((isset($_GET["id"]))&&($_GET["id"]==1)){
	echo '<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='."'none'".';">&times;</span> 
  <strong>C est pas possible de prendre un rendez-vous a cette date veuillez changer!!!</strong>
</div>';
}
?>
<div class="container">
  <form action="rendezVous.php" method="get">
  <div class="row">
    <div class="col-25">
      <label for="fname" >nom</label>
    </div>
    <div class="col-50">
      <?php echo $_SESSION["nom"] ?> 
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">prenom</label>
    </div>
 <div class="col-50">
      <?php echo $_SESSION["prenom"]; ?> 
    </div>
  </div>


<div class="row">
    <div class="col-25">
      <label for="lname">medecien</label>
    </div>
     <div class="col-50">
      <select id="medecien" name="medecien">
	  <?php
	  $con=mysqli_connect("localhost","root","","hopital");
     $req=mysqli_query($con,"select * from medecin");
	 while($obj=mysqli_fetch_array ($req)){
	         echo '<option value="'.$obj["id"].'">'.$obj["nom"].'  '.$obj["prenom"].'  """"'.$obj["specialite"].'"""</option>';
	         
        
}?>
</select> 
	  </div>
</div>
  <div class="row">
    <div class="col-25">
      <label for="rv">date de rendez-vous</label>
    </div>
 <div class="col-50">
      <input type="date" id="lname" name="rv"/ >
    </div>
  </div>













<input class="submit" type="submit" value="prendre un rendez-vous"/>
  </form>
</div>

</body>
<html>