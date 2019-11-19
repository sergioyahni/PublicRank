<?php
class Song{
    // DB stuff
    private $conn;
    private $table = 'songs';

    //event properties
    public $id;
    public $id_dj;
    public $name;
    public $genere;
    public $url;
    public $artist;

    //constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }
    // get all songs of a certain DJ,
    //password required ,acess restrictions
    //==========================================================================
    public function read(){
        //Create query
        $query = 'SELECT
                    p.id,
                    p.id_dj,
                    p.name,
                    p.genere,
                    p.url,
                    p.artist
                FROM '
                 . $this->table . ' p
               WHERE
                  p.id_dj = ' . $this->dj;
        //Prepare statement
        $stmt = $this->conn->prepare($query);
        //Execute query
        $stmt->execute();
        return $stmt;
    }
    // get a single song
    //password required ,acess restrictions
    //==========================================================================
    public function read_single(){
        //Create query
        $query = 'SELECT
                    p.id,
                    p.id_dj,
                    p.name,
                    p.genere,
                    p.url,
                    p.artist
                FROM '
                 . $this->table . ' p
               WHERE
                  p.id = ' . $this->id;

        //Prepare statement
        $stmt = $this->conn->prepare($query);
        //Execute query
        $stmt->execute();
        return $stmt;
    }
    //Create a song protected.
    // only registered DJs can create events
    //==========================================================================
    public function create(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
          SET
            id_dj   = :id_dj,
            name    = :name,
            genere  = :genere,
            url     = :url,
            artist  = :artist';

          //Prepare statement
          $stmt = $this->conn->prepare($query);

          //Clean data
          $this->id_dj  = htmlspecialchars(strip_tags($this->id_dj));
          $this->name   = htmlspecialchars(strip_tags($this->name));
          $this->genere = htmlspecialchars(strip_tags($this->genere));
          $this->url    = htmlspecialchars(strip_tags($this->url));
          $this->artist = htmlspecialchars(strip_tags($this->artist));

          //Bind data
          $stmt->bindParam(':id_dj', $this->id_dj);
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':genere', $this->genere);
          $stmt->bindParam(':url', $this->url);
          $stmt->bindParam(':artist', $this->artist);

          //execute query
          if($stmt->execute()){
              return true;
          }
          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);
          return-false;
  }
  //Update a song protected.
  // only registered DJs can create events
  //==========================================================================
  public function update(){
      //Create query
      $query = 'UPDATE ' . $this->table . '
        SET
          id_dj   = :id_dj,
          name    = :name,
          genere  = :genere,
          url     = :url,
          artist  = :artist
        WHERE
          id = :id';;

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->id     = htmlspecialchars(strip_tags($this->id));
        $this->id_dj  = htmlspecialchars(strip_tags($this->id_dj));
        $this->name   = htmlspecialchars(strip_tags($this->name));
        $this->genere = htmlspecialchars(strip_tags($this->genere));
        $this->url    = htmlspecialchars(strip_tags($this->url));
        $this->artist = htmlspecialchars(strip_tags($this->artist));

        //Bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':id_dj', $this->id_dj);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':genere', $this->genere);
        $stmt->bindParam(':url', $this->url);
        $stmt->bindParam(':artist', $this->artist);

        //execute query
        if($stmt->execute()){
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return-false;
      }
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
