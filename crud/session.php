<?php
session_start(array(
    'cookie_lifetime' => 300,
));


$_SESSION['loggedin'] = false;
$_SESSION['user'] = false;
$_SESSION['role'] = false;
