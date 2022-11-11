<?php



class User{

    public $conn;

    public function __construct($conn){
 
    $this->conn = $conn;
                            }
    
    
    public static function logIn($email, $password, mysqli $conn){
    $q = "select * from clanovi where email= '".$email."' and password ='".$password."' limit 1;";
    
    return $conn->query($q);
}

public static function vecPostoji($email, $conn){

    $pre_stat = $conn->prepare("SELECT id FROM clanovi WHERE email=?");
        $pre_stat->bind_param("s", $email);
        $pre_stat->execute() or die($this->conn->error);
        $result = $pre_stat->get_result();
        if ($result->num_rows > 0) return 1;
        else return 0;
}

public function sacuvajUsera() {



    $ime = trim($_POST["ime"]);
    $prezime = trim($_POST["prezime"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    

    if ($this->vecPostoji($email, $this->conn) == 1) {

        return 1; } else {

    if(mysqli_query($this->conn, "INSERT INTO clanovi (ime,prezime,email, password) VALUES ('$ime', '$prezime','$email','$password')")){
        return 2;
    }else{
        return 3;
    }
}

}

}
?>