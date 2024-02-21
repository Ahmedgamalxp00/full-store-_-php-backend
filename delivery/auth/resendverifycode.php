<?php
include "../../connect.php";
$email = filterRequest("email");
$verifycode = rand(10000, 99999);

$data = array("delivery_verifycode" => $verifycode);

updateData("delivery", $data, "delivery_email= '$email'");

sendMail($email, "[Store App] Please verify your account", "your verification code $verifycode");
