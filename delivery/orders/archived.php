<?php
include "../../connect.php";
$deliveryid = filterRequest("delivery_id");
getAllData("ordersview", "orders_status = 4 AND orders_delivery = $deliveryid");
