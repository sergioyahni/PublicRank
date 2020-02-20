<?php
class Event{
    // DB stuff
    private $conn;
    private $table = 'events';

    //event properties
    public $id;
    public $id_dj;
    public $dj_fname;
    public $dj_lname;
    public $name;
    public $type;
    public $permit;
    public $participants;
    public $event_date;
    public $event_start;
    public $event_end;

    //constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }
    // get events of certain DJ
    public function read(){
        //Create query
        $query = 'SELECT
                    p.id,
                    p.id_dj,
                    d.first_name as dj_fname,
                    d.last_name as dj_lname,
                    p.name,
                    p.type,
                    p.permit,
                    p.participants,
                    p.event_date,
                    p.event_start,
                    p.event_end
                FROM '
                 . $this->table . ' p
                LEFT JOIN
                  dj d ON p.id_dj = d.id
               WHERE
                  p.id_dj = ' . $this->dj;

        //Prepare statement
        $stmt = $this->conn->prepare($query);
        //Execute query
        $stmt->execute();
        return $stmt;
    }

    // get a single event
    public function read_single(){
        //Create query
        $query = 'SELECT
                    p.id,
                    p.id_dj,
                    d.first_name as dj_fname,
                    d.last_name as dj_lname,
                    p.name,
                    p.type,
                    p.permit,
                    p.participants,
                    p.event_date,
                    p.event_start,
                    p.event_end
                FROM '
                 . $this->table . ' p
                LEFT JOIN
                  dj d ON p.id_dj = d.id
               WHERE
                  p.id = ' . $this->id;

        //Prepare statement
        $stmt = $this->conn->prepare($query);
        //Bind dj id
        //$stmt->bindParam(':id_dj', $this->id_dj);

        //Execute query
        $stmt->execute();
        return $stmt;
    }
    //Create an event, protected.
    public function create(){
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
          SET
            id_dj             = :id_dj,
            name              = :name,
            type              = :type,
            permit            = :permit,
            participants      = :participants,
            event_date        = :event_date,
            event_start       = :event_start,
            event_end         = :event_end';

          //Prepare statement
          $stmt = $this->conn->prepare($query);

          //Clean data
          $this->id_dj        = htmlspecialchars(strip_tags($this->id_dj));
          $this->name         = htmlspecialchars(strip_tags($this->name));
          $this->type         = htmlspecialchars(strip_tags($this->type));
          $this->permit       = htmlspecialchars(strip_tags($this->permit));
          $this->participants = htmlspecialchars(strip_tags($this->participants));
          $this->event_date   = htmlspecialchars(strip_tags($this->event_date));
          $this->event_start  = htmlspecialchars(strip_tags($this->event_start));
          $this->event_end    = htmlspecialchars(strip_tags($this->event_end));

          //Bind data
          $stmt->bindParam(':id_dj', $this->id_dj);
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':type', $this->type);
          $stmt->bindParam(':permit', $this->permit);
          $stmt->bindParam(':participants', $this->participants);
          $stmt->bindParam(':event_date', $this->event_date);
          $stmt->bindParam(':event_start', $this->event_start);
          $stmt->bindParam(':event_end', $this->event_end);

          //execute query
          if($stmt->execute()){
              return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);
          return-false;
        }
        public function update(){
            //Create query
            $query = 'UPDATE ' . $this->table . '
              SET
                id_dj             = :id_dj,
                name              = :name,
                type              = :type,
                permit            = :permit,
                participants      = :participants,
                event_date        = :event_date,
                event_start       = :event_start,
                event_end         = :event_end
              WHERE
                  id = :id';
              //Prepare statement
              $stmt = $this->conn->prepare($query);

              //Clean data
              $this->id           = htmlspecialchars(strip_tags($this->id));
              $this->id_dj        = htmlspecialchars(strip_tags($this->id_dj));
              $this->name         = htmlspecialchars(strip_tags($this->name));
              $this->type         = htmlspecialchars(strip_tags($this->type));
              $this->permit       = htmlspecialchars(strip_tags($this->permit));
              $this->participants = htmlspecialchars(strip_tags($this->participants));
              $this->event_date   = htmlspecialchars(strip_tags($this->event_date));
              $this->event_start  = htmlspecialchars(strip_tags($this->event_start));
              $this->event_end    = htmlspecialchars(strip_tags($this->event_end));

              //Bind data
              $stmt->bindParam(':id', $this->id);
              $stmt->bindParam(':id_dj', $this->id_dj);
              $stmt->bindParam(':name', $this->name);
              $stmt->bindParam(':type', $this->type);
              $stmt->bindParam(':permit', $this->permit);
              $stmt->bindParam(':participants', $this->participants);
              $stmt->bindParam(':event_date', $this->event_date);
              $stmt->bindParam(':event_start', $this->event_start);
              $stmt->bindParam(':event_end', $this->event_end);

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
