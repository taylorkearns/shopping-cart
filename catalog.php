<?php  

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/shopping-cart-manager.php');

$shopping_cart_manager = new ShoppingCartManager();
if(isset($_POST['item']))
{
    $shopping_cart_manager->create_cart_item($_POST['item']);
}
$items = $shopping_cart_manager->get_catalog_items();
$shopping_cart_manager->display_cart();

?>