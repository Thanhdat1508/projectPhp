
<div class="row" style="width: 700px; margin: auto;">
    <h1>Thêm danh mục </h1>
  <form action="?act=categories&addcategory" method="POST" id="form-1">
    <div class="form-group mb-3">
      <label for="idCategory" class="form-label">Tên danh mục</label>
      <input type="text" class="form-control" id="idCategory"  name="name_category" placeholder="Điện thoại">
      <input type="hidden" name="form_addcate">
      <span  class="form-message"></span>
    </div>

    <div class="mb-3">
      <button name="add_cate" class="btn btn-primary">Thêm</button>
    </div>

    <div>
    <?php 
    if(isset($message) && ($message !="")){
      echo $message;
    }
    ?>
    </div>
  </form>
</div>

