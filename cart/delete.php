<?php
include "../connect.php";
$usersid = filterRequest("user_id");
$itemsid = filterRequest("item_id");

deleteData("cart", "cart_itemsid = $itemsid AND cart_usersid= $usersid AND cart_orders = 0");
