<?php

include 'libs/load.php';
$re = Doctors::listSpecial();

$d = Doctors::getLastDocId();
$d = Doctors::DocID_increment($d);

print($d);
?>

