<?php
include "../../connect.php";

$email = filterRequest("email");
$password = filterRequest("password");



$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = '$email'");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0 && $user["delivery_password"] == $password) {
   echo json_encode(array("status" => "success", "data" => $user));
} else {
   if ($count > 0 && $user["delivery_password"] != $password) {
      printFailure("incorrect password");
   } else {
      printFailure("User doesn't exist");
   }
}
