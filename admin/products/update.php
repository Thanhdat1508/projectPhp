<?php
if (is_array($get_by_product) || is_object($get_by_product)) {
    extract($get_by_product);
    $img = $path_upload . $img_c;
}
?>
<div class="row" style="width: 700px; margin: auto;">
    <h1>Cập nhật sản phẩm </h1>
    <form action="?act=product&updateproduct" method="POST" id="form-sp" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="name_product" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name_product" name="name_product" value="<?php echo $name_product ?>" placeholder="IPHONE 11">
            <span class="form-message"></span>
        </div>

        <div class="form-group mb-3">
            <label for="title_product" class="form-label">Tiêu đề sản phẩm</label>
            <input type="text" class="form-control" id="title_product" name="title_product" value="<?php echo $summary ?>" placeholder="Dung lượng 256GB">
            <span class="form-message"></span>
        </div>

        <div class="form-group mb-3">
            <label for="cate_product" class="form-label">Danh mục sản phẩm</label>
            <select class="form-select" id="cate_product" name="cate_product">
                <option selected>Chọn danh mục</option>
                <?php
                if (is_array($listCategory) || is_object($listCategory)) {
                    foreach ($listCategory as $category) {
                        extract($category);
                        if ($cate_id == $id_cate) {
                ?>
                            <option selected value=<?php echo $id_cate ?>><?php echo $name_cate; ?></option>
                        <?php } else { ?>
                            <option value=<?php echo $id_cate ?>><?php echo $name_cate; ?></option>
                <?php
                        }
                    }
                }
                ?>
            </select>
            <span class="form-message"></span>
        </div>

        <div class="form-group mb-3">
            <label for="price_product" class="form-label">Giá sản phẩm</label>
            <input type="text" class="form-control" id="price_product" value="<?php echo $price_product ?>" name="price_product" placeholder="16.000.000">
            <span class="form-message"></span>
        </div>

        <div class="form-group mb-3">
            <label for="img_product" class="form-label">Hình ảnh chính</label>
            <input type="file" class="form-control" id="img_product" name="img_product" placeholder="Điện thoại">
            <img src="<?php echo $img ?>" style="width: 100px; height: 100px; object-fit: cover; margin-top: 6px;" alt="Ảnh lỗi">
            <span class="form-message"></span>
        </div>

        <div class="form-group mb-3">
            <label for="img_product" class="form-label">Hình ảnh phụ</label>
            <input type="file" class="form-control" id="img_product1" name="img_product1" placeholder="Điện thoại">
            <span class="form-message"></span>
        </div>

        <div class="form-group mb-3">
            <label for="img_product" class="form-label">Hình ảnh phụ</label>
            <input type="file" class="form-control" id="img_product2" name="img_product2" placeholder="Điện thoại">
            <span class="form-message"></span>
        </div>

        <!-- <div class="form-group mb-3">
      <label for="gbProduct" class="form-label">Dung lượng</label>
      <select class="form-select" id="gbProduct" name="gbProduct" >
        <option selected>Chọn dung lượng cho máy</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
      <span class="form-message"></span>
    </div> -->

        <div class="form-group mb-3">
            <label for="describeProduct" class="form-label">Mô tả chi tiết</label>
            <!-- <input type="text" class="form-control" id="idCategory"  name="name_category" placeholder="Điện thoại"> -->
            <textarea id="describeProduct" name="describeProduct" style="height: 300px;"><?php echo $describe_product ?></textarea>
            <span class="form-message"></span>
        </div>
        <input type="hidden" name="update_product">
        <input type="hidden" name="id_product" value="<?php echo $id_product ?>">

        <div class="form-group mb-3">
            <button name="update_product" class="btn btn-primary">Cập nhật</button>
        </div>


        <div class="mb-3">
            <?php
            if (isset($message) && ($message != "")) {
                echo $message;
            }
            ?>
        </div>


    </form>
</div>