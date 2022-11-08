<?php
if (!isset ($_GET["naslov"])){
echo "Parametar naslov nije prosleđen!";
} else {
$pomocna=$_GET["naslov"];
include "./db/konekcija.php";

$sql="SELECT * FROM novosti WHERE naslov='".$pomocna."'";
$rezultat = $conn->query($sql);

echo "<table class='table table-hover'>
<thead>
	<tr>
		<th>Naslov novosti</th>
		<th>Tekst novosti</th>
	</tr>
</thead>
	<tbody>";
	

while($red = $rezultat->fetch_object()){
 echo "<tr>";
 echo "<td>" . $red->naslov . "</td>";
 echo "<td>" . $red->tekst . "</td>";
 echo "</tr>";
 }
echo "</tbody></table>";

$conn->close();
}
?>