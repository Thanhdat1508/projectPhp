<?php
function insert_into_product($cate_product, $name_product, $img_product, $title_product, $describeProduct, $price_product, $sale_product)
{
    $sql = "insert into products (cate_id, name_product, img_c, summary, describe_product, price_product, sale_product) 
        values ('$cate_product', '$name_product', '$img_product',' $title_product', '$describeProduct', '$price_product', '$sale_product')";
    pdo_execute($sql);
}

function get_all_product($select_cate)
{
    if ($select_cate) {
        $sql = "select * from products where cate_id = $select_cate order by id_product desc";
    } else {
        $sql = "select * from products order by id_product desc";
    }
    return pdo_query($sql);
}

function delete_product($id)
{
    $sql = "delete from products where id_product =" . $id;
    pdo_execute($sql);
}

function get_by_one_product($id)
{
    $sql = "select * from products where id_product =" . $id;
    return pdo_query_one($sql);
}

function update_products($id, $cate_product, $name_product, $img_product, $title_product, $describeProduct, $price_product, $sale_product)
{
    if ($img_product != '') {
        $sql = "update products set cate_id = '" . $cate_product . "', name_product = '" . $name_product . "', img_c = '" . $img_product . "',
        summary = '" . $title_product . "', describe_product = '" . $describeProduct . "', price_product = '" . $price_product . "', sale_product = '" . $sale_product . "' where id_product=" . $id;
    } else {
        $sql = "update products set cate_id = '" . $cate_product . "', name_product = '" . $name_product . "', summary = '" . $title_product . "', describe_product = '" . $describeProduct . "',
         price_product = '" . $price_product . "' , sale_product = '" . $sale_product . "' where id_product=" . $id;
    }
    pdo_execute($sql);
}

function get_all_product_client()
{
    $sql = "select * from products order by id_product desc";
    return pdo_query($sql);
}
