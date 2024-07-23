<?php

session_start(array(
    'cookie_lifetime' => 300,
));

$passwordError = false;

$username =   filter_input(INPUT_POST, 'username', FILTER_DEFAULT);
$password =   filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

$fp = fopen("./data/users.txt", 'r');

if ($username && $password) {

    $_SESSION['loggedin'] = false;
    $_SESSION['user'] = false;
    $_SESSION['role'] = false;

    while ($data = fgetcsv($fp)) {
        if ($data[0] == $username && $data[1] == md5($password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $username;
            $_SESSION['role'] = $data[2];
            header("location: /index.php");
        }
    }
    if (!$_SESSION['loggedin']) {
        $passwordError = true;
    }
}

if (isset($_GET['logout'])) {

    $_SESSION['loggedin'] = false;
    $_SESSION['user'] = false;
    $_SESSION['role'] = false;
    session_destroy();
    header("location: /index.php");
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
                            <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
                        </p>
                        <p>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
                        </p>
                        <button type="submit" name="submit" class="btn-primary" value="login">Log In</button>
                    </form>
                <?php else : ?>
                    <form action="/auth.php?logout=true" method="POST">
                        <button type="submit" name="submit" class="btn-primary" value="logout">Log Out</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>