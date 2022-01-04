<?php

/**
 * wider tires for more stability in turns
 *
 * @author Thorsten Hallwas
 */
class WideTires extends CarDecorator
{

    public function __construct($car)
    {
        parent::__construct($car, 'Wide - Tires');
    }

    /**
     * the tires increase the turnspeed
     * @return float
     */
    public function getTurnSpeed()
    {
        return $this->car->getTurnSpeed() * 1.1;
    }

    /**
     * add 1000 Euros to the prize of the car
     * @return int
     */
    public function getCost()
    {
        return $this->car->getCost() + 1000;
    }

    /**
     * we use 5% more gas
     * @return float
     */
    public function getCostsPerKilometer()
    {
        return $this->car->getCostsPerKilometer() * 1.05;
    }

}