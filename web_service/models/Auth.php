<?php
class Auth{
    // DB stuff
    private $conn;
    private $table = 'dj';

    //Dj properties
    public $id;
    public $email;
    public $pass;


    //constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }

    public function verify(){
        //Create query
        $query = 'SELECT
                    p.id,
                    p.email,
                    p.pass
                FROM
                ' . $this->table . ' p
                WHERE
                    p.email = :email';
                    //p.id = :id';
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //Bind ID
        //$stmt->bindParam(1, $this->id);
        $stmt->bindParam(':email', $this->email);

        //Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Set Properties
        $this->id          = $row['id'];
        $this->email       = $row['email'];
        $this->pass        = $row['pass'];
    }
}
