<?php
include("configs/DBConnection.php");
include("models/User.php");
class UserService{
    
    public function getUserByID($_username){
        $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

       $sql = "select * from users where users.username = '".$_username."'";
       $stmt = $conn->query($sql);
       if(!$stmt){
        echo "<script>alert('Sai mật khẩu')</script>";
        
        
       }
       else{
        $row = $stmt->fetch();
        $user = new User($row['id'], $row['username'], $row['password']);
       }
       return $user;
       
    }
    
}
