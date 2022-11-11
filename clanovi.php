<?php 
  include ('./includes/header.php');

 
  
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
    <div class="container mt-5">
         <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">
                     <h2 class="text-primary">Vidi sve pocasne clanove</h2>
                  </div>
                  <div class="card-body">
                     <form>
                        <div class="form-group">
                           <label for="CLANOVI-DROPDOWN"></label>
                           <select class="form-control" id="clanovi-dropdown">
                              <option value="">Pocasni clanovi</option>
                              <?php
                                 include "./db/konekcija.php";
                                 $result = mysqli_query($conn,"SELECT id,ime, prezime, email FROM clanovi WHERE idstatus = 1");
                                 while($row = mysqli_fetch_array($result)) {
                                 ?>
                              <option value="<?php echo $row['id'];?>"><?php echo $row["ime"];?> <?php echo $row["prezime"];?></option>
                              <?php
                                 }
                                 ?>
                           </select>
				                    </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
    
  <div id="menu2" class="tab-pane fade">
    <h3>Bivsi clanovi</h3>
    <p>Ovde ce biti dodavani bivsi clanovi</p>
  </div>
</div>


  </div><!--div class container fluid sa pocetka-->
<?php 
	include ('./includes/footer.php');
 ?>