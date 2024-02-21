CREATE OR REPLACE VIEW itemsview AS 
SELECT items.*,categories.* ,(items_price-items_price*items_discount/100) as itemspriceaferdiscount FROM items
INNER JOIN categories on items.items_category=categories.categories_id



CREATE OR REPLACE VIEW myfavorite AS 
SELECT favorites.*,items.*,(items_price-items_price*items_discount/100) as itemspriceaferdiscount, users.users_id FROM favorites
INNER JOIN users on users.users_id=favorites.favorites_usersid
INNER JOIN items on items.items_id=favorites.favorites_itemsid



CREATE OR REPLACE VIEW cartview as
SELECT SUM(items.items_price - items.items_price * items.items_discount / 100) as itemsprice, COUNT(cart.cart_itemsid) as itemscount ,(items_price-items_price*items_discount/100) as itemspriceaferdiscount,cart.*,items.* FROM cart
INNER JOIN items on items.items_id=cart.cart_itemsid
WHERE cart_orders = 0
GROUP BY cart.cart_itemsid ,cart.cart_usersid,cart.cart_orders;


CREATE OR REPLACE VIEW ordersview as
SELECT orders.* , adress.* FROM orders
LEFT JOIN adress ON adress.adress_id = orders.orders_address



CREATE OR REPLACE VIEW ordersdetailsview as
SELECT SUM(items.items_price - items.items_price * items.items_discount / 100) as itemsprice, COUNT(cart.cart_itemsid) as itemscount ,(items_price-items_price*items_discount/100) as itemspriceaferdiscount,cart.*,items.* FROM cart
INNER JOIN items on items.items_id=cart.cart_itemsid
WHERE cart_orders != 0
GROUP BY cart.cart_itemsid ,cart.cart_usersid,cart.cart_orders;


CREATE OR REPLACE VIEW topsellingview as
SELECT COUNT(cart_id) as itemscount ,cart.*,itemsview.* FROM cart
INNER JOIN itemsview on itemsview.items_id=cart.cart_itemsid
WHERE cart_orders != 0
GROUP BY cart_itemsid