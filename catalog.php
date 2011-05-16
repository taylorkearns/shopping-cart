<?php  

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/shopping-cart-manager.php');

$shopping_cart_manager = new ShoppingCartManager();
$items = $shopping_cart_manager->get_catalog_items();
if(isset($_POST['item']))
{
    $shopping_cart_manager->add_to_cart($_POST['item']);
}

?>