<?php
include "../connect.php";
$usersid = filterRequest("user_id");
getAllData("ordersview", "orders_usersid=$usersid");
