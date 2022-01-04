<?php

require_once 'classes/CarBase.class.php';
require_once 'classes/Car.class.php';

require_once 'classes/CarDecorator.class.php';
require_once 'classes/Spoilerkit.class.php';
require_once 'classes/Turbo.class.php';
require_once 'classes/WideTires.class.php';
//require_once '.class.php';

$car = new Car('TestWagen');
$car->displayInformation();

$car = new Spoilerkit($car);
$car->displayInformation();

$car = new Turbo($car);
$car->displayInformation();

$car = new WideTires($car);
$car->displayInformation();