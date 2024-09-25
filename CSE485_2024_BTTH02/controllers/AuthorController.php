<?php
include ('services/AuthorService.php');

class AuthorController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthors();
        // Nhiệm vụ 2: Tương tác với View
        include ('views/author/list_author.php');
    }

    public function addAuthor(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $ten_tgia = $_POST['ten_tgia'];
            

        }
        $authors = $authorService->addAuthor($ten_tgia); 
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        header("Location: ./index.php?controller=author&action=index");
    }

    public function displayAuthor(){
        $authorService = new AuthorService();

        include("views/author/add_author.php");
    }

    public function detailArticle   (){
        $articleService = new ArticleService();
        $id = $_GET['id'];
        $article = $articleService->getArticleByID($id);
        include('views/article/detail.php');

    }

    public function displayUpdateAuthor(){
        $authorService = new AuthorService();
        $id = $_GET["id"];
        $getAuthorById = $authorService->getAuthorByID($id);
        include("views/author/edit_author.php");
    }


    public function updateAuthor(){
        $authorService = new AuthorService();
        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            $ma_tgia = $_POST["ma_tgia"];
            $ten_tgia = $_POST["ten_tgia"];
        }
        $authors = $authorService->updateAuthor($ma_tgia, $ten_tgia);
        header("Location: ./index.php?controller=author&action=index");
        
    }
    public function displayDeleteAuthor(){
        $authorService = new AuthorService();
        
        include("views/author/delete_author.php");
    }
    public function deleteAuthor(){
        $authorService = new AuthorService();
        $id = $_GET["id"];
        
        $authors = $authorService->deleteAuthor($id);
        header("Location: ./index.php?controller=author&action=index");
        
    }
}