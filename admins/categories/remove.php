<?php
include "../../connect.php";

$id = filterRequest("id");
$image = filterRequest("image");
deleteFile("../../upload/categories", $image);
deleteData("categories", "categories_id=$id");
