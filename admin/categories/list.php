<div class="row" style="width: 90%; margin: auto;">
    <h1>Danh sách danh mục</h1>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tên danh mục</th>
        <th scope="col">Thao tác</th>
        <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>

    <?php
    if (is_array($listCategory) || is_object($listCategory)){
        $i = 1;
        foreach ($listCategory as $category) {
            extract($category);
               ?>
                <tr>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo $name_cate ?></td>
                <td><a style="" href="index.php?act=categories&getbycate&id=<?php echo $id_cate ?>"> <input type="button" class="btn btn-primary" value="Sửa"></a></td>
                <td><a style="" href="index.php?act=categories&deletecategory&id=<?php echo $id_cate ?>"> <input type="button" class="btn btn-warning" value="Xóa"></a></td>
                </tr>
                <?php
        }
    }
    ?>

       
        <!-- <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td><a class="color_link" href="#">Xóa</a></td>
        <td><a class="color_link" href="#">Sửa</a></td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td >Larry the Bird</td>
        <td><a class="color_link" href="#">Xóa</a></td>
        <td><a class="color_link" href="#">Sửa</a></td>
        </tr> -->
    </tbody>
    </table>
</div>