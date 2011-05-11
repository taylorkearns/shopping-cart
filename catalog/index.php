<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/get_catalog.php');
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.js"></script>
</head>



<body>
  
<h1>Browse Items</h1>

<section id="catalog">
    <?php if(isset($items) and count($items) >= 1): ?>
        <p>There are <?php echo(count($items)); ?> items to display.</p>
    <?php else: ?>
        <p>There are no catalog items to display.</p>
    <?php endif; ?>
</section> <!-- #catalog -->

  
    
<!-- scripts -->          
<script src="js/core.js"></script>
</body>
</html>