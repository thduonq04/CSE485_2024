<?php
include("configs/DBConnection.php");
include("models/Category.php");
class CategoryService{
    public function getAllCategorys(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM theloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $categorys = [];
        while($row = $stmt->fetch()){
            $category = new Category($row['ma_tloai'], $row['ten_tloai']);
            array_push($categorys,$category);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $categorys;
    }
    public function getCategoryByID($categoryID){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "select * from theloai where theloai.ma_tloai = ".$categoryID;
        $stmt = $conn->query($sql);

        $row = $stmt->fetch();
        $category = new Category($row['ma_tloai'], $row['ten_tloai']);

        return $category;
    }
    public function addCategory($ten_tloai){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "insert into theloai (ten_tloai) values ('".$ten_tloai."')";
        $stmt = $conn->query($sql);

        if(!$stmt){
            echo "<script>alert('Thêm thể loại thất bại');</script>";
        }
        else{
            echo "<script>alert('Thêm thể loại thành công');</script>";
        }
    }
    public function updateCategory($ma_tloai, $ten_tloai){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "update theloai set ten_tloai = '".$ten_tloai."' where ma_tloai = ".$ma_tloai;
        $stmt = $conn->query($sql);

        if(!$stmt){
            echo "<script>alert('Chỉnh sửa thể loại thất bại');</script>";
        }
        else{
            echo "<script>alert('Chỉnh sửa thể loại thành công');</script>";
        }
    }
    public function deleteCategory($ma_tloai){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "delete from theloai where ma_tloai = ".$ma_tloai;
        $stmt = $conn->query($sql);

        if(!$stmt){
            echo "<script>alert('Xóa thể loại thất bại');</script>";
        }
        else{
            echo "<script>alert('Xóa thể loại thành công');</script>";
        }
    }
}