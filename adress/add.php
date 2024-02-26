<?php
include "../connect.php";

$usersid = filterRequest("user_id");
$name = filterRequest("name");
$city = filterRequest("city");
$street = filterRequest("street");
$lat = filterRequest("lat");
$long = filterRequest("long");
$desc = filterRequest("desc");

$data = array(

    "adress_usersid" => $usersid,
    "adress_name" => $name,
    "adress_city" => $city,
    "adress_street" => $street,
    "adress_lat" => $lat,
    "adress_long" => $long,
    "adress_desc" => $desc,

);

insertData("adress", $data);
