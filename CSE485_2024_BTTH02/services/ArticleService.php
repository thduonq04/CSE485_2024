<?php
include("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai=theloai.ma_tloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles,$article);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }
    public function getArticleByID($articleID){
        $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

       $sql = "select ma_bviet, tieude, ten_bhat, ten_tloai, tomtat, noidung, ten_tgia, ngayviet, hinhanh from baiviet join theloai on baiviet.ma_tloai = theloai.ma_tloai join tacgia on baiviet.ma_tgia = tacgia.ma_tgia where baiviet.ma_bviet = ".$articleID;
       $stmt = $conn->query($sql);

       $row = $stmt->fetch();
       $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
        return $article;
    }
}
