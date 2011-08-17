<?php
error_reporting(E_ALL);
include_once($_SERVER['DOCUMENT_ROOT'].'/catalog.php');
?>

<!DOCTYPE HTML>  

<head>
    <meta charset="utf-8">
    
    <title>Shopping Cart - Browse</title>
    <meta name="description" content="">
    <meta name="author" content="">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico">
    
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        body { font-family: Helvetica; }
        #catalog { width: 60%; float: left; margin-bottom: 50px; }
        #cart { font-size: 0.8em; }
        #cart table { width: 300px; margin-left: 60%; min-height: 200px; background: #eee; }
        tr.total { background: #ddd; font-weight: 600; }
        td { padding: 5px; }
        th { text-align: left; white-space: nowrap; padding: 5px; }        
        #debug { clear: left; border: 1px solid #ddd; padding: 5px; }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js"></script>
</head>



<body>
  
<!-- <h1>Catalog</h1> -->

<section id="catalog">
    <?php if(isset($items) and count($items) >= 1): ?>
        <?php for($i = 0; $i < count($items); $i++): ?>
        	<li>
            	<strong><?php echo($items[$i]['name']); ?></strong><br />
            	$<?php echo($items[$i]['price']); ?><br />
            	<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                    <input type="hidden" name="item" value="<?php echo($items[$i]['id']); ?>" />
                    <input type="submit" class="add-to-cart" value="Add to cart" />
            	</form>
            	<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
					<input type="hidden" name="removed_item" value="<?php echo($items[$i]['id']); ?>" />
                    <input type="submit" class="remove-from-cart" value="Remove from cart" />
            	</form>
        	</li>
        <?php endfor; ?>
    <?php else: ?>
        <p>There are no items to display.</p>
    <?php endif; ?>
</section> <!-- #catalog -->

<section id="cart">
	<!-- <h2>Cart</h2> -->
	<table>
		<?php
		$total_cart_cost = 0;
		
		if(isset($cart) and count($cart) > 0)
		{
			echo('<thead><tr><th>Item Name</th><th>Item Price</th><th>Quantity</th><th>Total Price</th></tr></thead>');
			echo('<tbody>');
			for($i = 0; $i < count($cart); $i++)
			{
				if($cart[$i]['quantity'] > 0)
				{
					$total_item_cost = $cart[$i]['price'] * $cart[$i]['quantity'];
					$total_cart_cost += $total_item_cost;
				
					echo('<tr><td>' . $cart[$i]['name'] 
					. '</td><td>$' . $cart[$i]['price'] 
					. '</td><td>' . $cart[$i]['quantity']
					. '</td><td>$' . number_format($total_item_cost, 2) 
					. '</td></tr>');
				}
				else
				{
					continue;
				}
			}
			echo('<tr class="total"><td>Total Amount</td><td></td><td></td><td>$' . number_format($total_cart_cost, 2) . '</td></tr>');
			echo('</tbody>');
		} 
		else
		{
			echo("Cart is empty.");
		} 
		?>
	</table>
</section>

<section id="debug">
    <p><strong>debug:</strong><br />
    $_SESSION['cart'] = <?php var_dump($_SESSION['cart']); ?><br />
    </p>
</section>

  
    
<!-- scripts -->          
<script src="js/core.js"></script>
</body>
</html>