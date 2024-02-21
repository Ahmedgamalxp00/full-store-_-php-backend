<?php
include "../connect.php";
$id = filterRequest("order_id");
getAllData("ordersdetailsview", "cart_orders=$id");
