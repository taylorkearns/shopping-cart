<?php  

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/shopping-cart-manager.php');

$shopping_cart_manager = new ShoppingCartManager();

if(!isset($_COOKIE['cart']))
{ 
    setcookie('cart[]', "cart_name"); 
}

$items = $shopping_cart_manager->get_catalog_items();

?>