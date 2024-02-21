
<?php
include "../../connect.php";


$email = filterRequest("email");
$verifycode = rand(10000, 99999);


$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = ?");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = array(
        "delivery_verifycode" => $verifycode,
    );
    sendMail($email, "[Store App] Please verify your account", "your verification code $verifycode");
    updateData("delivery", $data, "delivery_email = '$email'");
} else {
    printFailure("Email doesn't exist");
}
