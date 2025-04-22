<?php 

    class Database {
        private $host=DB_HOST;
        private $user=DB_USER;
        private $password=DB_PASS;
        private $database_name=DB_NAME;

        public $connection;

        public function getConnect() {
            try {
                $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database_name", $this->user, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->connection;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                return null;
            }
        }
        

    }

?>