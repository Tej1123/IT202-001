
<?php
//Note: this is to resolve cookie issues with port numbers
$domain = $_SERVER["HTTP_HOST"];
if (strpos($domain, ":")) {
    $domain = explode(":", $domain)[0];
}
$localWorks = true; //some people have issues with localhost for the cookie params
//if you're one of those people make this false
//this is an extra condition added to "resolve" the localhost issue for the session cookie
if (($localWorks && $domain == "localhost") || $domain != "localhost") {
    session_set_cookie_params([
        "lifetime" => 60 * 60,
        "path" => "/Project",
        //"domain" => $_SERVER["HTTP_HOST"] || "localhost",
        "domain" => $domain,
        "secure" => true,
        "httponly" => true,
        "samesite" => "lax"
    ]);
    
}
session_start();
require_once(__DIR__ . "/../lib/functions.php");

?>
<style>
    body{
        margin: 0px;
        background-image: urL("https://i.pinimg.com/originals/38/0a/0c/380a0c2c7bc57319a389b17bf4bd7014.jpg");
        background-repeat: no-repeat;
        background-size: cover;

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
<nav>
    <ul id="display">
        <?php if (is_logged_in()) : ?>
            <li class='home'><a href="home.php">Home</a></li>
        <?php endif; ?>
        <?php if (!is_logged_in()) : ?>
            
            <li class='login'><a href="login.php">Login</a></li>
            <li class='register'><a href="register.php">Register</a></li>
        <?php endif; ?>
        <?php if (is_logged_in()) : ?>
            <li class ="shop"><a href="cart.php">Shop</a>
            <li class ="shop"><a href="create.php">Create Role</a>
            <li class ="shop"><a href="assign.php">Assign Role</a>
            <li class="profile"><a href="profile.php">Profile</a>
            <li class="order"><a href="order.php">Your Orders</a></li>
            <li class="logout"><a href="logout.php">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>
