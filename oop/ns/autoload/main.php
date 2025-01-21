<?php
namespace CloudStorage;

require_once 'autoload.php';

use \CloudStorage\Mail\Mailer;
use \CloudStorage\FileSystem\Files\Images\Jpeg;
class Main
{
    public function __construct()
    {
        $mailer = new Mailer();
        $mailer->sendMail();

        echo "\n";

        $jpeg = new Jpeg();

        // var_dump($jpeg);
        $jpeg->getResolution();

    }
}

$main = new Main();
