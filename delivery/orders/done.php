<?php
include "../../connect.php";
$orderid = filterRequest("order_id");
$userid = filterRequest("user_id");
$deliveryid = filterRequest("delivery_id");




$data = array(
    "orders_status" => 4
);


updateData("orders", $data, "orders_id= '$orderid' AND orders_status = 3");

insertNotify("Store App Notification", "Your order has been deliverd", $userid, "users$userid", "none", "refreshorderview");


sendGCM("Store App Notification", "order has been deliverd to customer ", "admin", "none", "none");
