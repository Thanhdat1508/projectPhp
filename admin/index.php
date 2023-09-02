<?php
ob_start();
include '../global.php';
include "$path_models/pdo.php";
include "$path_models/categories.php";
include "$path_models/products.php";

include "header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    // var_dump($_GET['deleteproduct']);
    switch ($act) {

        case 'categories':
            if (isset($_GET['addcategory'])) {
                if (isset($_POST['form_addcate'])) {
                    // var_dump(isset($_POST['form_addcate']));
                    $nameCategory = $_POST['name_category'];
                    insert_category($nameCategory);
                    $message = 'Thêm danh mục thành công';
                }
                include "categories/add.php";
            } else if (isset($_GET['listcategory'])) {
                $listCategory = getAllCategory();
                include "categories/list.php";
            } else if (isset($_GET['getbycate'])) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $cateGetBy = getByOne($_GET['id']);
                }
                include "categories/update.php";
            } else if (isset($_GET['updateCate'])) {
                if (isset($_POST['form_updatecate'])) {
                    $update_cate = $_POST['update_category'];
                    $id = $_POST['id'];
                    updateCategory($id, $update_cate);
                }
                $listCategory = getAllCategory();
                include "categories/list.php";
            } else if (isset($_GET['deletecategory'])) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    deleteCategory($_GET['id']);
                }
                $listCategory = getAllCategory();
                include "categories/list.php";
            }
            break;
        case 'product':
            if (isset($_GET['addproduct'])) {
                $listCategory = getAllCategory();

                if (isset($_POST['add_product'])) {
                    $name_product = $_POST['name_product'];
                    $title_product = $_POST['title_product'];
                    $cate_product = $_POST['cate_product'];
                    $price_product = $_POST['price_product'];

                    $describeProduct = $_POST['describeProduct'];
                    $img_product = $_FILES['img_product']['name'];
                    $file_upload = $path_upload . basename($_FILES['img_product']['name']);
                    if (move_uploaded_file($_FILES['img_product']['tmp_name'], $file_upload)) {
                        //echo '<script language="javascript">alert("Đã upload thành công!");</script>';
                    } else {
                        //echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
                    }
                    // var_dump($name_product, $title_product, $cate_product, $price_product, $describeProduct, $img_product);

                    // // $title_product = $_POST['title_product'];
                    insert_into_product($cate_product, $name_product, $img_product, $title_product, $describeProduct, $price_product);
                    $message = 'Thêm sản phẩm thành công ';
                }
                include 'products/add.php';
            } else if (isset($_GET['listproduct'])) {
                $listproduct = getAllProduct();
                $listCategory = getAllCategory();
                include 'products/listproduct.php';
            } else if (isset($_GET['deleteproduct'])) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_product($_GET['id']);
                }
                $listproduct = getAllProduct();
                include 'products/listproduct.php';
            } else if (isset($_GET['getbyproduct'])) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $get_by_product = getByOnProdcut($_GET['id']);
                    $listCategory = getAllCategory();
                }
                include "products/update.php";
            }


            break;
        default:
            include "home.php";
    }
} else {
    include "home.php";
}

include "footer.php";
ob_end_flush();
?>;