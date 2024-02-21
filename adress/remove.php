<?php
include "../connect.php";

$adressid = filterRequest("adress_id");

deleteData("adress", "adress_id = $adressid");
