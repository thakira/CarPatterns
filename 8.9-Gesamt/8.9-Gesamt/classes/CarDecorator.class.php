<?php

/**
 * Decorator for the car
 *
 * @author Thorsten Hallwas
 */
abstract class CarDecorator extends CarBase
{
    /**
     * instance of a car
     * @var Car
     */
    protected $car = null;

    /**
     * construct a new car decorator
     * @param Car $car
     * @param string $name
     */
    public function __construct($car, $name)
    {
        $this->car  = $car;
        $this->name = $name;
    }

    /**
     * get the max speed meter/seconds
     * @return float
     */
    public function getMaxSpeed()
    {
        return $this->car->getMaxSpeed();
    }

    /**
     * get the speed which the car uses through a turn
     * meter/seconds
     * @return float
     */
    public function getTurnSpeed()
    {
        return $this->car->getTurnSpeed();
    }

    /**
     * get the acceleration in meter/seconds²
     * @return float
     */
    public function getAcceleration()
    {
        return $this->car->getAcceleration();
    }

    /**
     * get the deceleration in meter/seconds²
     * @return float
     */
    public function getDeceleration()
    {
        return $this->car->getDeceleration();
    }

    /**
     * get the prize of the car in Euro
     * @return float
     */
    public function getCost()
    {
        return $this->car->getCost();
    }

    /**
     * add the decorator name to the car name
     * @return string
     */
    public function getName()
    {
        return $this->car->getName() . ' + ' . $this->name;
    }

    /**
     * get the amount of the engery source used per kilometer
     * @return float
     */
    public function getConsumptionPerKilometer()
    {
        return $this->car->getConsumptionPerKilometer();
    }

    /**
     * all not decorated functions are routed to the car
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $return = false;
        if (method_exists($this->car, $name)) {
            $return = call_user_func_array(array($this->car, $name), $arguments);
        } else {
            $return = $this->car->__call($name, $arguments);
        }
        return $return;
    }
}