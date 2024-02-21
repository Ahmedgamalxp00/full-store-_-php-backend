<?php
include "../connect.php";

$notificationid = filterRequest("notification_id");

deleteData("notification", "notification_id = $notificationid");
