<?php
include "../connect.php";
$userid = filterRequest("user_id");
getAllData("myfavorite", "favorites_usersid = $userid");
