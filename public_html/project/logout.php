<?php
session_start();
session_unset();
session_destroy();
echo '<script> alert("You have successfully logged out!"); header("Location: login.php") </script>';
?>


