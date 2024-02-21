<?php
include "connect.php";
$alldata = array();
//success
$alldata["status"] = "success";
//categories
$categories = getAllData("categories", null, false);
$alldata['categories'] = $categories;



//all items
$userid = filterRequest("user_id");
$stmt = $con->prepare(" SELECT itemsview.* , 1 as favorite FROM itemsview
INNER JOIN favorites ON favorites.favorites_itemsid=itemsview.items_id AND favorites.favorites_usersid=$userid
UNION ALL
SELECT * , 0 as favorite FROM itemsview
WHERE items_id NOT IN (SELECT itemsview.items_id FROM itemsview 
                 INNER JOIN favorites ON favorites.favorites_itemsid=itemsview.items_id AND favorites.favorites_usersid=$userid )
 ");
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
$alldata['items'] = $items;


//top selling items
$topselling = getAllData("topsellingview", "1=1 ORDER BY itemscount DESC", false);
$alldata['topselling'] = $topselling;

echo json_encode($alldata);
