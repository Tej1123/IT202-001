<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<style>
    .login-page{
        width: 360px;
        padding: 10% 0 0;
        margin: auto;
    }
    .Form{
    
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
        width: 100%;
        border: 0;
        margin: 0 0 15px;
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
        background: white;
        width: 100%;
        border: 0;
        padding: 10px;
        color: black;
        font-size: 15px;
    }
    button:hover{
        background: #43A047;
    }
</style>
<div class = "login-page">
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email or Username</label>
        <input type="email" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <button type="submit" value="Login" />Login</button>
</form>
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        return true;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $username = se($_POST,"username","",false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        echo "Email or username must not be empty";
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        echo "Invalid email address or username";
        $hasError = true;
    }
    if (empty($password)) {
        echo "password must not be empty";
        $hasError = true;
    }
    if (strlen($password) < 8) {
        echo "Password too short";
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT email, password from Users where email = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        echo "Weclome $email";
                        $_SESSION["user"] = $user;
                        die(header("Location: home.php"));
                    } else {
                        echo "Invalid password";
                    }
                } else {
                    echo "Email not found";
                }
            }
        } catch (Exception $e) {
            echo "<pre>" . var_export($e, true) . "</pre>";
        }
    }
}
?>