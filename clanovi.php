<?php 
  include ('./includes/header.php');
  include ("./db/konekcija.php");
  $poruka = '';
  if (isset($_POST["ubaciClana"])) {
    
	include("user.php");
	$clan = new User($conn);
	
	
	$sacuvano = $clan->sacuvajUsera();
    if ($sacuvano) {
      $poruka = 'Uspesno sacuvan clan'; 
    } else {
       $poruka = 'Neuspesno sacuvan clan'; 
    }

  

  }
  
 ?>
<div class="container-fluid">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Aktivni</a></li>
  <li><a data-toggle="tab" href="#menu1">Pocasni</a></li>
  <li><a data-toggle="tab" href="#menu2">Bivsi</a></li>
</ul>

<div class="tab-content col-sm-9">
  <div id="home" class="tab-pane fade in active">
    <?php 
        include ('./db/konekcija.php');
        $sql="SELECT email, ime, prezime FROM clanovi ORDER BY id ASC";
        if (!$q=$conn->query($sql)){
        echo "<p>Nastala je greska pri izvodenju upita</p>" . mysql_query();
        exit();
        }
        if ($q->num_rows==0){
        echo "Nema novosti";
        } else {
        ?>
				<table class="table-striped table">
				<thead>
					<tr>
						<th>Ime</th>
						<th>Prezime</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>

        <?php
        while ($red=$q->fetch_object()){
          ?>  
			<tr>
            <td><?php echo " $red->ime";?></td>
			<td><?php echo " $red->prezime ";?></td>
			<td><?php echo " $red->email ";?></td>
          
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
  <div id="menu1" class="tab-pane fade">
    <h3>Pocasni clanovi</h3>
    <p>Ovde ce biti dodavani pocasni clanovi</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Bivsi clanovi</h3>
    <p>Ovde ce biti dodavani bivsi clanovi</p>
  </div>
</div>
<div class="col-sm-3">
  <form class="form-signin" method="post" action="" >
        <h2 class="form-signin-heading">Ubaci clana</h2>

        <label for="inputIme" class="sr-only">Ime</label>
        <input name="ime" type="text" id="inputIme" class="form-control" placeholder="Ime" required autofocus >

        <label for="inputPrezime" class="sr-only">Prezime</label>
        <input name="prezime" type="text" id="inputPrezime" class="form-control" placeholder="Prezime" required autofocus >

        <label for="inputEmail" class="sr-only">Email</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus >

        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required >

        
        <button class="btn btn-lg btn-default  btn-block" name="ubaciClana" id="ubaciClana" type="submit">Ubaci clana</button>
		<?php if($poruka !=''){
			echo("<h3>$poruka</h3>");
		}
		?>
  </form>






</div><!--Deo za ubacivanje clanova-->

  </div><!--div class container fluid sa pocetka-->
<?php 
	include ('./includes/footer.php');
 ?>