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
    <meta charshet="utf-8" /
    <LINK rel="STYLESHEET" href="Css.css" type="text/css">
</head>
<body>
		<div id="border">
			<div id="border1">
				<img src="css/image/NantflixLogo.jpg" width="800" height="100">
			</div>
		</div>
<?php

		echo "<button id=\"button_1\" onclick=\"window.location.href='membreNantflix.php'\">Retour</button>"; 
		echo "<button id=\"button_2\" onclick=\"window.location.href='Deconnexion.php'\">Déconnexion</button>";
			echo "<table id =\"tableDatabase\" align = \"center\">";
			echo "<tr>";
				echo "<th colspan=9 align=\"center\"><input type=\"text\" id=\"myInput\" name=\"NomActeur\" onkeyup=\"myFunction()\" placeholder=\"Search for serie film\"></th>"; 
			echo "</tr>";
			echo "<tr class=\"header\">";
				echo "<th>ID</th>";
				echo "<th>SERIE FILM</th>";
				echo "<th>EPISODE</th>";
				echo "<th>ACTEUR</th>";
				echo "<th>REALISATEUR</th>";
				echo "<th align=\"center\">ANNEE</th>";
				echo "<th>VISIONNER</th>";
			echo "</tr>";
		$sql1 = "SELECT * FROM serie";
		$result1 = $connect->query($sql1);
			if($result1->num_rows>0){
				while($row1=$result1->fetch_assoc()){
				echo "<tr>";
					echo "<th>".$row1["Serie_Id"]."</th>";
					echo "<td>".$row1["Intitule"]."</td>";
					echo "<td>".$row1["Nb_episode"]."</td>";
					echo "<td>".$row1["ActeursPrincipaux"]."</td>";
					echo "<td>".$row1["Realisateur"]."</td>";
					echo "<td>".$row1["AnneeSortie"]."</td>";
					echo "<th><button onclick=\"window.location.href='Diriger.php?Serie=".$row1["Serie_Id"]."'\">Visionne</button></th>";
					}
				}
				echo "</tr>";			
			
			echo "</table>";
			?>
			<script>
				function myFunction(){
					var input, filter,table,tr,td,i,txtValue;
					input=document.getElementById("myInput");
					filter=input.value.toUpperCase();
					table=document.getElementById("tableDatabase");
					tr=table.getElementsByTagName("tr");	
					for(i=0;i<tr.length;i++){
						td=tr[i].getElementsByTagName("td")[0];
						if(td){
							txtValue=td.textContent||td.innerText;
							if(txtValue.toUpperCase().indexOf(filter)>-1){
								tr[i].style.display="";
							}
							else {tr[i].style.display="none";}
						}
					}
				}
			</script>

</body>
</html>