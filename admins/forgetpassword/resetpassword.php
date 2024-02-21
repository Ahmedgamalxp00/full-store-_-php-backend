<?php
include "../../connect.php";

$email = filterRequest("email");
$password = filterRequest("password");
$data = array("admins_password" => $password);

updateData("admins", $data, "admins_email = '$email'");
