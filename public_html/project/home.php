
<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Home</h1>
<?php
if (is_logged_in()) {
    echo "Welcome, " . get_user_email();
} else {
    echo "You're not logged in";
}
//shows session info
echo "<pre>" . var_export($_SESSION, true) . "</pre>";
?>

<style>
    body{
        background-size: cover;
        background-position: center;
        background-image: url("https://i.pinimg.com/originals/38/0a/0c/380a0c2c7bc57319a389b17bf4bd7014.jpg");
    }
</style>