<?php

/**
 * Dekorierer für die Klasse Car
 */
abstract class CarDecorator extends CarBase
{

    /**
     * Instanz der Klasse
     * @var Car
     */
    protected $car = null;

    /**
     * Konstruktor für einen neuen Auto-Dekorierer
     * @param Car $car
     * @param Name $name
     */
    public function __construct($car, $name)
    {
        $this->car = $car;
        $this->name = $name;
    }

    /**
     * Getter Höchstgeschwindigkeit (m/s)
     * @return float
     */
    public function getMaxSpeed()
    {
        return $this->car->getMaxSpeed();
    }

    /**
     * Getter für Kurvengeschwindigkeit (m/s)
     * @return float
     */
    public function getTurnSpeed()
    {
        return $this->car->getTurnSpeed();
    }

    /**
     * Getter für Beschleunigung (m/s²)
     * @return float
     */
    public function getAcceleration()
    {
        return $this->car->getAcceleration();
    }

    /**
     * Getter für Bremsverzögerung (m/s²)
     * @return float
     */
    public function getDeceleration()
    {
        return $this->car->getDeceleration();
    }

    /**
     * Getter für den Preis (Euro)
     * @return int
     */
    public function getCost()
    {
        return $this->car->getCost();
    }

    /**
     * Getter für den Kraftstoffverbrauch (Liter)
     * @return float
     */
    public function getConsumptionKm()
    {
        return $this->car->getConsumptionKm();
    }

    /**
     * Hinzufügen des Dekorierer-Namens zum Autonamen
     * @return String $name
     */
    public function getName()
    {
        return $this->car->getName() . ' + ' . $this->name;
    }
    /**
     * Delegation aller nicht dekorierten Funktionen an car
     * @param String $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $return = false;
        if(method_exists($this->car, $name))
        {
            $return = call_user_func_array(array($this->car, $name), $arguments);
        }
        else
        {
            $return = $this->car->__call($name, $arguments);
        }
        return $return;
    }

}