<?php
include "../../connect.php";
$orderid = filterRequest("order_id");
$userid = filterRequest("user_id");
$type = filterRequest("order_type");


if ($type == "0") {
    $data = array(
        "orders_status" => 2
    );
} else {
    $data = array(
        "orders_status" => 4
    );
}

updateData("orders", $data, "orders_id= '$orderid' AND orders_status = 1");

insertNotify("Store App Notification", "Your order has been prepared", $userid, "users$userid", "none", "refreshorderview");

if ($type == "0") {
    sendGCM("Store App Notification", "there is an order waiting approval", "delivery", "none", "none");
}
