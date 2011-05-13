<?php  

session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/dbconnect.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/shopping-cart-manager.php');

$shopping_cart_manager = new ShoppingCartManager();
$items = $shopping_cart_manager->get_catalog_items();

// Session cookies for storing cart items
if(isset($_POST['item']))
{
    if(!isset($_SESSION['cart']))
    { 
        $_SESSION['cart'] = array(); 
    }
    array_push($_SESSION['cart'], $_POST['item']);
    $cart_hash = array();
    foreach($_SESSION['cart'] as $item)
    {
        $cart_hash[$item] = isset($cart_hash[$item]) ? $cart_hash[$item] + 1 : 1;
    }
}

?>