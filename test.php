<?php

require __DIR__ . '/src/autoload.php';

$towel = new Towel;
$sunbed = new Sunbed;
$sunbed->reserveWith($towel);
var_dump($sunbed->isReserved());
