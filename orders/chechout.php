<?php
include "../connect.php";
$usersid = filterRequest("user_id");
$adressid = filterRequest("address_id");
$deliverytype = filterRequest("delivery_type");
$deliveryprice = filterRequest("delivery_price");
$ordersprice = filterRequest("orders_price");
$couponid = filterRequest("coupon_id");
$coupondiscount = filterRequest("coupon_discount");
$paymentmethod = filterRequest("payment_method");

if ($deliverytype == "1") {
    $deliveryprice = 0;
}

$totalprice = $ordersprice + $deliveryprice;

// chech out coupon
$currentdata = date("Y-m-d H:i:s");
$chechcoupon = getAllData("coupon", "coupon_id = '$couponid' AND coupon_expiredate > '$currentdata' AND coupon_count > 0 ", false);
if ($chechcoupon > 0) {
    $totalprice = $totalprice - $ordersprice * $coupondiscount / 100;
    $stmt = $con->prepare("UPDATE `coupon` SET `coupon_count` = `coupon_count` - 1 WHERE `coupon_id` = '$couponid'");
    $stmt->execute();
}


$data = array(
    "orders_usersid" => $usersid,
    "orders_address" => $adressid,
    "orders_delivery_type" => $deliverytype,
    "oreders_payment_method" => $paymentmethod,
    "orders_delivery_price" => $deliveryprice,
    "orders_price" => $ordersprice,
    "orders_totalprice" => $totalprice,
    "orders_coupon" => $couponid,
    "orders_discount" => $coupondiscount,
);

$count = insertData("orders", $data, false);
if ($count > 0) {
    $stmt = $con->prepare("SELECT MAX(orders_id) from orders");
    $stmt->execute();
    $maxid = $stmt->fetchColumn();
    $data = array(
        "cart_orders" => $maxid
    );
    updateData("cart", $data, "cart_usersid = $usersid AND cart_orders = 0");
}
