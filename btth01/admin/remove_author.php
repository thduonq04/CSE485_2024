<?php
require '../connection.php';
$id = $_GET['id'];
// $sql = "DELETE FROM baiviet WHERE ma_tloai = $id";
// $result = mysqli_query($conn, $sql);
$sql = "DELETE FROM tacgia WHERE ma_tgia = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Xóa tác giả thành công!');</script>";
    echo "<script>window.location = 'author.php'</script>";
} else {
    echo "<script>alert('Xóa tác giả thất bại!');</script>";
    echo "<script>window.location = 'author.php'</script>";
}

// header("location: category.php");


?>