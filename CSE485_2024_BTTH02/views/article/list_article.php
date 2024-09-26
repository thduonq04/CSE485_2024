<?php
require_once 'views/layout/header_article.php';
?>
    <main class="container mt-5 mb-5">
        <div>
            <div>
                <button type="button" class="btn btn-primary">
                <a href="index.php?controller=article&action=displayArticle" style="text-decoration: none; color:aliceblue">Thêm mới</a>
                </button>
            </div>
            <div>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Ngày viết</th>
                            <th scope="col">Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($articles as $row):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row->getMaBviet() ?></th>
                            <td ><?php echo $row->getTieude() ?></td>
                            <td ><?php echo $row->getTenBhat() ?></td>
                            <td ><?php echo $row->getTomtat() ?></td>
                            <td ><?php echo $row->getNoidung() ?></td>
                            <td ><?php echo $row->getMaTloai() ?></td>
                            <td ><?php echo $row->getMaTgia() ?></td>
                            <td ><?php echo $row->getNgayviet() ?></td>
                            <td ><?php echo $row->getHinhanh() ?></td>
                            <td>
                                <a href="index.php?controller=article&action=displayUpdateArticle&id=<?php echo $row->getMaBviet() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="index.php?controller=article&action=displayDeleteArticle&id=<?php echo $row->getMaBviet()?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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