
<?php
    include_once 'views/layout/header_admin.php';
?>
   

    <main class="container mt-5 mb-5">
        <div>
            <div>
                <button type="button" class="btn btn-primary">
                    <a href="index.php?controller=author&action=displayAuthor" style="text-decoration: none; color:aliceblue">Thêm mới</a>
                </button>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã tác giả</th>
                            <th>Tên tác giả</th>
                            <th>Hình ảnh tác giả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                 
                        foreach($authors as $row){

                        ?>
                                <tr>
                                    <th scope="row"><?php echo $row->getMaTgia() ?></th>
                                    <td><?php echo $row->getTenTgia() ?></td>
                                    <td><?php echo $row->getHinhTgia() ?></td>
                                    <td>
                                        <a href="index.php?controller=author&action=displayUpdateAuthor&id=<?php echo $row->getMaTgia() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td>
                                        <a href="index.php?controller=author&action=displayDeleteAuthor&id=<?php echo $row->getMaTgia()?>"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>