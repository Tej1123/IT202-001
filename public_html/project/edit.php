
<?php
/*
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    function getDB(){
        global $db;
        //this function returns an existing connection or creates a new one if needed
        //and assigns it to the $db variable
        if(!isset($db)) {
            try{
                //__DIR__ helps get the correct path regardless of where the file is being called from
                //it gets the absolute path to this file, then we append the relative url (so up a directory and inside lib)
                require_once(__DIR__. "/config.php");//pull in our credentials
                //use the variables from config to populate our connection
                $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
                //using the PDO connector create a new connect to the DB
                //if no error occurs we're connected
                $db = new PDO($connection_string, $dbuser, $dbpass);
            //the default fetch mode is FETCH_BOTH which returns the data as both an indexed array and associative array
            //we'll override the default here so it's always fetched as an associative array
             $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
           catch(Exception $e){
                var_export($e);
                $db = null;
            }
        }
        return $db;
    }
    
    
    $BASE_PATH = '/Project/';//This is going to be a helper for redirecting to our base project path since it's nested in another folder
    function se($v, $k = null, $default = "", $isEcho = true) {
        if (is_array($v) && isset($k) && isset($v[$k])) {
            $returnValue = $v[$k];
        } else if (is_object($v) && isset($k) && isset($v->$k)) {
            $returnValue = $v->$k;
        } else {
            $returnValue = $v;
            //added 07-05-2021 to fix case where $k of $v isn't set
            //this is to kep htmlspecialchars happy
            if (is_array($returnValue) || is_object($returnValue)) {
                $returnValue = $default;
            }
        }
        if (!isset($returnValue)) {
            $returnValue = $default;
        }
        if ($isEcho) {
            //https://www.php.net/manual/en/function.htmlspecialchars.php
            echo htmlspecialchars($returnValue, ENT_QUOTES);
        } else {
            //https://www.php.net/manual/en/function.htmlspecialchars.php
            return htmlspecialchars($returnValue, ENT_QUOTES);
        }
    }
    //TODO 2: filter helpers
    function sanitize_email($email = "") {
        return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    }
    function is_valid_email($email = "") {
        return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
    }
    //TODO 3: User Helpers
    function is_logged_in() {
        return isset($_SESSION["user"]); //se($_SESSION, "user", false, false);
    }
    function has_role($role) {
        if (is_logged_in() && isset($_SESSION["user"]["roles"])) {
            foreach ($_SESSION["user"]["roles"] as $r) {
                if ($r["name"] === $role) {
                    return true;
                }
            }
        }
        return false;
    }
    function get_username() {
        if (is_logged_in()) { //we need to check for login first because "user" key may not exist
            return se($_SESSION["user"], "username","", false);
        }
        return "";
    }
    function get_user_email() {
        if (is_logged_in()) { //we need to check for login first because "user" key may not exist
            return se($_SESSION["user"], "email", "", false);
           // return "";
        }
        //return "";
    }
    function get_user_id() {
        if (is_logged_in()) { //we need to check for login first because "user" key may not exist
            return se($_SESSION["user"], "id", false, false);
        }
        return false;
    }
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
    
*/   

?>
<body>
<nav>
    <ul>
        <li  id = "home" class="rate"><a href="home.php">Home</a></li>    
        <li class="rate"><a href="#Rate.php">Profile</a></li>
        
        <li id = "shop" class="rate"><a href="#">Shop</a></li>  
        <li  id = "logout" class="rate"><a href="logout.php">Logout</a></li>
        

    </ul>
</nav>

    <div class = "profile-page">
    <form onsubmit="" method="POST">
        <div>
            <label for="email">Change Email: </label>
            <input type="email" name="email" required />
        </div>
        <div>
            <label for="username">Change Username: </label>
            <input type="username" name="username" required/>
        </div>
        <div>
            <label for="pw">Change Password: </label>
            <input type="password" id="pw" name="password" required minlength="8" />
        </div>
        <button type="submit" value="Login" >Save changes</button> </form> </div>
        <button id ="private" type="Private" value="Private" >Make account Private</button> </form> </div>

<style>

    

    body{
        background-image: url("https://i.pinimg.com/originals/38/0a/0c/380a0c2c7bc57319a389b17bf4bd7014.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
        text-align: center;
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
    
    .login-page{
        width: 360px;
        padding: 10% 0 0;
        margin: auto;
    }
    .Form{
        padding-bottom: 50%;
        position: relative;
        z-index: 1;
        background: rgb(75,74,74);
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
    }
    input{
    
        font-family:Georgia, 'Times New Roman', Times, serif;
        outline: 1;
        background: #f2f2f2;
        width: 25%;
        border: 50;
        margin: 0 0 20px;
        padding: 10px;
        box-sizing: border-box;
        font-size: 14px;
    }
    label{
        display: inline-block;
        text-align: right;
        color: white;
    }
    
    button{
        font-family:Georgia, 'Times New Roman', Times, serif;
        text-transform: uppercase;
        outline: 0;
        padding-bottom: 30px;
        background: #333333;
        width: 15%;
        border: 0;
        padding: 12px;
        color: whitesmoke;
        font-size: 15px;
    }
    button #private{ 
        font-family:Georgia, 'Times New Roman', Times, serif;
        text-transform: uppercase;
        outline: 0;
        padding-bottom: 30px;
        background: white;
        width: 100%;
        border: 0;
        padding: 30px;
        color: black;
        font-size: 15px;
    }
    button:hover{
        background: cyan;
    }
    #private:hover{
        background: lightpink;
    }
</style>
</body>

