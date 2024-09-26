<?php
include("configs/DBConnection.php");
include("models/admin.php");

class AdminService{

    public function getAll(){

        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $result = [];

        // Đếm số lượng thể loại
        $sql_theloai = "SELECT COUNT(ma_tloai) AS count_theloai FROM theloai";
        $result_theloai = $conn->query($sql_theloai);
        $result_theloai = $result_theloai->fetch();
        array_push($result, $result_theloai);


        // Đếm số lượng tác giả
        $sql_tacgia = "SELECT COUNT(ma_tgia) AS count_tacgia FROM tacgia";
        $result_tacgia = $conn->query($sql_tacgia);
        $result_tacgia = $result_tacgia->fetch();
        array_push($result, $result_tacgia);

        // Đếm số lượng bài viết
        $sql_baiviet = "SELECT COUNT(ma_bviet) AS count_baiviet FROM baiviet";
        $result_baiviet = $conn->query($sql_baiviet);
        $result_baiviet = $result_baiviet->fetch();
        array_push($result, $result_baiviet);

        // // Đếm số lượng người dùng (Giả sử bạn có bảng 'users')
        $sql_users = "SELECT COUNT(username) AS count_users FROM users";
        $result_users = $conn->query($sql_users);
        $result_users = $result_users->fetch();
        array_push($result, $result_users);
    
        $admin = new Admin($result_theloai["count_theloai"], $result_tacgia["count_tacgia"], $result_baiviet["count_baiviet"], $result_users["count_users"]);

    return $admin;

    }
}

