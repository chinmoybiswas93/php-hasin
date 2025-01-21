<?php

$cars=array("Volvo","BMW","Toyota","Honda","Mercedes","Opel");
$chunk = array_chunk($cars,4);
print_r($chunk[1]);