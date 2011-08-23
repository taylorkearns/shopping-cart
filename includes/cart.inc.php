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