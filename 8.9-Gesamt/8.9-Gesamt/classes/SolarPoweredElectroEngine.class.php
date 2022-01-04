<?php
/**
 * Engine - kit using an electro-engine
 *
 * @author Thorsten Hallwas
 */
class SolarPoweredElectroEngine
{
    protected $label = 'Solar Powered Electo-Engine';

    /**
     * cost in euros
     * @var int
     */
    protected $charge = 20000;

    /**
     * acceleration in m/s²
     * @var int
     */
    protected $acceleration = 6;

    /**
     * get the acceleration of this engine - kit
     * @return int
     */
    public function getAcceleration()
    {
        return $this->acceleration;
    }

    /**
     * get the charge for this engine kit
     * @return int
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * get the label of this engine kit
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
}