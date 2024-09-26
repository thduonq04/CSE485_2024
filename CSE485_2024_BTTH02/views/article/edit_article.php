<?php
require_once 'views/layout/header_article.php';
?>
<main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
                <form action="index.php?controller=article&action=updateArticle" method="post" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ma_bviet">Mã bài viết</span>
                        <input type="text" class="form-control" name="ma_bviet" readonly value="<?php echo $getArticleById->getMaBviet()?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="tieude">Tiêu đề</span>
                        <input class="form-control" type="text" id="tieude" name="tieude" value="<?php echo $getArticleById->getTieude()?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ten_bhat">Tên bài hát</span>
                        <input class="form-control" type="text" id="ten_bhat" name="ten_bhat" value="<?php echo $getArticleById->getTenBhat()?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ma_tloai">Thể loại</span>
                        <select class="form-control" id="ma_tloai" name="ma_tloai" required>
                        <?php 
                        $temp = "selected";
                        foreach ($categorys as $tloai): 
                            
                            ?>
                                <option  value="<?= $tloai->getMaTloai() ?>"
                                 <?php echo $e = $tloai->getMaTloai() === $idCategory ? $temp: "";
                                 
                                  ?>>
                                    <?= $tloai->getTenTloai() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ma_tgia">Tác giả</span>
                        <select class="form-control" id="ma_tgia" name="ma_tgia" required>
                        <?php 
                        $temp = "selected";
                        foreach ($authors as $tgia): 
                            
                            ?>
                                <option  value="<?= $tgia->getMaTgia() ?>"
                                 <?php echo $t = $tgia->getMaTgia() === $idAuthor ? $temp: "";
                                 
                                  ?>>
                                    <?= $tgia->getTenTgia() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="tomtat">Tóm tắt</span>
                        <textarea class="form-control" id="tomtat" name="tomtat" required><?php echo $getArticleById->getTomtat()?></textarea>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="noidung">Nội dung</span>
                        <textarea class="form-control" id="noidung" name="noidung"><?php echo $getArticleById->getNoidung()?></textarea>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="ten_bhat">Hình ảnh</span>
                        <input type="text" class="form-control" name="hinhanh" value="<?php echo $getArticleById->getHinhanh()?>">
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="index.php?controller=article&action=index" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

