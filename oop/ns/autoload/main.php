<?php
namespace CloudStorage;
require_once 'autoload.php';

use \CloudStorage\Mail\Mailer;
use \CloudStorage\FileSystem\Files\Images\Jpeg;
class Main
{
    public function __construct()
    {
        $mailer = new Mailer(); //autoloading file from main.php
        $mailer->sendMail();

        echo "\n";

        $jpeg = new Jpeg(); //autoloading file from main.php
        $jpeg->getResolution();

    }
}

// $main = new Main();
