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
                    $img_cate = $_FILES['img_cate']['name'];
                    $file_upload = $path_upload . basename($_FILES['img_cate']['name']);
                    move_uploaded_file($_FILES['img_cate']['tmp_name'], $file_upload);
                    insert_category($nameCategory, $img_cate);
                    $message = 'Thêm danh mục thành công';
                }
                include "categories/add.php";
            } else if (isset($_GET['listcategory'])) {
                $listCategory = get_all_category();
                include "categories/list.php";
            } else if (isset($_GET['getbycate'])) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $cateGetBy = get_by_one($_GET['id']);
                }
                include "categories/update.php";
            } else if (isset($_GET['updateCate'])) {
                if (isset($_POST['form_updatecate'])) {
                    $update_cate = $_POST['update_category'];
                    $id = $_POST['id'];
                    $img_cate = $_FILES['img_cate']['name'];
                    $file_upload = $path_upload . basename($_FILES['img_cate']['name']);
                    move_uploaded_file($_FILES['img_cate']['tmp_name'], $file_upload);

                    update_category($id, $update_cate, $img_cate);
                }
                $listCategory = get_all_category();
                include "categories/list.php";
            } else if (isset($_GET['deletecategory'])) {
                if (isset($_GET['id_cate']) && ($_GET['id_cate'] > 0)) {
                    delete_category($_GET['id_cate']);
                    var_dump($_GET['id_cate']);
                    die();
                }
                $listCategory = get_all_category();
                include "categories/list.php";
            }
            break;
        case 'product':
            if (isset($_GET['addproduct'])) {
                $listCategory = get_all_category();
                if (isset($_POST['add_product'])) {
                    $name_product = $_POST['name_product'];
                    $title_product = $_POST['title_product'];
                    $cate_product = $_POST['cate_product'];
                    $price_product = $_POST['price_product'];
                    $sale_price = $_POST['sale_price'];
                    $describeProduct = $_POST['describeProduct'];
                    $img_product = $_FILES['img_product']['name'];
                    $file_upload = $path_upload . basename($_FILES['img_product']['name']);
                    move_uploaded_file($_FILES['img_product']['tmp_name'], $file_upload);
                    insert_into_product($cate_product, $name_product, $img_product, $title_product, $describeProduct, $price_product, $price_product);
                    $message = 'Thêm sản phẩm thành công ';
                }
                include 'products/add.php';
            } else if (isset($_GET['listproduct'])) {
                $select_cate = 0;
                if (isset($_POST['search_cate'])) {
                    $select_cate = $_POST['select_cate'];
                }
                $listproduct = get_all_product($select_cate);
                $listCategory = get_all_category();


                include 'products/listproduct.php';
            } else if (isset($_GET['deleteproduct'])) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    delete_product($_GET['id']);
                }
                $listproduct = get_all_product($select_cate);
                include 'products/listproduct.php';
            } else if (isset($_GET['getbyproduct'])) {
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $get_by_product = get_by_one_product($_GET['id']);
                    $listCategory = get_all_category();
                }
                include "products/update.php";
            } else if (isset($_GET['updateproduct'])) {
                if (isset($_POST['update_product'])) {
                    $name_product = $_POST['name_product'];
                    $title_product = $_POST['title_product'];
                    $cate_product = $_POST['cate_product'];
                    $price_product = $_POST['price_product'];
                    $sale_price = $_POST['sale_price'];
                    $id = $_POST['id_product'];
                    $describeProduct = $_POST['describeProduct'];
                    $img_product = $_FILES['img_product']['name'];
                    $file_upload = $path_upload . basename($_FILES['img_product']['name']);
                    if (move_uploaded_file($_FILES['img_product']['tmp_name'], $file_upload)) {
                        //echo '<script language="javascript">alert("Đã upload thành công!");</script>';
                    } else {
                        //echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
                    }
                    update_products($id, $cate_product, $name_product, $img_product, $title_product, $describeProduct, $price_product, $sale_product);
                    $message = 'cập nhật thành công';
                }
                $listproduct = get_all_product($select_cate);
                include 'products/listproduct.php';
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