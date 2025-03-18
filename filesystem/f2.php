<?php
$enties = opendir(getcwd());
while ($entry = readdir($enties)) {
    echo $entry . "\n";  
}