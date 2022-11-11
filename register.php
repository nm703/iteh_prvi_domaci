<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>Trkacki Forum</title>

<title> Registracija </title>
		
   
		
</head>

	<body>
	
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Nazad na Login</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">
		  
			<h2>Registruj se na trkacki forum!</h2>
			
        <div class="registration-form">
        <div class="main-div">
        
            <form id = "form1" id="registration_form" class="form-horizontal">
             
                <div class="imgcontainer">
               
                </div>
                <div class="container">
                    <input type="text" placeholder="Ime" name="txt_ime" id = "txt_ime" class="form-control" required>
                    <br>
                    <input type="text" placeholder="Prezime" name="txt_prezime" id = "txt_prezime" class="form-control" required>
                    <br>
                    <input type="text" placeholder="Email" name="txt_email" id = "txt_email" class="form-control" required>
                     <br>
                    <input type="password" placeholder="Password" name="txt_password" id = "txt_password" class="form-control" required>
                    <br>

                    <select class="form-control" id="status-dropdown">
                              <option value="" >Izaberi status</option>
                              <?php
                                 require_once "./db/konekcija.php";
                                 $result = mysqli_query($conn,"SELECT idstatus, ime FROM status");
                                 while($row = mysqli_fetch_array($result)) {
                                 ?>
                              <option value="<?php echo $row['idstatus'];?>"><?php echo $row["ime"];?></option>
                              <?php
                                 }
                                 ?>
                           </select>
                         <br>
                         <br>
                        <button class = "btn btn-info" type="submit" id="btn_register">Registruj se</button>
                        <br>
                        <br>
                        
                </div>
                <div class="form-group">
					<div id="message" ></div>
				</div>
            </form>
        </div>
	
	<script> 


        
		$(document).on('click','#btn_register',function(e){
			
			e.preventDefault();
			
			var ime = $('#txt_ime').val();
            var prezime = $('#txt_prezime').val();
			var email 	 = $('#txt_email').val();
			var password = $('#txt_password').val();
            var status = 1;
            var selectElement = document.querySelector('#status-dropdown').value;
            
            status = selectElement;
			
			var atpos  = email.indexOf('@');
			var dotpos = email.lastIndexOf('.com');

			
			if(ime == ''){ 
				alert('Unesi ime! !!'); 
			}
            else if(prezime == ''){ 
				alert('Unesi prezime !!'); 
			}
			else if(email == ''){ 
				alert('Unesi email !!'); 
			}
			else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){ //format email adrese
				alert('Email adresa nije validna!!'); 
			}
			else if(password == ''){ 
				alert('Unesi password !!'); 
			}
			else if(password.length < 3){ 
				alert('Password mora imati bar 3 karaktera !!');
			} 
			else{			
				$.ajax({
					url: 'process.php',
					type: 'POST',
					data: 
						{newime:ime,
                        newprezime:prezime,
						 newemail:email, 
						 newpassword:password,
                         newstatus:status
						},
					success: function(response){
						$('#message').html(response);
					}
				});
				
				$('#registration_form')[0].reset();
			}
		});

	</script>
	
	</body>
</html>