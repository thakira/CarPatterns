<?php
/**
 * Adaption of an Electro - engine - kit
 *
 * @author Thorsten Hallwas
 */
class SolarPoweredElectroEngineKit extends EngineKit
{
    /**
     * electro engine
     * @var SolarPoweredElectroEngine
     */
    protected $electroEngine = null;

    /**
     * creates a new adapter for an electro engine
     */
    public function __construct()
    {
        $this->electroEngine = new SolarPoweredElectroEngine();
    }

    /**
     * get the acceleration in meter/second²
     * convert acceleration to float
     * @return float
     */
    public function getAcceleration()
    {
        return $this->electroEngine->getAcceleration() * 1.0;
    }

    /**
     * solar powered => no consumption
     * @return float
     */
    public function getConsumptionPerKilometer()
    {
        return 0.0;
    }

    /**
     * get the prize of the engine - kit in Euro
     * @return float
     */
    public function getCost()
    {
        return $this->electroEngine->getCharge();
    }

    /**
     * get the name of the engine - kit
     * @return string
     */
    public function getName()
    {
        return $this->electroEngine->getLabel();
    }

}