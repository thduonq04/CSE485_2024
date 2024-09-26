<?php
include ('services/ArticleService.php');
include ('services/CategoryService.php');
include ('services/AuthorService.php');
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
        $articleService = new ArticleService();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $ma_tloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $ma_tgia = $_POST['ma_tgia'];
            $ngayviet = date('Y-m-d H:i:s');
            $hinhanh = $_POST['hinhanh'];
        $article = $articleService->addArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh); 
        
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        //header("Location: ./index.php?controller=article&action=index");\
        echo "<script>window.location= './index.php?controller=article&action=index'</script>";
        }
    }

    public function displayArticle(){
        $articleService = new ArticleService();
        $categoryService= new CategoryService();
        $categorys = $categoryService->getAllCategorys();
        $authorService= new AuthorService;
        $authors = $authorService->getAllAuthors();
        include("views/article/add_article.php");
    }

    public function updateArticle(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articleService = new ArticleService();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_bviet = $_POST['ma_bviet'];
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $ma_tloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $ma_tgia = $_POST['ma_tgia'];
            $ngayviet = date('Y-m-d H:i:s');
            $hinhanh = $_POST['hinhanh'];
        $article = $articleService->updateArticle($ma_bviet,$tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh); 
        
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        //header("Location: ./index.php?controller=article&action=index");\
        echo "<script>window.location= './index.php?controller=article&action=index'</script>";
        }
    }

    public function displayUpdateArticle(){
        $articleService = new ArticleService();
        $id = $_GET["id"];
        $getArticleById = $articleService->getArticleByID($id);
        $categoryService= new CategoryService();
        $categorys = $categoryService->getAllCategorys();
        $authorService= new AuthorService;
        $authors = $authorService->getAllAuthors();
        $idAuthor = $authorService->getIdByNameAuthor($getArticleById->getMaTgia());
        $idCategory = $categoryService->getIdByNameCategory($getArticleById->getMaTloai());

        include("views/article/edit_article.php");
    }
    public function deleteArticle(){
        $articleService = new ArticleService();
        $id = $_GET["id"];
        
        $article = $articleService->deleteArticle($id);
        header("Location: ./index.php?controller=article&action=index");
        
    }
    public function displayDeleteArticle(){
        $articleService = new ArticleService();
        include("views/article/delete_article.php");
    }
}