
<?php 
  include ('./includes/header.php');

 
  
 ?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Clanovi Pregled</title>
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <!-- Styles -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript" src="./js/main.js"></script>
 
   </head>
   <body>
      <div class="container mt-5">
         <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">
                     <h2 class="text-primary">Vidi sve počasne članove</h2>
                  </div>
                  <div class="card-body">
                     <form>
                        <div class="form-group">
                           <label for="CLANOVI-DROPDOWN"></label>
                           <select class="form-control" id="clanovi-dropdown">
                              <option value="">Članovi</option>
                              <?php
                                 require_once "./db/konekcija.php";
                                 $result = mysqli_query($conn,"SELECT id,ime, prezime, email FROM clanovi WHERE idstatus = 1");
                                 while($row = mysqli_fetch_array($result)) {
                                 ?>
                              <option value="<?php echo $row['id'];?>"><?php echo $row["ime"];?> <?php echo $row["prezime"];?></option>
                              <?php
                                 }
                                 ?>
                           </select>
                           <div class="form-group">
					            <div id="message" ></div>
				                    </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         $(document).ready(function() {
    $('#clanovi-dropdown').on('change', function() {
        var user_id = this.value;
        $.ajax({
            url: "showUser.php",
            type: "POST",
            data: {
                user_id: user_id
            },
            cache: false,
            success: function(response) {
                $('#message').html(response);
                
            }
        });
    });
});
      </script>

   </body>
</html>