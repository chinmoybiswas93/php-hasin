<?php
/*
Get the current directories list
*/

// $entries = scandir(__DIR__);
// print_r($entries1);

$entries = scandir(getcwd());
// print_r($entries);

foreach ($entries as $entry) {
    if ($entry != '.' && $entry != '..') {
        if (is_dir($entry)) {
            echo '[d] ' . $entry . PHP_EOL;
        } else {
            echo '[f] ' . $entry . PHP_EOL;
        }
    }
}


/*
Count the current directores list
*/

// $entries = scandir(getcwd());

function countDir($dir)
{
    $entries = scandir($dir);
    $dircount = 0;
    $filecount = 0;
    foreach ($entries as $entry) {
        if ($entry != '.' && $entry != '..') {
            if (is_dir($entry)) {
                $dircount++;
            } else {
                $filecount++;
            }
        }
    }
    return "$dircount directories and $filecount files";
}

echo countDir(getcwd());

