<?php
    if(is_array($dm)&&(count($dm)>0)){
        extract($dm);
    }
?>
<div class="main-content">
                <h3 class="title-page">
                    Cập nhật danh mục
                </h3>
                
                <form class="addPro" action="index.php?pg=updatedanhmuc" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Mã danh mục:</label>
                        <input type="text" class="form-control" name="id" value="<?php echo $id?>" id="name" placeholder="Nhập tên sản phẩm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name?>" id="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="name">STT:</label>
                        <input type="text" class="form-control" name="stt" value="<?php echo $stt?>" id="name" placeholder="Nhập số thứ tự">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="updatedanhmuc" class="btn btn-primary">Sửa danh mục</button>
                    </div>
                </form>
            </div>

            <script>
                new DataTable('#example');
            </script>