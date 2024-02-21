<?php
include "../connect.php";
$usersid = filterRequest("user_id");
$itemsid = filterRequest("item_id");

$stmt = $con->prepare(" SELECT COUNT(cart.cart_id) as itemcount FROM cart WHERE cart_usersid = $usersid AND cart_itemsid=$itemsid AND cart_orders = 0");
$stmt->execute();
$count = $stmt->rowCount();
$data = $stmt->fetchColumn();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure", "data" => "0"));
}
