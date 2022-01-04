<?php

/**
 * A turn as part of a track
 *
 * @author Thorsten Hallwas
 */
class Turn extends TrackPart
{
    /**
     * create a new turn
     * @param string $name
     * @param float $length
     */
    public function __construct($name, $length)
    {
        parent::__construct($name, $length);
        $this->turnLength = $length;
    }

    /**
     * drive a car on track starting with an initial speed
     * @param Car $car
     * @param float $initialSpeed
     * @param float $resultingSpeed
     * @return float time taken in seconds
     */
    public function driveOnTrack($car, $initialSpeed, &$resultingSpeed)
    {
        return $this->simulateDriveOnTrack($car, $car->getTurnSpeed(), $initialSpeed, $resultingSpeed);
    }

    /**
     * print the info of this track
     */
    public function printInfo()
    {
        print '<fieldset style=\"-moz-border-radius: 5px 5px 5px 5px;\"><table cellspadding=0 cellspacing=0><tr><td><img src="images/uturn_small.png"></td><td>';
        parent::printInfo();
        print '</td></tr></table></fieldset>';
    }
}