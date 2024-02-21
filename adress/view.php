<?php
include "../connect.php";

$userid = filterRequest("user_id");

getAllData("adress", "adress_usersid = $userid");
