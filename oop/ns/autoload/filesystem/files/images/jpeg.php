<?php
namespace CloudStorage\FileSystem\Files\Images;
// $targetFile = dirname(__DIR__, 3) . '/autoload.php';
require_once dirname(__DIR__, 3) . '/autoload.php';

use \CloudStorage\FileSystem\Files\Contracts\ImageContracts;

class Jpeg implements ImageContracts {
    public function getResolution() {
        echo '1920x1080';
    }
}

$jpeg = new Jpeg();
$jpeg->getResolution();