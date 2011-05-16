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
    
    function add_to_cart($added_item_id)
    {
        $item_data = array();
        $query = 'SELECT id, item_name, item_description, item_price FROM catalog WHERE id = ' . $added_item_id;
        $result = mysql_query($query);
        while($row = mysql_fetch_assoc($result))
        {
            $item_data = array();
            $item_data['id'] = $row['id'];
            $item_data['name'] = $row['item_name'];
            $item_data['description'] = $row['item_description'];
            $item_data['price'] = $row['item_price'];
            $item_data['quantity'] = 1;
        }
        $this->add_item_to_session($item_data);
    }
    
    function add_item_to_session($item_data)
    {        
        if(!isset($_SESSION['cart']))
        { 
            $_SESSION['cart'] = array(); 
        }
        if(array_search($item_data['id'], $_SESSION['cart']))
        {
            
        }
        else
        {
            array_push($_SESSION['cart'], $item_data);
        }
    }
}

?>