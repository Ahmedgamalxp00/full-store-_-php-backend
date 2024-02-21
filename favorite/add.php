<?php
include "../connect.php";
$usersid = filterRequest("user_id");
$itemsid = filterRequest("item_id");

$data = array("favorites_usersid" => $usersid, "favorites_itemsid" => $itemsid);
insertData("favorites", $data);
