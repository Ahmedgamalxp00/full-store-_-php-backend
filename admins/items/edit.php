<?php
include "../../connect.php";

$id = filterRequest("id");
$name = filterRequest("name");
$namear = filterRequest("namear");
$desc = filterRequest("desc");
$descar = filterRequest("descar");
$count = filterRequest("count");
$active = filterRequest("active");
$price = filterRequest("price");
$discount = filterRequest("discount");

$categoryid = filterRequest("categoryid");
$oldimage = filterRequest("oldimage");
$image = imageUpload("../../upload/items", "image");

if ($image == "empty") {
    $data = array(
        "items_name" => $name,
        "items_name_ar" => $namear,

        "items_desc" => $desc,
        "items_count" => $count,
        "items_desc_ar" => $descar,
        "items_active" => $active,
        "items_price" => $price,
        "items_discount" => $discount,
        "items_category" => $categoryid,
    );
    updateData("items", $data, "items_id=$id");
} else if ($image == "failure") {

    printFailure("image must less than 2 MB or  file extension not allowed");
} else {
    $data = array(
        "items_name" => $name,
        "items_name_ar" => $namear,
        "items_image" => $image,

        "items_desc" => $desc,
        "items_count" => $count,
        "items_desc_ar" => $descar,
        "items_active" => $active,
        "items_price" => $price,
        "items_discount" => $discount,

        "items_category" => $categoryid,
    );
    updateData("items", $data, "items_id=$id");
    deleteFile("../../upload/items", $oldimage);
}
