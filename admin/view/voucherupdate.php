<?php
    if(is_array($vc)){
        extract($vc);
    }
?>
<div class="main-content">
                <h3 class="title-page">
                    Sửa voucher
                </h3>
                
                <form class="addPro" action="index.php?pg=updatevoucher" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Mã voucher:</label>
                        <input type="text" class="form-control" name="id" value="<?php echo $id?>"  readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên voucher:</label>
                        <input type="text" class="form-control" name="voucher" value="<?php echo $voucher?>" >
                    </div>
                    <div class="form-group">
                        <label for="name">Giá trị:</label>
                        <input type="text" class="form-control" name="giatri" value="<?php echo $giatri?>" >
                    </div>
                    <div class="form-group">
                        <button type="submit" name="updatevoucher" class="btn btn-primary">Sửa voucher</button>
                    </div>
                </form>
            </div>