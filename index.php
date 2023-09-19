<?php
ob_start();
session_start();
include "global.php";
include "models/pdo.php";
include "models/categories.php";
include "models/products.php";

// $loadProduct = getAllProduct();
$loadCate = get_all_category();
$loadProduct = get_all_product_client();
include "view/header.php";
// var_dump($loadCate);

if (isset($_GET['act']) && ($_GET['act'] !== "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            var_dump(isset($_GET['id_cate']));
            if (isset($_GET['id_cate']) && $_GET['id_cate'] > 0) {
                $load_product_cate = get_all_product($_GET['id_cate']);
                var_dump($load_product_cate);
                die();
            }
            include "view/home.php";
            break;
        case 'about':
            include "view/about.php";
            break;
        case 'contact':
            include "view/contact.php";
            break;
        case 'productdetail':
            if (isset($_GET['id_product']) && $_GET['id_product'] > 0) {
                $detail_product = get_by_one_product($_GET['id_product']);
            } else {
                include "view/home.php";
            }
            include "view/productdetail.php";
            break;
        case 'store':
            if (isset($_GET['id_cate']) && $_GET['id_cate'] > 0) {
                $load_product_cate = get_all_product($_GET['id_cate']);
                var_dump($load_product_cate);
                die();
            }
            include "view/store.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
ob_end_flush();
