<?php
include "../connect.php";
$usersid = filterRequest("user_id");
$data = getAllData("cartview", "cart_usersid=$usersid", false);

$stmt = $con->prepare("SELECT SUM(itemsprice) as totalprice , COUNT(itemscount) as totalcount FROM cartview
WHERE cartview.cart_usersid = $usersid AND cart_orders = 0
GROUP BY cart_usersid ");

$stmt->execute();
$totalPriceAndCount = $stmt->fetch(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array(
        "status" => "success",
        "data" => $data,
        "total" => $totalPriceAndCount
    ));
} else {
    echo json_encode(array("status" => "failure"));
}
