<div class="main-content">
                <h3 class="title-page">
                    Thêm voucher
                </h3>
                
                <form class="addPro" action="index.php?pg=addvoucher" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tên voucher:</label>
                        <input type="text" class="form-control" name="voucher" placeholder="Nhập tên voucher">
                    </div>
                    <div class="form-group">
                        <label for="name">Giá trị:</label>
                        <input type="text" class="form-control" name="giatri" placeholder="Nhập số giá">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addvoucher" class="btn btn-primary">Thêm Voucher</button>
                    </div>
                </form>
            </div>
