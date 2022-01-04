<?php
$arrayOfStrings = ["hans", 1];
if (!empty($arrayOfStrings)) {
    foreach($arrayOfStrings as $itemToTest) {
        if (!is_string($itemToTest)) {
            echo "Item found " . gettype($itemToTest);
            break;
        }
    }
}
