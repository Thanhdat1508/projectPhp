<div class="row" style="width: 700px; margin: auto;">
  <h1>Thêm danh mục </h1>
  <form action="?act=categories&addcategory" method="POST" id="form-1" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="idCategory" class="form-label">Tên danh mục</label>
      <input type="text" class="form-control" id="idCategory" name="name_category" placeholder="Điện thoại">
      <input type="hidden" name="form_addcate">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="img_cate" class="form-label">Hình ảnh</label>
      <input type="file" class="form-control" id="img_cate" name="img_cate" placeholder="Điện thoại">
      <span class="form-message"></span>
    </div>

    <div class="mb-3">
      <button name="add_cate" class="btn btn-primary">Thêm</button>
    </div>

    <div>
      <?php
      if (isset($message) && ($message != "")) {
        echo $message;
      }
      ?>
    </div>
  </form>
</div>