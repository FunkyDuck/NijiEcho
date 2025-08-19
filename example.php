<?php

require __DIR__ . '/vendor/autoload.php';

use FunkyDuck\NijiEcho\NijiEcho;

echo "\n--- NijiEcho : example file ---\n\n";

echo NijiEcho::text("Success !")->color('light_green') ."\n";

echo NijiEcho::text("CRITICAL ERROR !")->color('white')->background('red') . "\n";
echo NijiEcho::text("Custom text")->color('red')->background('yellow') . "\n";