<?php

/**
 * EngineKit class
 * used to demostrate Strategy
 *
 * @author Thorsten Hallwas
 */
abstract class EngineKit
{

    /**
     * name of the engine
     * @var string
     */
    protected $name = 'EngineKit';

    /**
     * acceleration provided in meter/second²
     * 0 - 100 in 8 seconds
     * @var float
     */
    protected $acceleration = 0.0;

    /**
     * consumption of the engery source per kilometer
     * @var float
     */
    protected $consumptionPerKilometer = 0.0;

    /**
     * cost in Euros for the engine kit
     * @var int
     */
    protected $cost = 0;

    /**
     * create a new engine with a given name
     * @param string $name
     */
    public function  __construct()
    {
        $this->name = get_class($this);
    }

    /**
     * set the name of this engine
     * @param String $name 
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * get the name of this engine
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * get the acceleration in meter/second²
     * @return float
     */
    public function getAcceleration()
    {
        return $this->acceleration;
    }

    /**
     * get the amount of the engery source used per kilometer
     * @return float
     */
    public function getConsumptionPerKilometer()
    {
        return $this->consumptionPerKilometer;
    }

    /**
     * get the prize of the engine in Euro
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

}