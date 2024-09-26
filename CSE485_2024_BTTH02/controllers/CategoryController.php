<?php
include ('services/CategoryService.php');

class CategoryController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $categorys = $categoryService->getAllCategorys();
        // Nhiệm vụ 2: Tương tác với View
        include ('views/category/list_category.php');
    }

    public function addCategory(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $ten_tloai = $_POST['ten_tloai'];
            

        }
        $categorys = $categoryService->addCategory($ten_tloai); 
        // echo "Tương tác với Services/Models from Article";
        // Nhiệm vụ 2: Tương tác với View
        header("Location: ./index.php?controller=category&action=index");
    }

    public function displayCategory(){
        $categoryService = new CategoryService();

        include("views/category/add_category.php");
    }

    public function detailArticle   (){
        $articleService = new ArticleService();
        $id = $_GET['id'];
        $article = $articleService->getArticleByID($id);
        include('views/article/detail.php');

    }

    public function displayUpdateCategory(){
        $CategoryService = new CategoryService();
        $id = $_GET["id"];
        $getCategoryById = $CategoryService->getCategoryByID($id);
        include("views/category/edit_category.php");
    }


    public function updateCategory(){
        $categoryService = new CategoryService();
        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            $ma_tloai = $_POST["ma_tloai"];
            $ten_tloai = $_POST["ten_tloai"];
        }
        $categorys = $categoryService->updateCategory($ma_tloai, $ten_tloai);
        header("Location: ./index.php?controller=category&action=index");
        
    }
    public function displayDeleteCategory(){
        $categoryService = new CategoryService();
        
        include("views/category/delete_category.php");
    }
    public function deleteCategory(){
        $categoryService = new CategoryService();
        $id = $_GET["id"];
        
        $categorys = $categoryService->deleteCategory($id);
        header("Location: ./index.php?controller=category&action=index");
        
    }
}