<?php
error_reporting(E_ALL);
include_once($_SERVER['DOCUMENT_ROOT'].'/catalog.php');
?>

<!doctype html>  

<head>
    <meta charset="utf-8">
    
    <title>Shopping Cart - Browse</title>
    <meta name="description" content="">
    <meta name="author" content="">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico">
    
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        body
        {
            font-family: Helvetica;
        }
        
        #catalog
        {
            width: 60%;
            float: left;
            margin-bottom: 50px;
        }
        
        #cart
        {
            font-size: 0.8em;
        }
        
        #cart table
        {
            width: 300px;
            margin-left: 60%;
            min-height: 200px;
            background: #eee;
        }
        
        tfoot
        {
            background: #ddd;
        }
        
        td
        {
            padding-top: 5px;            
        }
        
        th
        {
            text-align: left;
        }
        
        #debug
        {
            clear: left;
            border: 1px solid #ddd;
            padding: 5px;
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js"></script>
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
        if(isset($cart) and count($cart) > 0)
        {
            echo("<thead>\n<tr>\n<th>I</th>\n<th>P</th>\n</tr>\n</thead>"); // Header
            echo("<tfoot>\n<tr>\n<td>T</td>\n<td></td>\n</tr>\n</tfoot>"); // Totals
            echo("<tbody>");
            for($i = 0; $i < count($cart); $i++)
            {
                echo("<tr>\n<td>".$cart[$i]['name']."</td>\n<td>".$cart[$i]['price']."</td>\n</tr>");
            }
            echo("\n</tbody>");
        } 
        else
        {
            echo("Nada");
        } 
        ?>
        <!--
            <tr>
                <td>Lorem Ipsum Dolor</td>
                <td>8888.88</td>
            </tr>
            <tr>
                <td>Lorem Ipsum Dolor</td>
                <td>8888.88</td>
            </tr>
            <tr>
                <td>Lorem Ipsum Dolor</td>
                <td>8888.88</td>
            </tr>
            <tr>
                <td>Lorem Ipsum Dolor</td>
                <td>8888.88</td>
            </tr>
        -->
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