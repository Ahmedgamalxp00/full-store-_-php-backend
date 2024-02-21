<?php
include "../connect.php";

$username = filterRequest("name");
$email = filterRequest("email");
$password = filterRequest("password");
$phone = filterRequest("phone");
$verifycode = rand(10000, 99999);


$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? OR users_phone = ?");
$stmt->execute(array($email, $phone));

$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("Already used email or phone");
} else {
    $data = array(
        "users_name" => $username,
        "users_email" => $email,
        "users_phone" => $phone,
        "users_password" => $password,
        "users_verifycode" => $verifycode,
    );
    sendMail($email, "[Store App] Please verify your account", "your verification code $verifycode");
    insertData("users", $data);
}
