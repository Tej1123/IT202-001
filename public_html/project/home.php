
<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<?php 
if (is_logged_in()) {
    echo '<h1>'."Welcome, " . get_user_email().'</h1>';

} else {
    echo '<script>alert("You are not logged in")</script>';
}
//shows session info
//echo "<pre>" . var_export($_SESSION, true) . "</pre>"; 
?> 
<style>
    body{
        background-size: cover;
        color: white;
        background-position: center;
        background-image: url("https://i.pinimg.com/originals/38/0a/0c/380a0c2c7bc57319a389b17bf4bd7014.jpg");
    }
</style>