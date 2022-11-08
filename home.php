
<?php
include("./db/konekcija.php");
session_start();

if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == '') {
    header("Location: index.php");
    die();
    exit();
}


?>


<!DOCTYPE html>
<html>
<head>
  <title>Trkački Forum</title>
  <meta charset="UTF-8">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>


  <!-- Latest compiled JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!--Ajax pomocu jquerija-->

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="./js/main.js"></script>
      <script type="text/javascript">
      function place(ele){
        $("#txt").val(ele.innerHTML);
        $("#livesearch").hide();
      }
      </script>
      <style type="text/css"> 
      #livesearch{ 
        margin:5px;
        width:220px;
        border: 1px solid;
        display: none;
        }
      #txt{
        border: solid #A5ACB2;
        margin:13px;
        }
		.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
		  background-color: #ccccff;
		}		
      </style>

      <!--end Ajax-->

</head>
<body onload="document.getElementById('txt').focus()">
<div class="container">
<nav class="navbar navbar-inverse navbar-justified">
  <div class="container-fluid"><!--komentar-->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">Trkački Forum</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
       <?php 
          include('includes/nav.php');
         ?>
    </div>
  </div><!--komentar-->
</nav>
</div> <!--div class container fluid/container za meni-->
<div class="container">



 
 <div class="col-sm-9" style="text-align: center;">
 	<h1>Cao <?php echo ($_SESSION["ime"]); ?>! Evo novosti:</h1>
 	<br>
 	<br>
  <!-- ucitaj novosti -->
 	<?php 
        $sql="SELECT idnovosti, naslov, tekst, vreme FROM novosti ORDER BY idnovosti DESC";
        if (!$q=$conn->query($sql)){
        echo "<p>Nastala je greska pri izvodenju upita</p>" . mysql_query();
        exit();
        }
        if ($q->num_rows==0){
        echo "Nema novosti";
        } else {
			?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="text-center">Naslov</th>
						<th class="text-center">Izmeni/Obrisi</th>
						<th class="text-center">Tekst</th>
						<th class="text-center">Vreme</th>
					</tr>
				</thead>
				<tbody>
			<?php
        
        while ($red=$q->fetch_object()){
          
          ?>
		  <tr>
            <td><?php echo " $red->naslov ";?></td>
			<td>
            <form method="post" action="">
            
            
            <button  class="btn btn-primary btn-sm" name="obrisi" type="button">
                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> 
                <a style="color:#fff;" href="?akcija=brisanje&idnovosti=<?php echo $red->idnovosti; ?>">Obrisi vest</a>
              </button>
            <br><br>
           <button  class="btn btn-primary btn-sm" name="izmeni" type="button" >
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                <a style="color:#fff;"  href="?akcija=izmena_forma&idnovosti=<?php echo $red->idnovosti; ?>">Izmeni vest</a>
              </button>
            </form>
			</td>
            <td><?php echo "$red->tekst"; ?></td>
            <td><?php echo "$red->vreme" ?></td>
            </tr>
          
        <?php
                    }
					?>
					</tbody>
					</table>
					<?php
         
                  }
              $conn->close();

         ?>
	
	


</div>
<div class="col-sm-3" style="text-align: center;">
	<form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Ubacite vesti</h2>

        <label for="inputNaslov" class="sr-only">Naslov</label>
        <input name="naslov" type="text" id="inputNaslov" class="form-control" placeholder="Naslov vesti" required autofocus >

        <label for="inputTekst" class="sr-only">Tekst</label>
        <input name="tekst" type="text" id="inputTekst" class="form-control" placeholder="Tekst vesti" required autofocus >
        
        <button class="btn btn-lg btn-default btn-block" name="submit" type="submit">Dodaj novu vest</button>
      </form>
  <form type="get" name="pretrazivanje" class="form-signin">
        <h2 class="form-signin-heading">Pronadji vest</h2>
        <input type="text" id="txt" class="form-control" placeholder="Tekst pretrage" required autofocus> 
        <button class="btn btn-lg btn-default btn-block" name="submit" type="button" id="sub">Pronadji</button>
        <br>
        <div required autofokus id="livesearch"></div><br/>
        <br>
        <div id="prikaz_rezultata"></div>

  </form>
      
  <?php 
  include ('db/konekcija.php');
      if (isset ($_GET['akcija']) && isset ($_GET['idnovosti'])){
      $akcija = $_GET['akcija'];
      $id = $_GET['idnovosti'];
    
      switch ($akcija){
      case "izmena_forma":
      $sql="SELECT idnovosti, naslov, tekst FROM novosti WHERE idnovosti=".$id;
      if (!$q=$conn->query($sql)){
        echo "<p>Nastala je greska pri izvodenju upita</p>" . mysql_query();
        exit();
      } else {
      if ($q->num_rows!=1){
      echo "<p>Nepostojeća novost.</p>";
      exit();
      } else {

      $novost = $q->fetch_object();
      $naslov = $novost->naslov;
      $tekst = $novost->tekst;
      

  
  ?>
  <form method="post" action="?akcija=izmena&idnovosti=<?php echo $_GET['idnovosti'];?>">
      <h2 class="form-signin-heading">Izmenite vest</h2>

        <label for="inputNaslov" class="sr-only">Naslov</label>
        <input id="inputNaslov" class="form-control" placeholder="Naslov vesti" required autofocus type="text" name="naslov" value="<?php echo $naslov;?>"/>

        <label for="inputTekst" class="sr-only">Tekst</label>
        <input id="inputTekst" class="form-control" placeholder="Tekst vesti" required autofocus name="tekst" name="tekst" value="<?php echo $tekst;?>"/>
        
        <button class="btn btn-lg btn-default btn-block" name="unos" value="Ubaci" >Dodaj izmenjenu vest</button>
  </form>
  <?php
  } 
  }
  break;
    case "izmena":
      if (isset ($_POST['naslov']) && isset ($_POST['tekst'])){
      $naslov = $_POST['naslov'];
      $tekst = $_POST['tekst'];
      $upit="UPDATE novosti SET naslov='". $naslov ."', tekst='" . $tekst . "' WHERE idnovosti=". $id;
      if ($conn->query($upit)){
      if ($conn->affected_rows > 0 ){
      echo '<p>Uspesno ste izmenili vest</p>';
	  echo('<a class="btn btn-primary btn-lg"  href="index.php">Osvezi </a>');
      } else {
      echo "<p>Novost nije izmenjena.</p>";
      }
      } else {
      echo "<p>Nastala je greška pri izmeni novosti</p>" ;
      }
      } else {
      echo "<p>Nisu prosleđeni parametri za izmenu";
      }
      
      
        }}
  ?>
</div>





<?php 
	include ('includes/footer.php');
 ?>