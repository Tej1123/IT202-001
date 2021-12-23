<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<style>
     .register-page{
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
        padding: 8px;
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
        font-size: 20px;
    }

    
    button:hover{
        background: red;
    }
</style>
<div class="register-page">
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email or Username</label>
        <input type="email" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" name="confirm" required minlength="8" />
    </div>
    <button type="submit" value="Register" />Register</button>
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
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se(
        $_POST,
        "confirm",
        "",
        false
    );
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        echo "Email must not be empty";
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        echo "Invalid email address";
        $hasError = true;
    }
    if (empty($password)) {
        echo "password must not be empty";
        $hasError = true;
    }
    if (empty($confirm)) {
        echo "Confirm password must not be empty";
        $hasError = true;
    }
    if (strlen($password) < 8) {
        echo "Password too short";
        $hasError = true;
    }
    if (strlen($password) > 0 && $password !== $confirm) {
        echo '<script>alert("Password must match")</script>';
        $hasError = true;
    }
    if (!$hasError) {
        echo "Welcome, $email";
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password) VALUES(:email, :password)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash]);
            echo "Successfully registered!";
        } catch (Exception $e) {
            echo "There was a problem registering";
            "<pre>" . var_export($e, true) . "</pre>";
        }
    }
}
?>