<?php
session_name('auth');
session_start(array(
    'cookie_lifetime' => 30
));

$passwordError = false;
$username =   "";
$password =   "";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username =   $_POST['username'];
    $password =   $_POST['password'];

    if ('21232f297a57a5a743894a0e4a801fc3' == md5($password)) {
        $_SESSION['loggedin'] = true;
        header("location: /auth.php");
    } else {
        $passwordError = true;
        $_SESSION['loggedin'] = false;
        session_destroy();
    }
}

if (isset($_POST['submit']) && $_POST['submit'] == 'logout') {
    $_SESSION['loggedin'] = false;
    session_destroy();
    header("location: /auth.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
    <title>Simple Auth</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Simple Auth Example</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eos quaerat omnis dolor, quam aperiam explicabo! Quisquam ut non eaque.</p>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php if (isset($_SESSION['loggedin']) && true == $_SESSION['loggedin']) {
                    echo ("<h3>Hello Admin, Welcome !</h3>");
                } else {
                    echo ("<h3>Hello Stranger, Login Below</h3>");
                } ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                if (true == $passwordError) {
                    echo "<blockquote>Username or Password Error !</blockquote>";
                }
                if (!isset($_SESSION['loggedin']) || false == $_SESSION['loggedin']) : ?>
                    <form action="/auth.php" method="POST">
                        <p>
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value=<?php echo $username; ?>>
                        </p>
                        <p>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" value=<?php echo $password; ?>>
                        </p>
                        <button type="submit" name="submit" class="btn-primary" value="login">Log In</button>
                    </form>
                <?php else : ?>
                    <form action="/auth.php" method="POST">
                        <button type="submit" name="submit" class="btn-primary" value="logout">Log Out</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>