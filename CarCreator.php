<?php

require_once 'classes/CarBase.class.php';
require_once 'classes/Car.class.php';

require_once 'classes/CarDecorator.class.php';
require_once 'classes/SpoilerKit.class.php';
require_once 'classes/Turbo.class.php';
require_once 'classes/WideTires.class.php';
require_once 'classes/ChipTuning.class.php';
require_once 'classes/ChassisWidening.class.php';

require_once 'classes/EngineKit.class.php';
require_once 'classes/EthanolEngineKit.class.php';
require_once 'classes/GasEngineKit.class.php';

require_once 'classes/CarObserver.class.php';
require_once 'classes/BreakObserver.class.php';

$car = new Car('TestWagen');
$car->displayInformation();

$gasEngineKit = new GasEngineKit();
$car->insertEngine($gasEngineKit);
$car->displayInformation();

$car->removeEngine();

$ethanolEngineKit = new EthanolEngineKit();
$car->insertEngine($ethanolEngineKit);
$car->displayInformation();

$car = new Spoilerkit($car);
$car->displayInformation();

$car = new Turbo($car);
$car->displayInformation();

$car = new WideTires($car);
$car->displayInformation();

$car = new ChipTuning($car);
$car->displayInformation();

$car = new ChassisWidening($car);
$car->displayInformation();

$bo = new BreakObserver();
$car->attachObserver($bo);

print '<br>Testfahrt... ';
print '<br>Gesamtkilometer: ' . $car->drive(1000.0);