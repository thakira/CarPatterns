<?php
/**
 * Turbo zum Verbessern der Beschleunigung
 *
 */
class Turbo extends CarDecorator
{
    /**
     * dekoriert das Auto mit einem Turbo
     * @param Car $car
     */
    public function __construct($car)
    {
        parent::__construct($car, 'Turbo');
    }

    /**
     * Die Beschleunigung wird um 30% erhöht
     * @return float
     */
    public function getAcceleration()
    {
        return $this->car->getAcceleration() * 1.3;
    }

    /**
     * Die Höchstgeschwindigkeit wird um 10% erhöht
     * @return float
     */
    public function getMaxSpeed()
    {
        return $this->car->getMaxSpeed() * 1.1;
    }

    /**
     * Der Kraftstoffverbrauch erhöht sich um 30%
     * @return float
     */
    public function getConsumptionKm()
    {
        return $this->car->getConsumptionKm() * 1.3;
    }

    /**
     * Der Turbo kostet 4000 Euro Aufpreis
     * @return int
     */
    public function getCost()
    {
        return $this->car->getCost() + 4000;
    }
}