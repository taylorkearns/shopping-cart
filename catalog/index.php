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
    
    <link rel="stylesheet" href="../css/global.css"/>
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

<?php if(isset($cart) and count($cart) > 0): ?>
	<a href="/checkout-form" id="checkout">Checkout&nbsp;&#0187;</a>
<?php endif; ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/cart.inc.php'; ?>

<section id="debug">
    <p><strong>debug:</strong><br />
    $_SESSION['cart'] = <?php var_dump($_SESSION['cart']); ?><br />
    </p>
</section>

  
    
<!-- scripts -->          
<script src="js/core.js"></script>
</body>
</html>