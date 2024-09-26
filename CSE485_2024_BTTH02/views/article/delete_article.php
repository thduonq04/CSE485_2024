<?php 
    require_once('views/layout/header_admin.php');
?>
<body>
        <h5 class="modal-title" id="exam" >Xác nhận xóa</h5>
    
        <div class="modal-body">
            Bạn có chắc chắn muốn xóa tác giả này không?
        </div>
        <?php 
            $id = $_GET["id"];
        ?>
        <div class="modal-footer">
            <a href="index.php?controller=article&action=index" class="btn btn-secondary">Hủy</a>
            <a href="index.php?controller=article&action=deleteArticle&id=<?php echo $id?>" class="btn btn-danger">Xóa</a>
        </div>
        </div>
</body>
    