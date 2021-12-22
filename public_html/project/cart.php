
<?php

?>
<nav>
    <ul>
        <li  id = "logout" class="rate"><a href="home.php">Home</a></li>    
        <li class="rate"><a href="#Rate.php">Rate your product</a></li>
        <li class="rate"><a href="purchase.php">Purchase history</a></li>
        <li id = "product detail" class="rate"><a href="#">Product detail</a></li>  
        <li  id = "logout" class="rate"><a href="order.php">Your Order</a></li>
        <li  id = "logout" class="rate"><a href="#purchase.php">Product stock</a></li>
       
        <li  id = "logout" class="rate"><a href="shop.php">Cart</a></li>
        <li  id = "logout" class="rate"><a href="logout.php">Logout</a></li>

        

    </ul>
</nav>

<style>
    body{
        background-size: cover;
        color: white;
        background-position: center;
        background-image: url("https://i.pinimg.com/originals/38/0a/0c/380a0c2c7bc57319a389b17bf4bd7014.jpg");
    }
    nav ul{
        margin: 0;
        padding: 0;
        list-style: none;
    }
    
    /*nav{
        list-style-type: none;
        margin: 0;
        padding: 0;
        background-color: black;

    }*/
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        padding-left: 50%;
        overflow: hidden;
        background-color: #333333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 16px;
        text-decoration: none;
    }

</style>