<?php
/**
 * Breitreifen für mehr Stabilität in Kurven
 */
class WideTires extends CarDecorator
{
    /**
     * dekoriert das Auto mit Breitreifen
     * @param Car $car
     */
    public function __construct($car)
    {
        parent::__construct($car, 'Wide Tires');
    }

    /**
     * Die Reifen erhöhen die Kurvengeschwindigkeit um 10%
     * @return float
     */
    public function getTurnSpeed()
    {
        return $this->car->getTurnSpeed() * 1.1;
    }

    /**
     * Die Reifen kosten 1000 Euro Aufpreis
     * @return int
     */
    public function getCost()
    {
        return $this->car->getCost() + 1000;
    }

    /**
     * Der Spritverbrauch steigt um 5%
     * @return float
     */
    public function getConsumptionKm()
    {
        return $this->car->getConsumptionKm() * 1.05;
    }
}