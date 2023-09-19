<?php

function insert_category($nameCategory, $img_cate)
{
    $sql = "insert into category (name_cate, img_cate) values('$nameCategory', '$img_cate')";
    pdo_execute($sql);
}
// load all
function get_all_category()
{
    $sql = "select * from category order by id_cate desc";
    return pdo_query($sql);
}

// delete

function delete_category($id)
{
    $sql = "delete from category where id_cate =" . $id;
    pdo_execute($sql);
}

function get_by_one($id)
{
    $sql = "select * from category where id_cate = " . $id;
    return pdo_query_one($sql);
}

function update_category($id, $updateCate, $img_cate)
{
    $sql = "update category set name_cate='" . $updateCate . "', img_cate = '" . $img_cate . "' where id_cate=" . $id;
    pdo_execute($sql);

    //     $sql = "update category set name_cate=?, where id_cate= ?";
    //     pdo_execute($sql, $id, $updateCate);
}
