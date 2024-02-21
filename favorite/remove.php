<?php
include "../connect.php";
$usersid = filterRequest("user_id");
$itemsid = filterRequest("item_id");

deleteData("favorites", "favorites_usersid = $usersid AND  favorites_itemsid = $itemsid");
