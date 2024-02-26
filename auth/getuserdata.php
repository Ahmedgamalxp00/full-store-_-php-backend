<?php
include "../connect.php";
$email = filterRequest("email");
getAllData("users", "users_email = '$email'");
