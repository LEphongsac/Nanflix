<?php
session_start();
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
    <meta charshet="utf-8" />
    <LINK rel="STYLESHEET" href="css/Virtuel.css" type="text/css">
</head>
<body>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){	
	if(isset($_POST['submit'])) {
		$IdentifiantMain=$_SESSION["Identifiant"];
		$SerieMain = $_SESSION["Serie"];
		$sql3="SELECT Utilisateur_Id FROM utilisateur WHERE Identifiant=\"$IdentifiantMain\"";
		$result1 =$connect->query($sql3);
		if($result1->num_rows>0){
			if($row3=$result1->fetch_assoc()){
				$UtilisateurID=$row3["Utilisateur_Id"];
			}
		}
		$VisionneEp = $_POST["choix"];
		$_SESSION["EpisodeDer"]=$VisionneEp+1;
		$rows=mysqli_query($connect,"SELECT * FROM  visionnage where RefUtilisateur=\"$UtilisateurID\" AND RefSerie=\"$SerieMain\"");
		$count=mysqli_num_rows($rows);
		if($count==1){
			$sql4="UPDATE visionnage SET EpisodeDerniere = $VisionneEp WHERE RefUtilisateur= \"$UtilisateurID\" AND RefSerie = $SerieMain";
			if ($connect->query($sql4) != TRUE) {
        	 echo "Error: " . $sql4 . "<br>" . $connect->error;
   			}
		}		
		else{
			$sql="INSERT INTO visionnage(RefUtilisateur,RefSerie,EpisodeDerniere) VALUES($UtilisateurID,$SerieMain,$VisionneEp)";
			if ($connect->query($sql) != TRUE) {
        	 echo "Error: " . $sql . "<br>" . $connect->error;
   				}
		}
	}
}
$SerieDiriger=$_SESSION['Serie'];
echo "<button id=\"button_1\" onclick=\"window.location.href='Diriger.php?Serie=$SerieDiriger'\">Retour</button>"; 
echo "<button id=\"button_2\" onclick=\"window.location.href='Deconnexion.php'\">Déconnexion</button>";
?>
<div id="border">
	<div id="border1">
		<img src="css/image/NantflixLogo.jpg" width="800" height="100">
	</div>
</div>
<div id="box1">	
	<?php
		$ProchainEp = $_SESSION["EpisodeDer"]; 
		$SerieName =$_SESSION["SerieName"];
		$limite = $_SESSION["limite"];
		echo "$Limite";
		if($ProchainEp > $limite){echo "<a>C'est l'episode dernier - $SerieName. Merci d'avoir regardé";}
		else {echo "<a>Votre prochain episode est: $ProchainEp - $SerieName. </a>";}
	?>
		<br><br><br><iframe width="800" height="555" src="https://www.youtube.com/embed/Pe-EhaCXYvU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
		</div>

</body>
</html>
