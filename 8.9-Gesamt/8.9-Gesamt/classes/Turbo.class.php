<?php
/**
 * turbo to boost the acceleration
 *
 * @author Thorsten Hallwas
 */
class Turbo extends CarDecorator
{

    /**
     * decorates the car with a turbo
     * @param Car $car
     */
    public function __construct($car)
    {
        parent::__construct($car, 'Turbo');
    }

    /**
     * the acceleration is 30% higher
     * @return float
     */
    public function getAcceleration()
    {
        return $this->car->getAcceleration() * 1.3;
    }

    /**
     * the max speed is 10% higher
     * @return float
     */
    public function getMaxSpeed()
    {
        return $this->car->getMaxSpeed() * 1.1;
    }

    /**
     * we use 30% more gas
     * @return float
     */
    public function getConsumptionPerKilometer()
    {
        return $this->car->getConsumptionPerKilometer() * 1.3;
    }

    /**
     * add 4000 Euros to the prize of the car
     * @return int
     */
    public function getCost()
    {
        return $this->car->getCost() + 4000;
    }


}