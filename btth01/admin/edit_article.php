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
    <?php
    include '../connection.php';

    $ma_bviet = $_GET['id'];
    $sql = "SELECT * FROM baiviet WHERE ma_bviet = $ma_bviet";
    $result = $conn->query($sql);
    $article = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ma_bviet = $_POST['ma_bviet'];
        $tieude = $_POST['tieude'];
        $ten_bhat = $_POST['ten_bhat'];
        $ma_tloai = $_POST['ma_tloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $ma_tgia = $_POST['ma_tgia'];

        // Kiểm tra xem người dùng có tải lên hình ảnh mới không
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

            // Upload ảnh mới nếu hợp lệ
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                    //echo "File ". htmlspecialchars( basename( $_FILES["hinhanh"]["name"])). " đã được tải lên.";
                    // Cập nhật tên file hình ảnh mới
                    $hinhanh = basename($_FILES["hinhanh"]["name"]);
                } else {
                    echo "<script>alert('Có lỗi khi tải file!');</script>";
                    $hinhanh = $article['hinhanh']; // Giữ nguyên hình ảnh cũ nếu không upload được
                }
            } else {
                $hinhanh = $article['hinhanh'];  // Giữ nguyên hình ảnh cũ nếu có lỗi
            }
        } else {
            // Không có hình ảnh mới được tải lên, giữ nguyên hình ảnh cũ
            $hinhanh = $article['hinhanh'];
        }
        
        $sql = "UPDATE baiviet
                SET tieude = '$tieude', ten_bhat = '$ten_bhat', ma_tloai = '$ma_tloai',
                    tomtat = '$tomtat', noidung = '$noidung', ma_tgia = '$ma_tgia', hinhanh='$hinhanh'
                WHERE ma_bviet = $ma_bviet";

        if ($conn->query($sql) === TRUE) {
            //chuyển hướng sau khi thông báo đã được hiển thị
            echo "<script>alert('Cập nhật bài viết thành công!');
                window.location.href = 'edit_article.php?id=$ma_bviet'; 
                </script>";
            
        } else {
            echo "<script>alert('Cập nhật bài viết không thành công!');</script>" . $conn->error;
        }
    }

    // Lấy thể loại và tác giả cho form sửa
    $theloai = $conn->query("SELECT * FROM theloai");
    $tacgia = $conn->query("SELECT * FROM tacgia");
    ?>

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
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ma_bviet">Mã bài viết</span>
                        <input class="form-control" type="text" id="ma_bviet" name="ma_bviet" value="<?= $article['ma_bviet']; ?>" readonly>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="tieude">Tiêu đề</span>
                        <input class="form-control" type="text" id="tieude" name="tieude" value="<?= $article['tieude']; ?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ten_bhat">Tên bài hát</span>
                        <input class="form-control" type="text" id="ten_bhat" name="ten_bhat" value="<?= $article['ten_bhat']; ?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ma_tloai">Thể loại</span>
                        <select class="form-control " id="ma_tloai" name="ma_tloai" required>
                            <?php while($row = $theloai->fetch_assoc()): ?>
                                <option selected value="<?= $row['ma_tloai']; ?>" <?= ($row['ma_tloai'] == $article['ma_tloai']) ? 'selected' : ''; ?>>
                                    <?= $row['ten_tloai']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ma_tgia">Tác giả</span>
                        <select class="form-control" id="ma_tgia" name="ma_tgia" required>
                            <?php while($row = $tacgia->fetch_assoc()): ?>
                                <option selected value="<?= $row['ma_tgia']; ?>" <?= ($row['ma_tgia'] == $article['ma_tgia']) ? 'selected' : ''; ?>>
                                    <?= $row['ten_tgia']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="tomtat">Tóm tắt</span>
                        <textarea class="form-control" id="tomtat" name="tomtat" required><?= $article['tomtat']; ?></textarea>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="noidung">Nội dung</span>
                        <textarea class="form-control" id="noidung" name="noidung"><?= $article['noidung']; ?></textarea>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ten_bhat">Hình ảnh</span>
                        <input type="text" class="form-control" name="hinhanh" value="<?= $article['noidung']; ?>">
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php $conn->close(); ?>
</body>
</html>

