<?php
include ('services/ArticleService.php');
include ('services/CategoryService.php');
class ArticleController{

    public function add(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";

        // Nhiệm vụ 2: Tương tác với View
        include("views/article/add_article.php");
    }

    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        // echo "Tương tác với Services/Models from Article";
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/list_article.php");
    }

    public function detailArticle (){
        $articleService = new ArticleService();
        $id = $_GET['id'];
        $article = $articleService->getArticleByID($id);
        include('views/article/detail.php');
    }

    public function addArticle(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new ArticleService();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $ma_tloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $ma_tgia = $_POST['ma_tgia'];
            $ngayviet = date('Y-m-d H:i:s');
            
            if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == UPLOAD_ERR_OK) {
                // Đường dẫn lưu trữ ảnh
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
                // Kiểm tra file có phải là ảnh không
                $check = getimagesize($_FILES["hinhanh"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "<script>alert('File không phải là ảnh.');</script>";
                    $uploadOk = 0;
                }
        
                // Kiểm tra kích thước file (giới hạn 5MB)
                if ($_FILES["hinhanh"]["size"] > 5000000) {
                    echo "<script>alert('File quá lớn. Giới hạn là 5MB.');</script>";
                    $uploadOk = 0;
                }
        
                // Chỉ cho phép một số định dạng ảnh
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "<script>alert('Chỉ chấp nhận định dạng JPG, JPEG, PNG & GIF.');</script>";
                    $uploadOk = 0;
                }
        
                // Nếu mọi điều kiện đều đúng, tiến hành upload ảnh
                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                        echo "File ". htmlspecialchars( basename( $_FILES["hinhanh"]["name"])). " đã được tải lên.";
                        // Lưu tên file ảnh vào cơ sở dữ liệu
                        $hinhanh = basename($_FILES["hinhanh"]["name"]);
                    } else {
                        echo "Có lỗi khi tải file.";
                        $hinhanh = "";  // Nếu xảy ra lỗi, không lưu ảnh
                    }
                } else {
                    $hinhanh = "";  // Nếu không tải được file, không lưu ảnh
                }
                } else {
                    //echo "Không có hình ảnh được tải lên.";
                    $hinhanh = "";  // Không có file ảnh được tải lên
                }
        $authors = $authorService->addArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh); 
        $categoryService= new CategoryService();
        
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        header("Location: ./index.php?controller=article&action=index");
        }
    }

    public function displayArticle(){
        $authorService = new ArticleService();

        include("views/article/add_article.php");
    }

}