<?php
include("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM baiviet JOIN theloai ON baiviet.ma_tloai=theloai.ma_tloai Join tacgia on baiviet.ma_tgia=tacgia.ma_tgia
        ORDER BY ma_bviet";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles,$article);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }
    public function getArticleByID($articleID){
        $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

       $sql = "SELECT ma_bviet, tieude, ten_bhat, ten_tloai, tomtat, noidung, ten_tgia, ngayviet, hinhanh from baiviet join theloai on baiviet.ma_tloai = theloai.ma_tloai join tacgia on baiviet.ma_tgia = tacgia.ma_tgia where baiviet.ma_bviet = ".$articleID;
       $stmt = $conn->query($sql);

       $row = $stmt->fetch();
       $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
        return $article;
    }

    public function addArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh)
                    VALUES ('$tieude', '$ten_bhat', '$ma_tloai', '$tomtat', '$noidung', '$ma_tgia', '$ngayviet', '$hinhanh')";
        $stmt = $conn->query($sql);

        if(!$stmt){
            echo "<script>alert('Thêm thất bại');</script>";
        }
        else{
            echo "<script>alert('Thêm thành công');</script>";
        }
    }
    public function updateArticle($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "UPDATE baiviet
                SET tieude = '$tieude', ten_bhat = '$ten_bhat', ma_tloai = '$ma_tloai',
                    tomtat = '$tomtat', noidung = '$noidung', ma_tgia = '$ma_tgia', hinhanh='$hinhanh'
                WHERE ma_bviet = $ma_bviet";

            $stmt = $conn->query($sql);

            if(!$stmt){
                echo "<script>alert('Sửa thất bại');</script>";
            }
            else{
                echo "<script>alert('Sửa thành công');</script>";
            }            
        }
        public function deleteArticle($ma_bviet){
            $dbConn = new DBConnection();
            $conn = $dbConn->getConnection();
    
            $sql = "DELETE from baiviet where ma_bviet = ".$ma_bviet;
            $stmt = $conn->query($sql);
    
            if(!$stmt){
                echo "<script>alert('Xóa thất bại');</script>";
            }
            else{
                echo "<script>alert('Xóa thành công');</script>";
            }
        }
    
    }
