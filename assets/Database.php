<?php
    class Database{
        // DB Params
        private $host = 'db_host';
        private $db_name = 'db_name';
        private $username = 'db_user';
        private $password = 'db_password';
        private $charset = 'utf8';
        private $conn;
        public $saltPrefix = 'salting_prefix';
        public $saltSufix = '=salting_sufix';

        //DB connect
        public function connect(){
            $this->conn = null;
            try{
                $this->conn = new PDO(
                  'mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';charset=' . $this->charset,
                   $this->username,
                   $this->password
                   // array(
                   //
                   // )
                );
                $this->conn->setAttribute(
                  PDO::ATTR_ERRMODE,
                  PDO::ERRMODE_EXCEPTION
                );
            }catch(PDOException $e){
                echo 'Connection Error' . $e->getMessage();
            }
            return $this->conn;
        }
    }
