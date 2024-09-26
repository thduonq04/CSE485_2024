

<?php
    require_once 'views/layout/header_admin.php';
?>
    
    <main class="container mt-5 mb-5">
        <div>
            <div>
                <button type="button" class="btn btn-primary">
                    <a href="index.php?controller=category&action=displayCategory" style="text-decoration: none; color:aliceblue">Thêm mới</a>
                </button>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã thể loại</th>
                            <th>Tên thể loại</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                 
                        foreach($categorys as $row){

                        ?>
                                <tr>
                                    <th scope="row"><?php echo $row->getMaTloai() ?></th>
                                    <td><?php echo $row->getTenTloai() ?></td>
                                    <td>
                                        <a href="index.php?controller=category&action=displayUpdateCategory&id=<?php echo $row->getMaTloai() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td>
                                        <a onclick = "return confirm('Bạn có chắc chắn muốn xóa không?');" href="index.php?controller=category&action=displayDeleteCategory&id=<?php echo $row->getMaTloai()?>"><i class="fa-solid fa-trash"></i></a>
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