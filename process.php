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
        echo "Vi ste ".$_SESSION["ime"];
        header('Location: home.php');
        exit();
        
    } else {
        
        echo '<script type="text/javascript">alert("Pogresni podaci za login");
        window.location.href = "index.php";</script>';
        exit();
    }
}











  //ovde ide brisanje podataka 
  
  //Unos podataka

  if (isset($_POST["submit"])) {
    $naslov=$_POST["naslov"];
    $tekst=$_POST["tekst"];

    $idclana = $_SESSION['id'];
  
    $sql = "INSERT INTO novosti (naslov, tekst, vreme, idclana) VALUES ('$naslov' , '$tekst', NOW(), '$idclana' ) " ;

    if ($conn->query($sql) === TRUE) {
      echo '<script language="javascript">';
      echo 'alert("Uspesno ste ubacili vest")';
      echo '</script>'; 
    } else {
        echo "GRESKA: " . $sql . "<br>" . $conn->error;
    }

    exit();

    }


    if (isset ($_GET['akcija']) && isset ($_GET['idnovosti'])){
      $akcija = $_GET['akcija'];
      $id = $_GET['idnovosti'];
      switch ($akcija){
        case "brisanje":
              $upit = "DELETE FROM novosti WHERE idnovosti = ".$id;
              if ($conn->query($upit) === TRUE) {
              echo '<script language="javascript">';
              echo 'alert("Uspesno ste obrisali vest")';
              echo '</script>'; 
              } else {
                  echo "GRESKA: " . $upit . "<br>" . $conn->error;
              }
              break;
      
      
      
      break;
      }
    
    exit();
      }
  
 ?>