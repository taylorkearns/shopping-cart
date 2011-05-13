<?php  

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/shopping-cart-manager.php');

$shopping_cart_manager = new ShoppingCartManager();
$items = $shopping_cart_manager->get_catalog_items();
$shopping_cart_manager->add_items_to_session();
$cart_items = $shopping_cart_manager->build_cart();

?>