<?php
include "../../connect.php";
$email = filterRequest("email");
$verifycode = filterRequest("verifycode");
$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = '$email' AND delivery_verifycode ='$verifycode'");
$stmt->execute();
$count = $stmt->rowCount();

if ($count > 0) {
    printSuccess();
} else {
    printFailure("verifycode not correct");
}
