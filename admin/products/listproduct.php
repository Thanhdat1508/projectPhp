<div class="row" style="width: 90%; margin: auto;">
    <h1>Danh sách sản phẩm</h1>

    <div class="col-md-12">
        <div class="header-search">
            <form action="" method="POST">
                <select class="input-select" name="select_cate">
                    <option value="0">Lọc danh mục</option>
                    <?php
                    foreach ($listCategory as $listcate) {
                        extract($listcate);
                    ?>
                        <option value="<?php echo $id_cate ?>"><?php echo $name_cate ?></option>
                    <?php } ?>


                    <!-- <option value="1">Category 02</option> -->
                </select>

                <button class="search-btn" name="search_cate">Tìm kiếm</button>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thao tác</th>

            </tr>
        </thead>
        <tbody>

            <?php
            if (is_array($listproduct) || is_object($listproduct)) {
                $i = 1;
                foreach ($listproduct as $product) {
                    extract($product);
                    $img = $path_upload . $img_c;

            ?>
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $name_product ?></td>
                        <?php
                        $listcate = get_by_one($cate_id);
                        extract($listcate);
                        ?>
                        <td><?php echo $name_cate ?></td>
                        <td><img src="<?php echo $img ?>" style="width: 80px; height: 80px; object-fit: cover;" alt="Ảnh lỗi"></td>


                        <td><?php echo number_format($price_product) ?></td>
                        <td>Chi tiết</td>
                        <td><a style="" href="index.php?act=product&getbyproduct&id=<?php echo $id_product ?>"> <input type="button" class="btn btn-primary" value="Sửa"></a> |
                            <a style="" href="index.php?act=product&deleteproduct&id=<?php echo $id_product ?>"> <input type="button" class="btn btn-warning" value="Xóa"></a>
                        </td>


                    </tr>
            <?php
                }
            }

            ?>
        </tbody>
    </table>
</div>