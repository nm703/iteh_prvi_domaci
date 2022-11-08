<?php

class Database 
{
    private $connection;

   public function connect()
   {
   
    $this->connection = new Mysqli("localhost", "root", "", "baza");

    if($this->connection){
        
        return $this->connection;
    } 
    return "DATABASE_CONNECTION_FAIL";
   }
    
}

$db = new Database();
$db->connect();


?>