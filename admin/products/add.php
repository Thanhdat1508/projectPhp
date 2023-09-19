<?php

if (isset($listCategory)) {
  // var_dump($listCategory);

}
?>
<div class="row" style="width: 700px; margin: auto;">
  <h1>Thêm sản phẩm </h1>
  <form action="?act=product&addproduct" method="POST" id="form-sp" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="name_product" class="form-label">Tên sản phẩm</label>
      <input type="text" class="form-control" id="name_product" name="name_product" placeholder="IPHONE 11">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="title_product" class="form-label">Tiêu đề sản phẩm</label>
      <input type="text" class="form-control" id="title_product" name="title_product" placeholder="Dung lượng 256GB">
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
        ?>
            <option value=<?php echo $id_cate; ?>><?php echo $name_cate; ?></option>
        <?php
          }
        }
        ?>
      </select>
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="price_product" class="form-label">Giá sản phẩm</label>
      <input type="text" class="form-control" id="price_product" name="price_product" placeholder="16.000.000">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="sale_price" class="form-label">Giá giảm</label>
      <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="15.800.000">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="img_product" class="form-label">Hình ảnh chính</label>
      <input type="file" class="form-control" id="img_product" name="img_product" placeholder="Điện thoại">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="img_product" class="form-label">Hình ảnh phụ 1</label>
      <input type="file" class="form-control" id="img_product1" name="img_product1" placeholder="Điện thoại">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="img_product" class="form-label">Hình ảnh phụ 2</label>
      <input type="file" class="form-control" id="img_product2" name="img_product2" placeholder="Điện thoại">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="img_product" class="form-label">Hình ảnh phụ 3</label>
      <input type="file" class="form-control" id="img_product3" name="img_product3" placeholder="Điện thoại">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="img_product" class="form-label">Hình ảnh phụ 4</label>
      <input type="file" class="form-control" id="img_product4" name="img_product4" placeholder="Điện thoại">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="img_product" class="form-label">Hình ảnh phụ 5</label>
      <input type="file" class="form-control" id="img_product5" name="img_product5" placeholder="Điện thoại">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="img_product" class="form-label">Hình ảnh phụ 6</label>
      <input type="file" class="form-control" id="img_product6" name="img_product6" placeholder="Điện thoại">
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
      <textarea id="describeProduct" name="describeProduct" style="height: 300px;"></textarea>
      <span class="form-message"></span>
    </div>
    <input type="hidden" name="add_product">

    <div class="form-group mb-3">
      <button name="add_product" class="btn btn-primary">Thêm</button>
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