<?php 
    class Article {

        private $connection;
        private $table = "Articles";

        public function __construct() {
            $database = new Database();
            $this->connection = $database->getConnect();
        }

        public function get_excerpt($content, $length=100){
            if(strlen($content) > $length){
                return substr($content, 0, $length) ."...";
            }
        }

        public function get_all(){
            try {
                $query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
                $stmt = $this->connection->prepare($query);
                $stmt->execute();

                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch (Exception $e) {
                echo"". $e->getMessage() ."";
                return null;
            }
        }

        public function get_by_id($id){
            try {
                $query = "SELECT 
                            Articles.title,
                            Articles.id,
                            Articles.image,
                            Articles.created_at,
                            Articles.content,
                            Users.first_name,
                            Users.last_name
                            FROM " . $this->table . 
                            " JOIN Users ON Articles.user_id = Users.id 
                            WHERE Articles.id = :id
                            ";
                            
                // Get the article
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();
                $article = $stmt->fetch(PDO::FETCH_OBJ);

                return $article;
        
            } catch (Exception $e) {
                echo "". $e->getMessage() ."";
                return null;
            }
        }
        

    }
?>