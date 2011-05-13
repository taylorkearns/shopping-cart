<?php

class ShoppingCartManager
{
    function ShoppingCartManager()
    {
	    $database_connection = new DatabaseConnection();
	    if(!($database_connection->db_connect('127.0.0.1', 'root', 'mu113n')))
	    {
	        $error = "Unable to establish database connection. Error: ".mysql_error();
	        include($_SERVER['DOCUMENT_ROOT'].'/error.html.php');
	        exit();
	    }
	    else if(!(mysql_set_charset('utf8', $database_connection->connection)))
	    {
	        $error = "Unable to set database character encoding. Error: ".mysql_error();
	        include($_SERVER['DOCUMENT_ROOT'].'/error.html.php');
	        exit();
	    }
	    else if(!(mysql_select_db('shopping_cart', $database_connection->connection)))
	    {
	        $error = "Unable to select database. Error: ".mysql_error();
	        include($_SERVER['DOCUMENT_ROOT'].'/error.html.php');
	        exit();
	    }
    }
    
    function get_catalog_items()
    {
        $items = array();
        $query = 'SELECT * FROM catalog ORDER BY item_name';
        $result = mysql_query($query);
        if(mysql_num_rows($result) == 0)
        {
            return false;
        }
        else
        {
            $i = -1;
            while($row = mysql_fetch_assoc($result))
            {
                $i++;
                $items[$i] = array();
                $items[$i]['id'] = $row['id'];
                $items[$i]['name'] = $row['item_name'];
                $items[$i]['description'] = $row['item_description'];
                $items[$i]['price'] = $row['item_price'];
            }
        }
        return $items;
    }
    
    function add_items_to_session()
    {        
        if(isset($_POST['item']))
        {
            if(!isset($_SESSION['cart']))
            { 
                $_SESSION['cart'] = array(); 
            }
            array_push($_SESSION['cart'], $_POST['item']);
        }
    }
    
    function build_cart()
    {
        $cart_items = array();
        $cart_hash = array();  

        // Create hash of session cart items so that multiples of the same item get added to each other
        foreach($_SESSION['cart'] as $item)
        {
            $cart_hash[$item] = isset($cart_hash[$item]) ? $cart_hash[$item] + 1 : 1;
        }
        foreach($cart_hash as $key => $value)
        {
            $query = 'SELECT id, item_name, item_price FROM catalog WHERE id = '.$key;
            $result = mysql_query($query);
            while($row = mysql_fetch_array($result))
            {
                $cart_items[$key] = array();
                $cart_items[$key]['name'] = $row['item_name'];
                $cart_items[$key]['price'] = $row['item_price'];
                $cart_items[$key]['quantity'] = isset($cart_items[$key]) ? $cart_items[$key]['quantity'] + 1 : 1; 
            }
        }
        return $cart_items;
    }
}

?>