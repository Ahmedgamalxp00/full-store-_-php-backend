<?php
include "../../connect.php";

$name = filterRequest("name");
$namear = filterRequest("namear");
$image = imageUpload("../../upload/categories", "image");

if ($image == "empty") {
    printFailure("you must insert image");
} else if ($image == "failure") {
    printFailure("image must less than 2 MB or  file extension not allowed");
} else {
    $data = array(
        "categories_name" => $name,
        "categories_name_ar" => $namear,
        "categories_image" => $image,
    );
    insertData("categories", $data);
}
