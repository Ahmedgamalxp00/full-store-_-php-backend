<?php
include "../connect.php";

$alldata = array();
//success
$alldata["status"] = "success";


$userid = filterRequest("user_id");
$categoryid = filterRequest("category_id");
$stmt = $con->prepare(" SELECT itemsview.* , 1 as favorite FROM itemsview
INNER JOIN favorites ON favorites.favorites_itemsid=itemsview.items_id AND favorites.favorites_usersid=$userid
WHERE items_category = $categoryid
UNION ALL
SELECT * , 0 as favorite FROM itemsview
WHERE items_id NOT IN (SELECT itemsview.items_id FROM itemsview 
                 INNER JOIN favorites ON favorites.favorites_itemsid=itemsview.items_id AND favorites.favorites_usersid=$userid ) AND items_category = $categoryid
 ");
$stmt->execute();

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $items));
} else {
    echo json_encode(array("status" => "failure"));
}
