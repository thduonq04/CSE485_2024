
<?php 
    require_once('views/layout/header.php');
?>
    <main class="container mt-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
      
                <div class="row mb-5">
                

                 
                    <div class="col-sm-4">
                        <img src="assets/<?= $article->getHinhanh() ?>" class="img-fluid" alt="...">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="card-title mb-2">
                            <a href="" class="text-decoration-none"><?= $article->getTieude()  ?></a>
                        </h5>
                        <p class="card-text"><span class=" fw-bold">Bài hát: </span><?= $article->getTenBhat()  ?></p>
                        <p class="card-text"><span class=" fw-bold">Thể loại: </span><?= $article->getMaTloai()  ?></p>
                        <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?= $article->getTomtat()  ?></p>
                        <p class="card-text"><span class=" fw-bold">Nội dung: </span><?= $article->getNoidung()  ?></p>
                        <p class="card-text"><span class=" fw-bold">Tác giả: </span><?= $article->getMaTgia()  ?></p>

                    </div>
                    
                        
                            
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>