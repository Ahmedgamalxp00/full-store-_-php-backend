<?php
include "../connect.php";

$id = filterRequest("order_id");

deleteData("orders", "orders_id = $id AND orders_status=0");
