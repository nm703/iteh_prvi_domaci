<?php



class User{
    // public $id;
    // public $email;
    // public $password;
    public $conn;


// $id = null, $email=null, $password = null, 

public function __construct($conn){
    // $this->id = $id;
    // $this->email = $email;
    // $this->password = $password;
    $this->conn = $conn;
}
public static function logIn($email, $password, mysqli $conn){
    $q = "select * from clanovi where email= '".$email."' and password ='".$password."' limit 1;";
    
    return $conn->query($q);
}

public function sacuvajUsera() {
    $ime = trim($_POST["ime"]);
    $prezime = trim($_POST["prezime"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if(mysqli_query($this->conn, "INSERT INTO clanovi (ime,prezime,email, password) VALUES ('$ime', '$prezime','$email','$password')")){
        return true;
    }else{
        return false;
    };

}

}
?>