<?php 

session_start();
  include ("./includes/liste.php");
  include ("./db/konekcija.php");
  include ("user.php");

// LOGIN


if (isset($_POST['log_email']) && isset($_POST['log_password'])) {
    $email = $_POST['log_email'];
    $password = $_POST['log_password'];

    $rs = User::logIn($email, $password, $conn);

    if ($rs->num_rows == 1) {
        echo "Uspesno ste se prijavili";
        $row = $rs -> fetch_assoc();
        $_SESSION['ime'] = $row['ime'];
        $_SESSION['idclana'] = $row['id'];
        $_SESSION['loggeduser'] = "prijavljen";
        
        header('Location: home.php');
        exit();
        
    } else {
        
        echo '<script type="text/javascript">alert("Pogresni podaci za login");
        window.location.href = "index.php";</script>';
        exit();
    }
}

//REGISTER

        if(isset($_POST["newime"]) && isset($_POST["newprezime"]) && isset($_POST["newemail"]) && isset($_POST["newpassword"]) && isset($_POST["newstatus"]))
        {	
          $ime = $_POST["newime"];
          $prezime = $_POST["newprezime"];

          $email = $_POST["newemail"];

          $password = $_POST["newpassword"];
          $status = $_POST["newstatus"];
          
        
          $clan = new User($conn);
          
          
          $sacuvano = $clan->vecPostoji($email, $conn);
        
            if ($sacuvano == 1) {
              echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>  
                 Clan sa ovom email adresom vec postoji! 
              </div>';
            }
           else {

          
          $stmt=$conn->prepare("INSERT INTO clanovi(ime, prezime,
                              email, 
                              password, idstatus)
                            VALUES
                                (?,?,?,?,?)"); 
          
            
          $stmt->bind_param("ssssi", $ime, $prezime, $email, $password, $status);
        
          if($stmt->execute())
          {
            echo '<div class="alert alert-success"><br><button type="button" class="close" data-dismiss="alert">&times </button> 
                 Uspesna registracija! 
              </div>';
              
             
              exit();		
          }	
          else
          {
            echo  '<div class="alert alert-danger"> <br>
            <button type="button" class="close" data-dismiss="alert">&times</button>
                  Neuspesna registracija!  
                </div>';		
          }
        }

      }



  // UNOS VESTI

  if (isset($_POST["submit"])) {
    $naslov=$_POST["naslov"];
    $tekst=$_POST["tekst"];

    $idclana = $_SESSION['idclana'];
  
    $sql = "INSERT INTO novosti (naslov, tekst, vreme, idclana) VALUES ('$naslov' , '$tekst', NOW(), '$idclana' ) " ;

    if ($conn->query($sql) === TRUE) {
      echo '<script language="javascript">';
      echo 'alert("Uspesno ste ubacili vest")';
      echo '</script>'; 
    } else {
        echo "GRESKA: " . $sql . "<br>" . $conn->error;
    }

    }

   
  
 ?>