<?php
include "../connect.php";
$userid = filterRequest("user_id");
getAllData("notification", " notification_usersid = '$userid' ");
