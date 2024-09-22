<?php
    $CatID= $_POST['txtCatID'];
    $CatName= $_POST['txtCatName'];

    include '../conn.php';

    $sql = "INSERT INTO theloai VALUES ('$CatID','$CatName')";
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