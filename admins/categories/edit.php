<?php
include "../../connect.php";

$id = filterRequest("id");
$name = filterRequest("name");
$namear = filterRequest("namear");
$oldimage = filterRequest("oldimage");
$image = imageUpload("../../upload/categories", "image");

if ($image == "empty") {
    $data = array(
        "categories_name" => $name,
        "categories_name_ar" => $namear,
    );
    updateData("categories", $data, "categories_id=$id");
} else if ($image == "failure") {

    printFailure("image must less than 2 MB or  file extension not allowed");
} else {
    $data = array(
        "categories_name" => $name,
        "categories_name_ar" => $namear,
        "categories_image" => $image,
    );
    updateData("categories", $data, "categories_id=$id");
    deleteFile("../../upload/categories", $oldimage);
}
