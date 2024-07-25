<?php
$status=0;
    if(is_array($dh)&&(count($dh)>0)){
        extract($dh);
    }
?>
<div class="main-content">
                <h3 class="title-page">
                    Sửa trạng thái đơn hàng
                </h3>
                
                <form class="addPro" action="index.php?pg=updatedonhang" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Mã đơn hàng:</label>
                        <input type="text" class="form-control" name="id" value="<?php echo $id?>" id="name" placeholder="Nhập tên sản phẩm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="categories">Trạng thái:</label>
                        <select class="form-select" name="status" aria-label="Default select example" >
                            <option value="0" >Chọn trạng thái</option>
                            <option value="Chờ xác nhận" >Chờ xác nhận</option>
                            <option value="Chờ lấy hàng">Chờ lấy hàng</option>
                            <option value="Chờ giao hàng" >Chờ giao hàng</option>
                            <option value="Hoàn thành" >Hoàn thành</option>
                            <option value="Đã hủy" >Đã hủy</option>
                            <option value="Trả hàng" >Trả hàng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="updatedonhang" class="btn btn-primary">Sửa đơn hàng</button>
                    </div>
                </form>
            </div>