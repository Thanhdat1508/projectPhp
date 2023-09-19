<?php
if (isset($cateGetBy)) {
  extract($cateGetBy);
}

?>

<div class="row" style="width: 700px; margin: auto;">
  <h1>Cập nhật danh mục </h1>
  <form action="?act=categories&updateCate" method="POST" id="form-1" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="idCategory" class="form-label">Tên danh mục</label>
      <input type="text" class="form-control" id="idCategory" name="update_category" value="<?php if (isset($name_cate) && ($name_cate != '')) echo $name_cate; ?>">
      <input type="text" name='id' hidden value="<?php if (isset($id_cate) && ($id_cate > 0)) echo $id_cate; ?>">
      <input type="hidden" name="form_updatecate">
      <span class="form-message"></span>
    </div>

    <div class="form-group mb-3">
      <label for="img_cate" class="form-label">Hình ảnh</label>
      <input type="file" class="form-control" id="img_cate" name="img_cate" placeholder="Điện thoại">
      <img src="<?php echo $path_upload . $img_cate ?>" alt="ảnh lỗi" width="100px" height="100px" style="object-fit:contain;">
      <span class="form-message"></span>
    </div>

    <div class="mb-3">
      <button name="add_cate" class="btn btn-primary">Cập nhật</button>
    </div>
    <!-- <input type="submit" name="add_cate" class="btn btn-primary" value="thêm" > -->


    <div>
      <?php
      if (isset($message) && ($message != "")) {
        echo $message;
      }
      ?>
    </div>
  </form>
</div>