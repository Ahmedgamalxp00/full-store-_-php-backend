<?php
include "../../connect.php";

$id = filterRequest("id");
$image = filterRequest("image");
deleteFile("../../upload/items", $image);
deleteData("items", "items_id=$id");
