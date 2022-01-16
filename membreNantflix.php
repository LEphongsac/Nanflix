<?php session_start(); 

	$username ="root";
	$password="";
	$server="localhost";
	$dbname="applicationprojet";
	$connect=new mysqli($server,$username,$password,$dbname);
	if($connect->connect_error) {
    	die("No Connection :" . $connect->connect_error);
    	exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Nanflix
	</title>	
	<meta charset="utf-8"/>
	<LINK rel="STYLESHEET" href="css/membreNantflix.css" type="text/css">
</head>
<body>
	<form name="membreNanflix"  method="post" enctype="multipart/form-data">
		<button id ="button_2" onclick="location.href='InscriptionNantflix.php'" type="button">S'incrire</button>
		<table id="tableMembre" width ="400" height="200" border="0" cellpadding="5" align="center">
			<tr>
				<th colspan="2" style="color:white"><Big><Big><b> Welcome to Nantflix </b></Big></Big></th>
			</tr>
			<tr>
				<td style="color:white"><b> Email</b> </td>
				<td><input type="text" 
					name ="Identifiant" 
					pattern=^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$
					title="Saisir votre email"
					autofocus>
				</td><br>
			</tr>
			<tr>
				<td style="color:white"><b> Password </b></td>
				<td><input type="password"
					name="Password"
					pattern=^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$
					title="Password doit comporter une majuscule et un chiffre">
				</td>
			</tr>

			<tr>
				<td colspan="2" align = "center">
					<input type="submit" name="btnOk" value="Connecter">
				</td>
			</tr>
		</table>
	</form>

<?php
if(isset($_POST['btnOk'])){
		if(isset($_POST["Identifiant"])) {$Identifiant=$_POST['Identifiant'];}
		if(isset($_POST["Password"])) {$Password = $_POST['Password'];}
		$_SESSION["Identifiant"] = "$Identifiant";
		$_SESSION["Password"] = "$Password";
	$rows=mysqli_query($connect,"SELECT * FROM utilisateur WHERE Identifiant = \"$Identifiant\" AND MotdePasse = \"$Password\"");
	$count=mysqli_num_rows($rows);
	if($count==1){
		echo "<script> window.location.href=\"membreNantflixDatabase.php\"</script>";
	}
	else {$msg2 = "Identifiant ou Password est incorrect! Please try again";
        echo "<script type='text/javascript'>alert(\"$msg2\");</script>";
    }
}
?>
</body>
</html>



