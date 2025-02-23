<?php

spl_autoload_register(function ($class_name) {
    include "{$class_name}.php";
});


// Now you can create instances of Bike and Planet
$bike = new Bike('Pulsar');
$planet = new Planet('Earth');

$bike->ride();
$planet->getname();


echo "\n___End of the file___";