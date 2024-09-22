<?php
    
    $CatName= $_POST['txtCatName'];

    include '../connection.php';

    $sql = "INSERT INTO theloai (ten_tloai,SLBaiViet) VALUES ('$CatName', 0)";
    echo $sql;
    $result = mysqli_query($conn, $sql);


    if($result>0){
        header("Location:category.php");
    }
    else{
        echo "Lỗi!";
    }

    mysqli_close($conn);
?>