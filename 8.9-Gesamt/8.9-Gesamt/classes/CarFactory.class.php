<?php

/**
 * creates cars
 *
 * @author Thorsten Hallwas
 */
class CarFactory
{
    /**
     * create a car
     * @param string $name
     * @param array $decorators
     * @param EngineKit $engineKit
     * @return Car 
     */
    public static function createCar($name, $decorators = array(), $engineKit = null)
    {
        $car = new Car($name);
        foreach($decorators as $decorator) {
            $car = new $decorator($car);
        } if (is_object($engineKit)) {
            $car->insertEngine($engineKit);
        }
        return $car;
    }
}