<?php

require __DIR__ . '/vendor/autoload.php';

use FunkyDuck\NijiEcho\NijiEcho;

echo "\n--- NijiEcho : example file ---\n\n";


echo NijiEcho::text("Success !")->color('light_green') ."\n";
echo NijiEcho::text("CRITICAL ERROR !")->color('white')->background('red') . "\n";
echo NijiEcho::text("Custom text")->color('red')->background('yellow') . "\n";
echo NijiEcho::text("Color yours texts with NijiEcho :-)")->color('light_purple')->background('light_gray') . "\n\n";

echo "--- NijiEcho : Formated functions ---\n\n";

echo NijiEcho::success("Success preformatted") . "\n";
echo NijiEcho::error("Error preformatted") . "\n";
echo NijiEcho::warning("Warning preformatted") . "\n";
echo NijiEcho::info("info Preformatted") . "\n";