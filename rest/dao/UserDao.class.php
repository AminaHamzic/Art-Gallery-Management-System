<?php
require_once "BaseDao.class.php";

class UserDao extends BaseDao {

    public function __construct(){
        parent::__construct("user");
    }

 
    
      public function update_user_by_email($email, $user){
        $this->update("user", $email, $user, "email");
      }
    
      public function get_user_by_token($token){
        return $this->query_unique("SELECT * FROM user WHERE token = :token", ["token" => $token]);
      }

      public function login($user){
        $db_user=$this->get_user_by_email($user['email']);
        if(!isset($db_user['id'])) throw new Exception("User doesn't exist", 400);
        if(!isset($db_user['password'])) throw new Exception("User password doesn't exist", 400);
        if($db_user['password'] != $user['password']) throw new Exception("Invalid password", 400);
        
        return $db_user;
        
      }

      public function register($user){
        $query = "INSERT INTO user ($email, $password) VALUES (:email, :password)";
        $stmt= $this->connection->prepare($query);

        $stmt->execute($user);
        $user['id'] = $this->connection->lastInsertId();
        return $user;
      }



      


}
?>