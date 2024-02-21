<?php
include "../../connect.php";

$email = filterRequest("email");
$password = filterRequest("password");
$data = array("delivery_password" => $password);

updateData("delivery", $data, "delivery_email = '$email'");
