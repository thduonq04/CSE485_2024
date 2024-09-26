<?php
    include_once 'views/layout/header_admin.php';
?>
    <body>
        <div class="container  ">
        <h5 class="modal-title" id="exam" >Xác nhận xóa</h5>
    
        <div class="modal-body">
            Bạn có chắc chắn muốn xóa tác giả này không?
        </div>
        <?php 
            $id = $_GET["id"];
        ?>
        <div class="modal-footer">
            <a href="index.php?controller=author&action=index" class="btn btn-secondary">Hủy</a>
            <a href="index.php?controller=author&action=deleteAuthor&id=<?php echo $id?>" class="btn btn-danger">Xóa</a>
        </div>
        </div>
        </div>
    </body>
    