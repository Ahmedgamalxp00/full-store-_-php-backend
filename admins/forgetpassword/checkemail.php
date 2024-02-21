
<?php
include "../../connect.php";


$email = filterRequest("email");
$verifycode = rand(10000, 99999);


$stmt = $con->prepare("SELECT * FROM admins WHERE admins_email = ?");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = array(
        "admins_verifycode" => $verifycode,
    );
    sendMail($email, "[Store App] Please verify your account", "your verification code $verifycode");
    updateData("admins", $data, "admins_email = '$email'");
} else {
    printFailure("Email doesn't exist");
}
