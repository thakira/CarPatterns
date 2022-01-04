<?php

/**
 * Base class for a car
 *
 * @author Thorsten Hallwas
 */
abstract class CarBase
{

    /**
     * Name of the car
     * @param string $name 
     */
    protected $name = '';

    /**
     * create a new car
     * @param string $name
     */
    public function  __construct($name)
    {
        $this->name = $name;
    }

    /**
     * get the max speed meter/seconds
     * @return float
     */
    abstract public function getMaxSpeed();

    /**
     * get the speed which the car uses through a turn
     * meter/seconds
     * @return float
     */
    abstract public function getTurnSpeed();

    /**
     * get the acceleration in meter/seconds²
     * @return float
     */
    abstract public function getAcceleration();

    /**
     * get the deceleration(brakes) for this car
     * @return float
     */
    abstract public function getDeceleration();

    /**
     * get the prize of the car in Euro
     * @return int
     */
    abstract public function getCost();

    /**
     * get the consumption of the energy source per kilometer
     * @return float
     */
    abstract public function getConsumptionPerKilometer();

    /**
     * get a sum up of the car
     */
    public function displayInformation()
    {
        print '<table cellspacing=2>';
        print '<tr><td align=right>Prize:</td><td>' . $this->getCost() . ' 	&euro;</td></tr>';
        print '<tr><td align=right>Name:</td><td>'	. $this->getName() . '</td></tr>';
        printf('<tr><td align=right>Acceleration:</td><td>%.2f m/s&sup2;</td></tr>' , $this->getAcceleration());
        printf('<tr><td align=right>0-100km/h:</td><td>%.2f s</td></tr>', (27.78 / $this->getAcceleration()));
        printf('<tr><td align=right>Max-Speed:</td><td>%.2f m/s</td></tr>' , $this->getMaxSpeed());
        printf('<tr><td align=right>Turn-Speed:</td><td>%.2f m/s</td></tr>' , $this->getTurnSpeed());
        printf('<tr><td align=right>TankStatus:</td><td>%.2f Liter</td></tr>' , $this->getTankStatus());
        printf('<tr><td align=right>Consumption:</td><td>%.2f Liter/km</td></tr>' , $this->getConsumptionPerKilometer());
        print '</table>';
        print '<hr>';
    }
}