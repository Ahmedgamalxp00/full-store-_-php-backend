<?php
include "../../connect.php";
$deliveryid = filterRequest("delivery_id");
getAllData("ordersview", "orders_status = 2 OR (orders_status=3 AND orders_delivery = $deliveryid)");
