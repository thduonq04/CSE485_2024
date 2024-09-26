<?php
$controller = $_GET["controller"];
$baiviet ="";
$tacgia = "";
$theloai = "";
$trangchu = "";
if ($controller === "article"){
    $baiviet = "active fw-bold";
}
elseif ($controller === "author"){
    $tacgia = "active fw-bold";
}
elseif ($controller === "category"){
    $theloai = "active fw-bold";
}
else{
    $trangchu = "active fw-bold";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $trangchu ?>" aria-current="page" href="./index.php?controller=admin&action=index">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $theloai ?> " href="./index.php?controller=category&action=index">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $tacgia ?>" href="./index.php?controller=author&action=index">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $baiviet ?>" href="./index.php?controller=article&action=index">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>