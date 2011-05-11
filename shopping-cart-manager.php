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
}

?>