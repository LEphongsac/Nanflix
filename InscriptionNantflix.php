<!DOCTYPE html>
<html>
<head>
	<title>
		Incription
	</title>
	<meta charset="urf-8"/>
	<LINK rel="STYLESHEET" href="css/inscription.css" type="text/css">

</head>
<body>
	<form name="Incription"  method="post" enctype="multipart/form-data">
		<button id ="button_2" onclick="location.href='membreNantflix.php'" type="button">S'identifier'</button>
		<table id="tableMembre" width="400" height ="200" border="3" cellpadding ="4"align="center">
			<tr>
				<th colspan="2" style="color:white"><Big><Big>Incription Nantflix</Big></Big></th>
			</tr>
			<tr>
				<td style="color:white"><b>Email</b></td>
				<td><input type="text"
					name="Email"
					pattern=^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$
					title="Il faut de saisir un mailz`">
				</td>
			</tr>
			<tr>
				<td style="color:white"><b>Password</b></td>
				<td><input type="password"
					name="Password"
					pattern=^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$
					title="Password doit comporter une majuscule et un chiffre">
				</td>
			</tr>
			<tr>
				<td style="color:white"><b>Nom</b></td>
				<td><input type="text"
					name="Nom">
				</td>
			</tr>
			<tr>
				<td style="color:white"><b>Prenom</b></td>
				<td><input type="text"
					name="Prenom">
				</td>
			</tr>
			<tr>
				<td style="color:white"><b>Date Naissance</b></td>
				<td><input type="date"
					name="Date">
				</td>
			</tr>
			<tr>
				<td style="color:white"><b>Telephone</b></td>
				<td><input type="text"
					name="Telephone">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="btnInscrip" value="Incription">
				</td>
			</tr>
		</table>
	</form>

	<?php
	$username="root";
	$password="";
	$server="localhost";
	$dbname="applicationprojet";
	$connect=new mysqli($server,$username,$password,$dbname);
	if($connect->connect_error){
		die("No Connection: ".$connect->connect_error);
		exit();
	}
	$Email ="";
	$Password="";
	$Nom="";
	$Prenom="";
	$Date="";
	$Telephone="";
	if(isset($_POST["btnInscrip"])){
		if(isset($_POST["Email"])) $Email=$_POST['Email'];
		if(isset($_POST["Password"])) $Password=$_POST['Password'];
		if(isset($_POST["Nom"])) $Nom=$_POST['Nom'];
		if(isset($_POST["Prenom"])) $Prenom=$_POST['Prenom'];
		if(isset($_POST["Date"])) $Date=$_POST['Date'];
		if(isset($_POST["Telephone"])) $Telephone=$_POST['Telephone'];
		if(empty($Email) OR empty($Password) or empty($Nom) OR empty($Prenom) OR empty($Date) OR empty($Telephone))
		{
			
			$msg1 = "Attention, les champs doivent etre remplis.";
            echo "<script type='text/javascript'>alert(\"$msg1\");</script>";
		}
		else{
		$sql="INSERT INTO utilisateur(Identifiant,MotdePasse,Nom,Prenom,DatedeNaissance,Telephone) 
			Values('$Email','$Password','$Nom','$Prenom','".date('Ymd',strtotime($Date))."','$Telephone')";
		if ($connect->query($sql) != TRUE) {
        	 echo "Error: " . $sql . "<br>" . $connect->error;
   		}
   		else {header("Location: membreNantflix.php");}
   		}
	}
?>
</body>
</html>