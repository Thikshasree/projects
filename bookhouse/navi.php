<?php

// to count items in the cart
$cartItemCount = count($_SESSION['cart']);
?>
<div class='navi'>
    <a href='index.php' class='customButton'>Home</a>
    <a href='Products.php' class='customButton'>View Products</a>
    <a href='Cart.php' class='customButton'>View Cart <?php echo "({$cartItemCount})"; ?></a>
</div>