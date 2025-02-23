<?php

namespace CloudStorage\FileSystem\Files\Images;

// require dirname(__DIR__, 3) . '/autoload.php';

use \CloudStorage\FileSystem\Files\Contracts\ImageContracts;
use \CloudStorage\Mail\Mailer;

class Jpeg implements ImageContracts {
    public function getResolution() {
        echo "1920x1080\n";

        (new Mailer())->sendMail(); //autoloading file from main.php
    }
}



