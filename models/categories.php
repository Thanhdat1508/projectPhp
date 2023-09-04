<?php 

function insert_category($nameCategory){
    $sql = "insert into category (name_cate) values('$nameCategory')";
    pdo_execute($sql);
}
// load all
function getAllCategory(){
    $sql = "select * from category order by id_cate desc";
    return pdo_query($sql);
}

// delete

function deleteCategory($id){
    $sql = "delete from category where id_cate =".$id;
    pdo_execute($sql);
}

function getByOne($id){
    $sql = "select * from category where id_cate = ".$id;
    return pdo_query_one($sql);
}

function updateCategory($id, $updateCate){
    $sql = "update category set name_cate='".$updateCate."' where id_cate=" .$id;
    pdo_execute($sql);

//     $sql = "update category set name_cate=?, where id_cate= ?";
//     pdo_execute($sql, $id, $updateCate);
}
