<?php
class Music{
    // DB stuff
    private $conn;
    private $table = 'music';

    //event properties
    public $id;
    public $id_event;
    public $id_song;
    public $rating;
    public $event_name;
    public $song_name;
    public $artist_name;

    //constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }
    // get selected music for certain event,
    //no password required ,no acess restrictions
    //==========================================================================
    public function read(){
        //Create query
        $query = 'SELECT
                    m.id,
                    m.id_event,
                    m.id_song,
                    s.name as song_name,
                    s.artist as artist_name,
                    m.rating
                FROM '
                 . $this->table . ' m
                 LEFT JOIN
                    songs s ON m.id_song = s.id
                 WHERE
                 m.id_event =' . $this->event;

        //Prepare statement
        $stmt = $this->conn->prepare($query);
        //Execute query
        $stmt->execute();
        return $stmt;
    }
    // Select music for certain event,
    //password required ,acess restrictions
    //==========================================================================
    public function create(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
          SET
            id_event  = :id_event,
            id_song  = :id_song,
            rating     = :rating';
          //Prepare statement
          $stmt = $this->conn->prepare($query);

          //Clean data
          $this->id_event  = htmlspecialchars(strip_tags($this->id_event));
          $this->$id_song  = htmlspecialchars(strip_tags($this->id_song));
          $this->rating    = htmlspecialchars(strip_tags($this->rating));

          //Bind data
          $stmt->bindParam(':id_event', $this->id_event);
          $stmt->bindParam(':id_song', $this->id_song);
          $stmt->bindParam(':rating', $this->rating);

          //execute query
          if($stmt->execute()){
              return true;
          }
          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);
          return-false;
  }
  // Rank a song selected for an event,
  //no password required ,restricted by event
  //==========================================================================
  public function rank(){
      //Create query
      $query = 'UPDATE ' . $this->table . '
        SET
          rating   = rating + :rating
        WHERE
          id = :id';
        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->id  = htmlspecialchars(strip_tags($this->id));
        $this->rating    = htmlspecialchars(strip_tags($this->rating));

        //Bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':rating', $this->rating);

        //execute query
        if($stmt->execute()){
            return true;
        }
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return-false;
      }
      // Delete a song selected for an event,
      //Password required ,restricted access
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
   // Delete all songs selected for an event,
   //Password required ,restricted access
   //==========================================================================
   public function delete_all(){
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE id_event = :id_event';
     // var_dump($query);
      //Prepare statement
      $stmt = $this->conn->prepare($query);

      //Clean data
      $this->id = htmlspecialchars(strip_tags($this->id_event));

      //Bind data
      $stmt->bindParam(':id_event', $this->id_event);

      //execute query
      if($stmt->execute()){
          return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return-false;
    }
}
