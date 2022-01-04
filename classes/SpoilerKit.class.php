<?php
/**
 * Dekoriert das Auto mit einem Spoiler
 *
 */
class SpoilerKit extends CarDecorator
{
    /**
     * erstellt einen neuen Spoilerkit-Dekorierer
     * @param Car $car
     */
    public function __construct($car)
    {
        parent::__construct($car, 'Spoiler-Kit');
    }

    /**
     * Die Höchstgeschwindigkeit des Autos fällt
     * aufgrund des größeren Luftwiderstandes
     * @return float
     */
    public function getMaxSpeed()
    {
        return $this->car->getMaxSpeed() * 0.9;
    }

    /**
     * Der Spoiler erhöht die Kurvengeschwindigkeit
     * @return float
     */
    public function getTurnSpeed()
    {
        return $this->car->getTurnSpeed() * 1.2;
    }

    /**
     * Das Spoiler-Kit kostet 2000 Euro Aufpreis
     * @return int
     */
    public function getCost()
    {
        return $this->car->getCost() + 2000;
    }

    /**
     * der Kraftstoffverbrauch erhöht sich durch den Spoiler um 5%
     * @return float
     */
    public function getConsumptionKm()
    {
        return $this->car->getConsumptionKm() * 1.05;
    }
}