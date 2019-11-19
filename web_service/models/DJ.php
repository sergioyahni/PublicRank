<?php
class DJ{
    // DB stuff
    private $conn;
    private $table = 'dj';

    //Dj properties
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $pass;
    public $phone;
    public $website;
    public $facebook;
    public $about;
    public $location;
    public $image;
    public $created_date;

    //constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }
    // get a list of all DJs, no password required , no acess restrictions
    //==========================================================================
    public function read(){
        //Create query
        $query = 'SELECT
                    p.id,
                    p.first_name,
                    p.last_name,
                    p.email,
                    p.phone,
                    p.website,
                    p.facebook,
                    p.about,
                    p.location,
                    p.image,
                    p.created_date
                FROM
                ' . $this->table . ' p';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();
        return $stmt;
    }
     //Get a single DJ, NO password proected
     //CERTAIN INFORMATION IS ACCESSIBLE TO USERS AT EVENTS.
     //==========================================================================
    public function read_single(){
        //Create query
        $query = 'SELECT
                    p.id,
                    p.first_name,
                    p.last_name,
                    p.email,
                    p.phone,
                    p.website,
                    p.facebook,
                    p.about,
                    p.location,
                    p.image,
                    p.created_date
                FROM
                ' . $this->table . ' p
                WHERE
                    p.id = ?
                LIMIT 0,1';
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //Bind ID
        $stmt->bindParam(1, $this->id);

        //Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Set Properties
        $this->id           = $row['id'];
        $this->first_name   = $row['first_name'];
        $this->last_name    = $row['last_name'];
        $this->email        = $row['email'];
        $this->phone        = $row['phone'];
        $this->website      = $row['website'];
        $this->facebook     = $row['facebook'];
        $this->about        = $row['about'];
        $this->location     = $row['location'];
        $this->image        = $row['image'];
        $this->created_date = $row['created_date'];
    }

    //Create a  DJ, no password protected
    // IMPORTANT! CREATE SYSTEM TO VERITY REAL PERSONS SHOULD
    //BE IMPLEMENTED AT HTML/JS LEVEL
    //==========================================================================
    public function create(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
            SET
              first_name  = :first_name,
              last_name   = :last_name,
              email       = :email,
              pass        = :pass,
              phone       = :phone,
              website     = :website,
              facebook    = :facebook,
              about       = :about,
              location    = :location,
              image       = :image';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name  = htmlspecialchars(strip_tags($this->last_name));
        $this->email      = htmlspecialchars(strip_tags($this->email));
        $this->pass       = htmlspecialchars(strip_tags($this->pass));
        $this->phone      = htmlspecialchars(strip_tags($this->phone));
        $this->website    = htmlspecialchars(strip_tags($this->website));
        $this->facebook   = htmlspecialchars(strip_tags($this->facebook));
        $this->about      = htmlspecialchars(strip_tags($this->about));
        $this->location   = htmlspecialchars(strip_tags($this->location));
        $this->image      = htmlspecialchars(strip_tags($this->image));

        //Bind data
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':pass', $this->pass);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':website', $this->website);
        $stmt->bindParam(':facebook', $this->facebook);
        $stmt->bindParam(':about', $this->about);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':image', $this->image);


        //execute query
        if($stmt->execute()){
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return-false;
    }
    //Update a  DJ, password proected, restricted to single owner
    // IMPORTANT! ADD PASSWORDS RESTRICTIONS AFTER BUILDING LOGIN AND REGISTER
    //==========================================================================
    public function Update(){
        //Create query
        $query = 'UPDATE ' . $this->table . '
            SET
              first_name  = :first_name,
              last_name   = :last_name,
              email       = :email,
              pass        = :pass,
              phone       = :phone,
              website     = :website,
              facebook    = :facebook,
              about       = :about,
              location    = :location,
              image       = :image
            WHERE
                id = :id';

        //Prepare statement

        $stmt = $this->conn->prepare($query);
        //Clean data
        $this->id         = htmlspecialchars(strip_tags($this->id));
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name  = htmlspecialchars(strip_tags($this->last_name));
        $this->email      = htmlspecialchars(strip_tags($this->email));
        $this->pass       = htmlspecialchars(strip_tags($this->pass));
        $this->phone      = htmlspecialchars(strip_tags($this->phone));
        $this->website    = htmlspecialchars(strip_tags($this->website));
        $this->facebook   = htmlspecialchars(strip_tags($this->facebook));
        $this->about      = htmlspecialchars(strip_tags($this->about));
        $this->location   = htmlspecialchars(strip_tags($this->location));
        $this->image      = htmlspecialchars(strip_tags($this->image));

        //Bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':first_name', $this->first_name);
        $stmt->bindParam(':last_name', $this->last_name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':pass', $this->pass);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':website', $this->website);
        $stmt->bindParam(':facebook', $this->facebook);
        $stmt->bindParam(':about', $this->about);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':image', $this->image);

        //execute query
        if($stmt->execute()){
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return-false;
    }


    //Delete a  DJ, password proected, restricted to owner of profile. Intended
    //DJs to exit the system.
    // IMPORTANT! ADD PASSWORDS RESTRICTIONS AFTER BUILDING LOGIN AND REGISTER
    //==========================================================================

    public function delete(){
         // Create query
         $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        // var_dump($query);
         //Prepare statement
         $stmt = $this->conn->prepare($query);

         //Clean data
         $this->id = htmlspecialchars(strip_tags($this->id));

         //Bind data
         $stmt->bindParam(':id', $this->id);

         //execute query
         if($stmt->execute()){
             return true;
         }

         // Print error if something goes wrong
         printf("Error: %s.\n", $stmt->error);

         return-false;
  }
}
