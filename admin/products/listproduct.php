<div class="row" style="width: 90%; margin: auto;">
    <h1>Danh sách sản phẩm</h1>
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
                    // var_dump($img);
                    // if(is_file($img)){
                    //     $img;
                    // }else{
                    //     $img = 'no hinh';
                    // }

            ?>
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $name_product ?></td>
                        <?php
                        $listcate = getByOne($cate_id);
                        extract($listcate);
                        ?>
                        <td><?php echo $name_cate ?></td>
                        <td><img src="<?php echo $img ?>" style="width: 80px; height: 80px; object-fit: cover;" alt="Ảnh lỗi"></td>


                        <td><?php echo number_format($price_product) ?></td>
                        <td>Chi tiết</td>
                        <td><a style="" href="index.php?act=product&getbyproduct&id=<?php echo $id ?>"> <input type="button" class="btn btn-primary" value="Sửa"></a> |
                            <a style="" href="index.php?act=product&deleteproduct&id=<?php echo $id ?>"> <input type="button" class="btn btn-warning" value="Xóa"></a>
                        </td>


                    </tr>
            <?php
                }
            }

            ?>
        </tbody>
    </table>
</div>