<?php
include "../../connect.php";
$orderid = filterRequest("order_id");
$userid = filterRequest("user_id");
$deliveryid = filterRequest("delivery_id");




$data = array(
    "orders_status" => 3,
    "orders_delivery" => $deliveryid,
);


updateData("orders", $data, "orders_id= '$orderid' AND orders_status = 2");

insertNotify("Store App Notification", "Your order is on the way", $userid, "users$userid", "none", "refreshorderview");


sendGCM("Store App Notification", "order has been approved by delivery", "admin", "none", "none");
sendGCM("Store App Notification", "order has been approved by delivery numder . $deliveryid", "admin", "none", "none");
