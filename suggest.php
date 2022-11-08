<?php
if (!isset ($_GET["unos"])){
    echo "Parametar Unos nije prosleđen!";
} else {
    $pomocna=$_GET["unos"];
    include ("konekcija.php");
    $sql="SELECT idnovosti,naslov FROM novosti WHERE naslov LIKE '$pomocna%'ORDER BY naslov";
    $rezultat = $mysqli->query($sql);
        if ($rezultat->num_rows==0)
        {
            echo "U bazi ne postoji naslov koja počinje na " . $pomocna;
        } else 
        {
            while($red = $rezultat->fetch_object())
            {
        ?>
            <a href="#" onclick="place(this)"> <?php  echo $red->naslov;?> </a>
            <br/>
<?php
        }
        }
    
        $mysqli->close();
}
?>