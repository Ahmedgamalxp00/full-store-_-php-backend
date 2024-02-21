<?php
include "../connect.php";
$couponname = filterRequest("coupon_name");
$currentdata = date("Y-m-d H:i:s");

getAllData("coupon", "coupon_name = '$couponname' AND coupon_expiredate > '$currentdata' AND coupon_count > 0 ");
