<?php
include ("services/UserService.php");

class UserController{
    public function login(){
        $userService = new UserService();

        include("views/login/login.php");
    }

    public function processLogin(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $username=$_POST['username'];
            $password=$_POST['password'];
        //Truy vấn theo username

            $userService = new UserService();
            $user = $userService->getUserByID($username);
            
            //So sánh mật khẩu (đã được mã hóa)
            if($password==$user->getPassword()){
                echo "<script>alert('Đăng nhập thành công')</script>";
                header("Location:./index.php?controller=admin&action=index"); //cái này phải đợi nhỏ tt làm xong mới cóa, thêm tạm nhé
                //header("Location: ./index.php?controller=category&action=index");

            }
            else {
                // header('Location: ./index.php?controller=user&action=login');
                echo "<script>alert('Sai mật khẩu')</script>";
                echo "<script>window.location='./index.php?controller=user&action=login'</script>";

            }
        }
        
}}