<?php 
    class User {
        private $connection;
        private $table = "Users";

        public function __construct(){
            $database = new Database();
            $this->connection = $database->getConnect();
        }

        public function register($firstname, $lastname, $email, $password, $phone, $organization, $location, $birthday, $profile_image){
            try {

                $query = "INSERT INTO " . $this->table ."(username, first_name, last_name, email, password, phone, organization, location, birthday) VALUES(:username, :firstname, :lastname, :email, :password, :phone, :organization, :location, :birthday)";

                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $username = strtolower($firstname . "_" . $lastname);

                $stmt = $this->connection->prepare($query);

                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':organization', $organization);
                $stmt->bindParam(':location', $location);
                $stmt->bindParam(':birthday', $birthday);
                // $stmt->bindParam(':profile_image', $profile_image);

                $result = $stmt->execute();
                return $result ? true : false;

            } catch (Exception $e) {
                echo"". $e->getMessage() ."";
                return false;
            }
        }

        public function getUser($email, $password){
            try {
                $query = "SELECT * FROM " . $this->table ." WHERE email=:email";

                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(":email", $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_OBJ);

                if($user && password_verify($password, $user->password)){
                    unset ($user->password);
                    session_regenerate_id(true); 
                    $_SESSION["logged_in"] = true;
                    $_SESSION ["username"] = $user->username;
                    var_dump($user);
                    return true;
                } else {
                    return false;
                }

            } catch (Exception $e) {
                echo"". $e->getMessage() ."";
                return false;
            }
        }

    }


?>