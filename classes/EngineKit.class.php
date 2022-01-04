<?php
/**
 * Motor-Bausatz
 */
abstract class EngineKit
{
    /**
     * Name des Motors
     * @var String
     */
    protected $name = 'EngineKit';

    /**
     * Beschleunigung in m/s²
     * @var float
     */
    protected $acceleration = 0.00;

    /**
     * Kraftstoffverbrauch pro km
     * @var float
     */
    protected $consumptionKm = 0.00;

    /**
     * Kosten in Euro für den Motor-Bausatz
     * @var int
     */
    protected $cost = 0;


    /**
     * Höchstgeschwindigkeit in m/s
     * @var float
     */
    protected $maxSpeed = 50.0;

    /**
     * Kurvengeschwindigkeit (m/s)
     * @var float
     */
    protected $turnSpeed = 14.0;


    /**
     * Konstruktor für einen neuen Motor mit angegebenem Namen
     * @param string $name
     */
    public function __construct()
    {
        $this->name = get_class($this);
    }

    /**
     * Setter für den Namen
     * @param String $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Getter für den Namen
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Getter Beschleunigung (m/s²)
     * @return float
     */
    public function getAcceleration()
    {
        return $this->acceleration;
    }

    /**
     * Getter Kraftstoffverbrauch per km
     * @return float
     */
    public function getConsumptionKm()
    {
        return $this->consumptionKm;
    }

    /**
     * Getter für den Preis des Motors in Euro
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Getter für Höchstgeschwindigkeit
     * @return float
     */
    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    /**
     * Getter für Kurvengeschwindigkeit
     * @return float
     */
    public function getTurnSpeed()
    {
        return $this->turnSpeed;
    }
}
