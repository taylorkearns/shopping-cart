<?php  

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/shopping-cart-manager.php');

$shopping_cart_manager = new ShoppingCartManager();
$items = $shopping_cart_manager->get_catalog_items();
if(isset($_POST['item']))
{
    $cart = $shopping_cart_manager->create_cart_item($_POST['item']);
}
else
{
    $cart = $shopping_cart_manager->return_cart();
}

?>