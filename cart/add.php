<?php
include "../connect.php";
$usersid = filterRequest("user_id");
$itemsid = filterRequest("item_id");

$data = array("cart_usersid" => $usersid, "cart_itemsid" => $itemsid);
insertData("cart", $data,);
