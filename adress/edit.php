<?php
include "../connect.php";

$adressid = filterRequest("adress_id");
$name     = filterRequest("name");
$city     = filterRequest("city");
$street   = filterRequest("street");
$lat      = filterRequest("lat");
$long     = filterRequest("long");
$desc = filterRequest("desc");

$data = array(
    "adress_name" => $name,
    "adress_city"   => $city,
    "adress_street" => $street,
    "adress_lat"    => $lat,
    "adress_long"   => $long,
    "adress_desc" => $desc,

);

updateData("adress", $data, "adress_id = $adressid");
