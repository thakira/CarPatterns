<?php

require_once 'classes/CarBase.class.php';
require_once 'classes/Car.class.php';
require_once 'classes/CarFactory.class.php';
require_once 'classes/EngineKitFactory.class.php';

require_once 'classes/EngineKit.class.php';
require_once 'classes/GasEngineKit.class.php';
require_once 'classes/DieselEngineKit.class.php';
require_once 'classes/SolarPoweredElectroEngine.class.php';
require_once 'classes/SolarPoweredElectroEngineKit.class.php';
require_once 'classes/HydrogenEngine.class.php';
require_once 'classes/HydrogenEngineKit.class.php';


require_once 'classes/CarDecorator.class.php';
require_once 'classes/Spoilerkit.class.php';
require_once 'classes/WideTires.class.php';
require_once 'classes/Turbo.class.php';
require_once 'classes/ChipTuning.class.php';

require_once 'classes/TrackPart.class.php';
require_once 'classes/StraightLine.class.php';
require_once 'classes/Track.class.php';
require_once 'classes/Turn.class.php';

require_once 'classes/CarProxy.class.php';
require_once 'classes/Log.class.php';

$decorators    = (!empty($_POST['decorators']) ? $_POST['decorators'] : array());
$engineKitName = (!empty($_POST['enginekit']) ? $_POST['enginekit'] : 'GasEngineKit');
$carName       = (!empty($_POST['carname']) ? $_POST['carname'] : 'TestCar');
$tracks        = (!empty($_POST['tracks']) ? $_POST['tracks'] : array());
if (!empty($_POST)) {
    $engineKit = EngineKitFactory::createEngineKit($engineKitName);
    $car = CarFactory::createCar($carName, $decorators, $engineKit);
    $car->displayInformation();

    $car = new CarProxy($car);
    $raceTrack = new Track('RaceTrack', 0);

    foreach($tracks as $track) {
        if (strpos($track, '_')) {
            $trackInfo = explode('_', $track);
            $tempTrack = new $trackInfo[0]($track, $trackInfo[1]);
            $raceTrack->addTrack($tempTrack);
        }
    }

    $raceTrack->printInfo();
    printf("Time for {$raceTrack->getName()}: %.2f s<br>", $raceTrack->driveOnTrack($car, 0, $resultingSpeed));
    printf("Fuel refilled: %.2f liters" , $car->getEnergySourceRefilled());
    $car->displayInformation();
}
?>

<form action="alltogether.php" method="post">
    Decorators:
    <select name="decorators[]" multiple="multiple">
        <option <?php if (in_array('ChipTuning', $decorators)) print 'selected'; ?> >ChipTuning</option>
        <option <?php if (in_array('Spoilerkit', $decorators)) print 'selected'; ?> >Spoilerkit</option>
        <option <?php if (in_array('Turbo', $decorators)) print 'selected'; ?> >Turbo</option>
        <option <?php if (in_array('WideTires', $decorators)) print 'selected'; ?> >WideTires</option>
    </select>
    EngineKit:
    <select name="enginekit">
        <option <?php if ($engineKitName == 'GasEngineKit') print 'selected'; ?> >GasEngineKit</option>
        <option <?php if ($engineKitName == 'DieselEngineKit') print 'selected'; ?> >DieselEngineKit</option>
        <option <?php if ($engineKitName == 'SolarPoweredElectroEngineKit') print 'selected'; ?> >SolarPoweredElectroEngineKit</option>
        <option <?php if ($engineKitName == 'HydrogenEngineKit') print 'selected'; ?> >HydrogenEngineKit</option>
    </select>
    Name:
    <input type="text" name="carname" value="<?php print $carName ?>">
    <select name="tracks[]" multiple="multiple">
        <option value="StraightLine_2" <?php if (in_array('StraightLine_2', $tracks)) print 'selected'; ?> >Straight 2 km</option>
        <option value="Turn_2" <?php if (in_array('Turn_2', $tracks)) print 'selected'; ?> >Turn 2 km</option>
        <option value="StraightLine_10" <?php if (in_array('StraightLine_10', $tracks)) print 'selected'; ?> >Straight 10 km</option>
        <option value="Turn_10" <?php if (in_array('Turn_10', $tracks)) print 'selected'; ?> >Turn 10 km</option>
        <option value="StraightLine_50" <?php if (in_array('StraightLine_50', $tracks)) print 'selected'; ?> >Straight 50 km</option>
        <option value="Turn_50" <?php if (in_array('Turn_50', $tracks)) print 'selected'; ?> >Turn 50 km</option>
        <option value="StraightLine_100" <?php if (in_array('StraightLine_100', $tracks)) print 'selected'; ?> >Straight 100 km</option>
        <option value="Turn_100" <?php if (in_array('Turn_100', $tracks)) print 'selected'; ?> >Turn 100 km</option>
        <option value="StraightLine_200" <?php if (in_array('StraightLine_200', $tracks)) print 'selected'; ?> >Straight 200 km</option>
        <option value="Turn_200" <?php if (in_array('Turn_200', $tracks)) print 'selected'; ?> >Turn 200 km</option>
    </select>
    <input type="submit">
</form>