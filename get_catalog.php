<?php  

require_once($_SERVER['DOCUMENT_ROOT'].'/shopping-cart-manager.php');

$shopping_cart_manager = new ShoppingCartManager();

$shopping_cart_manager->get_catalog_items();

?>