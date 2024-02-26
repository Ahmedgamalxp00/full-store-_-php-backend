<?php
include "../connect.php";

$email = filterRequest("email");
$image = imageUpload("../upload/users", "image");

if ($image == "empty") {
    printFailure("you must choose an image");
} else if ($image == "failure") {
    printFailure("image must less than 2 MB or  file extension not allowed");
} else {

    $data = array(
        "users_image" => $image
    );
    updateData("users", $data, "users_email = '$email'");
}
