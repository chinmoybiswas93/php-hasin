<?php
$userinput = 'Chinnoy Biswas';
echo "UserInput: $userinput\n";
echo '<a href="mycgi?foo=', urlencode($userinput), '">';
?>