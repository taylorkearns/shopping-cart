<?php

class ShoppingCartManager
{
    function ShoppingCartManager()
    {
	    $database_connection = new DatabaseConnection();
	    if(!($database_connection->db_connect('127.0.0.1', 'root', 'ord403')))
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
    
    function create_cart_item($added_item_id)
    {
        $cart = $_SESSION['cart'];
        if(sizeof($cart) == 0)
        { 
            $cart = array(); 
        }
        
        $query = 'SELECT id, item_name, item_description, item_price FROM catalog WHERE id = ' . $added_item_id;
        $result = mysql_query($query);
        $item_data = array();
        while($row = mysql_fetch_assoc($result))
        {
            $item_data['id'] = $row['id'];
            $item_data['name'] = $row['item_name'];
            $item_data['description'] = $row['item_description'];
            $item_data['price'] = $row['item_price'];
            $item_data['quantity'] = 1;
        }
        
        $cart = $this->add_item_to_cart($cart, $item_data);
        $_SESSION['cart'] = $cart;
        
        return $cart;
    }
    
    function add_item_to_cart($cart, $item_data)
    {        
        $in_cart = FALSE;
        for($i = 0; $i < sizeof($cart); $i++)
        {
            if($cart[$i]['id'] == $item_data['id'])
            {
                $prev_quantity = intval($cart[$i]['quantity']);
                $new_quantity = $prev_quantity + intval($item_data['quantity']);
                $cart[$i]['quantity'] = $new_quantity;
                $in_cart = TRUE;
                break;
            }
        }
        if($in_cart == FALSE)
        {
            array_push($cart, $item_data);
        }
        
        return $cart;
    }    

	function remove_cart_item($removed_item_id)
	{
		$cart = $_SESSION['cart'];
		$removed_item;
		for($i = 0; $i < sizeof($cart); $i++)
		{
			if($cart[$i]['id'] == $removed_item_id)
			{
				$cart[$i]['quantity'] = 0;
				break;
			}
		}
		
		$_SESSION['cart'] = $cart;
		return $cart;
	}
    
    function return_cart()
    {
        if(isset($_SESSION['cart']))
        {
            $cart = $_SESSION['cart'];
        }
        else
        {
            $cart = $_SESSION['cart'] = array();
        }
        
        return $cart;
    }
}

?>























