<?php
include "../../connect.php";
$orderid = filterRequest("order_id");
$userid = filterRequest("user_id");

$data = array(
    "orders_status" => 1
);
updateData("orders", $data, "orders_id= '$orderid' AND orders_status = 0");
insertNotify("Store App Notification", "Your order has been approved", $userid, "users$userid", "none", "refreshorderview");
