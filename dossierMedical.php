<?php
session_start();
$medecin=$_SESSION["medecin"];
if(!(isset($_SESSION["medecin"])or isset($_SESSION["infirmier"]))){
	header("location:pageOff.php");
}
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<style>
.titre{
	font-style:italic;
	font-size:0.8cm;
    color: #6666ff;}

/*enregistrer*/
.buttonn {
	margin-top:10;
  margin-left :1200;
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
<h1 style="text-align:center"><b> Dossier medical</b> </h1>
<div style="border:solid; border-color:black">
<?php
$id=$_GET["id"];
$_SESSION["malademed"]=$id;

$con=mysqli_connect("localhost","root","","hopital");
$req=mysqli_query($con,"select * from malade where id='{$id}'");
$res=mysqli_fetch_array($req);
echo '
<p><font class="titre">nom:</font>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
<font style="font-size:0.5cm">'.$res["nom"].'</font>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<font class="titre" > prenom  :</font> 
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<font style="font-size:0.5cm">'.$res["prenom"].'</font>
</br></br></br>
<font class="titre"> email : </font>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<font style="font-size:0.5cm">'.$res["email"].'</font>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<font class="titre">telephone :</font>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<font style="font-size:0.5cm">'.$res["numtel"].'</font>
</br></br></br>
<font class="titre">date de naissance :</font>
&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
<font style="font-size:0.5cm">'.$res["dateNaiss"].'</font>
</p>';

?>

</div>
<table class="table table-striped " border="black">
<tr><th>date de cosultation</th>
 <th>observation</th>
 <th>traitement</th>
 <th>operation</th>
 <th>date dOperation</th>
 <th>date de prochaine rendez-vous</th></tr>















<?php
$malade=$_GET["id"];
$con=mysqli_connect("localhost","root","","hopital");
$req1=mysqli_query($con,"select * from dossiermedical where idMalade={$malade} and idMedecin={$medecin}");

while($res1=mysqli_fetch_array($req1)){

	
	echo '<tr><td>'.$res1["dateCon"].'</td>
	
	<td>'.$res1["observation"].'</td>
	<td>'.$res1["traitement"].'</td>
	
	<td>'.$res1["operation"].'</td>
	<td>'.$res1["dateOper"].'</td>
	<td> '.$res1["daterendvous"].'</td>
</tr>';
}
$req=mysqli_query($con,"select * from malade where id='{$malade}'");
$res=mysqli_fetch_array($req);
$med=$res["traitement"];
if(isset($_SESSION["medecin"])){
echo'
<form action="consultation.php" method ="post" >
<tr><td>'.date("d/m/Y").'</td>
	<td><input type="text" name="obser" /></td>
	<td><input type="text" name="trait" value='. $med.' ></td>
	<td><input type="text" name="oper"/></td>
	<td><input type="date" name="dateoper"/></td>
	<td><input type="date" name="rendProch"/></td>
	
	
	</tr>';

 }
?>	




</table>



 <div class="row">
    <input class="buttonn" type="submit"  value="enregistrer">
  </div>
</form>

</table>





























</body>
</html>