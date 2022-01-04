<?php
/**
 * decorates the car with a spoilerkit
 *
 * @author Thorsten Hallwas
 */
class Spoilerkit extends CarDecorator
{

    /**
     * create a new spoilerkit-decorator
     * @param Car $car
     */
    public function __construct($car)
    {
        parent::__construct($car, 'Spoiler-kit');
    }

    /**
     * the cars max speed is decresed due to the higher resitance
     * @return float
     */
    public function getMaxSpeed()
    {
        return $this->car->getMaxSpeed() * 0.9;
    }

    /**
     * the spoilers increase the turnspeed
     * @return float
     */
    public function getTurnSpeed()
    {
        return $this->car->getTurnSpeed() * 1.2;
    }

    /**
     * add 2000 Euros to the prize of the car
     * @return int
     */
    public function getCost()
    {
        return $this->car->getCost() + 2000;
    }

    /**
     * we use 5% more gas
     * @return float
     */
    public function getConsumptionPerKilometer()
    {
        return $this->car->getConsumptionPerKilometer() * 1.05;
    }

}