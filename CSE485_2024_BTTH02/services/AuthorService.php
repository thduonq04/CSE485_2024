<?php
include_once("configs/DBConnection.php");
include_once("models/Author.php");
class AuthorService{
    public function getAllAuthors(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM tacgia";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $authors = [];
        while($row = $stmt->fetch()){
            $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
            array_push($authors,$author);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $authors;
    }
    public function getAuthorByID($authorID){
        $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

       $sql = "select * from tacgia where tacgia.ma_tgia = ".$authorID;
       $stmt = $conn->query($sql);

       $row = $stmt->fetch();
       $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
        return $author;
    }
    public function addAuthor($ten_tgia){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "insert into tacgia (ten_tgia) values ('".$ten_tgia."')";
        $stmt = $conn->query($sql);

        if(!$stmt){
            echo "<script>alert('Thêm tác giả thất bại');</script>";
        }
        else{
            echo "<script>alert('Thêm tác giả thành công');</script>";
        }
    }
    public function updateAuthor($ma_tgia, $ten_tgia){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "update tacgia set ten_tgia = '".$ten_tgia."' where ma_tgia = ".$ma_tgia;
        $stmt = $conn->query($sql);

        if(!$stmt){
            echo "<script>alert('Chỉnh sửa tác giả thất bại');</script>";
        }
        else{
            echo "<script>alert('Chỉnh sửa tác giả thành công');</script>";
        }
    }
    public function deleteAuthor($ma_tgia){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "delete from tacgia where ma_tgia = ".$ma_tgia;
        $stmt = $conn->query($sql);

        if(!$stmt){
            echo "<script>alert('Xóa tác giả thất bại');</script>";
        }
        else{
            echo "<script>alert('Xóa tác giả thành công');</script>";
        }
    }
    public function getIdByNameAuthor($authorName){
        $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

       $sql = "SELECT ma_tgia from tacgia where tacgia.ten_tgia = '".$authorName."'";
       $stmt = $conn->query($sql);

       $row = $stmt->fetch();
       $author = $row['ma_tgia'];
       return $author;
    }
}
