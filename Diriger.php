<?php
session_start();
$_SESSION['Serie']=$_GET['Serie'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charshet="utf-8" />
    <LINK rel="STYLESHEET" href="css/diriger.css" type="text/css">
</head>
<body>
<?php
	$username ="root";
	$password="";
	$server="localhost";
	$dbname="applicationprojet";
	$connect=new mysqli($server,$username,$password,$dbname);
	if($connect->connect_error) {
    	die("No Connection :" . $connect->connect_error);
    	exit();
	}
	if(empty($_SESSION["Identifiant"])){echo "<script> window.location.href=\"membreNantflix.php\"</script>";}
	$IdentifiantMain=$_SESSION["Identifiant"];
	$SerieMain = $_SESSION["Serie"];
	$sql3="SELECT Utilisateur_Id FROM utilisateur WHERE Identifiant=\"$IdentifiantMain\"";
		$result1 =$connect->query($sql3);
		if($result1->num_rows>0){
			if($row3=$result1->fetch_assoc()){
				$UtilisateurID=$row3["Utilisateur_Id"];
		}
	}
	

$background=array("Gameofthrone.jpg","Sherlock.jpg","Walkingdead.jpg","Truedetective.jpg","Homeland.jpg","Howimetyourmother.jpg","Breakingbad.jpg");
$name=array("GAME OF THRONES","SHERLOCK HOLMES","THE WALKING DEAD","TRUE DETECTIVE","HOMELAND","HOW I MET YOUR MOTHER","BREAKING BAD");
$status=array("Complet","Complet","Complet","Complet","Complet","Complet","Complet","Complet");
$imdb=array("9.8 (13,921 votes)","9.3 (15,334 votes)","8.6 (645,334 votes)","9.3 (222,334 votes)","8.5 (123,334 votes)","8.4 (488,334 votes)","9.4 (300,334 votes)");
$realisateur=array("Daniel Minahan","Paul Mcguigan,Euros Lyn","Frank Darabont","Nic Pizzolatto","Alex Gansa, Howard Gordon","Craig Thomas","Vince Gilligan");
$pays=array("États-Unis","États-Unis","États-Unis","États-Unis","États-Unis","États-Unis","États-Unis","États-Unis");
$annee=array("2011","2010","2016","2015","2011","2005","2012");
$duration=array("55 minutes/épisode","90 minutes/épisode","44 minutes/épisode","55 minutes/épisode","55 minutes/épisode","22 minutes/épisode","45 minutes/épisode",);
$episodefilm=array("73","26","85","41","66","83","85");
$resolution=array("FHD","FHD","FHD","FHD","FHD","FHD","FHD");
$Langue=array("Anglais","Anglais","Anglais","Anglais","Anglais","Anglais","Anglais");
$video=array("SBELCQ4xPJU","xK7S9mrFWL4","AbtiqJGhWyY","fVQUcaO4AvE","E4ZRFs_MdM8","WwmonfrnxxQ","HhesaQXLuRY");

for($i=0;$i<8;$i++){
	if($_SESSION["Serie"]==($i+1))
	{	
?>		<div id="border">
			<div id="border1">
				<img src="css/image/NantflixLogo.jpg" width="800" height="100">
			</div>
		</div>

<?php
		echo "<button id=\"button_1\" onclick=\"window.location.href='membreNantflixDatabase.php'\">Retour</button>"; 
		echo "<button id=\"button_2\" onclick=\"window.location.href='Deconnexion.php'\">Déconnexion</button>";
		
?>
		<div id="box">
			<table id="test"><tr>
				<th>Serie Film</th>
				<th>Téléfilm</th>
				<th>Film d'horreur </th>
				<th>Film d'animation</th>
			</tr></table>
		</div> 
		<div class="box1">
			<div class="container">
				<div id="box2">
					<?php
					echo "<img src=\"css/image/$background[$i]\" width=\"380\" height=\"450\">"
					?>
				</div>
				<div id="box3">
					<?php
					echo "<h1 color=\"yellow\">$name[$i]</h1>
					 <div id=\"boxinfo\">
					<p>Le Status:<a> $status[$i]</a></p>
					<p>L'IMDB:<a> $imdb[$i]</a></p>
					<p>Le Réalisateur:<a> $realisateur[$i]</a></p>
					<p>Le Pays:<a> $pays[$i]</a></p>
					<p>L'Année:<a> $annee[$i]</a></p>
					<p>La Duration:<a> $duration[$i]</a></p>
					<p>L'Episode:<a> $episodefilm[$i] épisodes</a></p>
					<p>La Résolution:<a> $resolution[$i]</a></p>
					<p>La Langue: <a> $Langue[$i]</a></p>";
					?>
				</div>
			</div>
		<div class="clear"></div>
		</div>
		<div id="box5">
			<form action="Virtuel.php" method="POST">
			<?php 
			$sql2="SELECT * FROM  visionnage where RefUtilisateur=\"$UtilisateurID\" AND RefSerie=\"$SerieMain\"";
		$result2=$connect->query($sql2);
		if($result2->num_rows>0){
			if($row2=$result2->fetch_assoc()){
				echo "<a>Vous avez vu la serie: $SerieMain.$name[$i] et le derniere episode: ".$row2["EpisodeDerniere"].". </a><br><br>";
				$_SESSION["SerieName"]=$name[$i];
				$_SESSION["limite"] = $episodefilm[$i];
			}
		}
			echo "<a>Choisissez-vous une épisode: </a> ";
			echo "<select name=\"choix\">";
			for($j=1;$j<$episodefilm[$i]+1;$j++){
				echo "<option value=\"$j\">$j</option>";
			}
			echo "</select>";
			echo "<a>&nbsp;&nbsp;</a><input type=\"submit\" name=\"submit\" value=\"Visionne\">";
			?>
		</form>
		</div>
		<div id="box4">
			<?php
				echo "<iframe width='800' height='535 'src='https://www.youtube.com/embed/$video[$i]'' frameborder='0'allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
			?>
		</div>
<?php
	}
}
?>	
</body>
</html>
