<?php

require_once 'classes/CarBase.class.php';
require_once 'classes/Car.class.php';

require_once 'classes/EngineKit.class.php';
require_once 'classes/GasEngineKit.class.php';
require_once 'classes/DieselEngineKit.class.php';


$car = new Car('Testwagen');
$gasEngineKit = new GasEngineKit();
$car->insertEngine($gasEngineKit);
$car->displayInformation();

$car->removeEngine();
$dieselEngineKit = new DieselEngineKit();
$car->insertEngine($dieselEngineKit);
$car->displayInformation();
