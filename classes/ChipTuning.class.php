<?php

/**
 * ChipTuning erhöht die Maximalgeschwindigkeit und senkt den Verbrauch
 */
class ChipTuning extends CarDecorator
{
    /**
     * dekoriert das Auto mit ChipTuning
     * @param Car $car
     */
    public function __construct($car)
    {
        parent::__construct($car, 'Chip Tuning');
    }

    /**
     * Das Chip Tuning erhöht die Maximalgeschwindigkeit um 20%
     * @return float
     */
    public function getMaxSpeed()
    {
        return $this->car->getMaxSpeed() * 1.2;
    }

    /**
     * Das Chip Tuning kostet 1000 Euro Aufpreis
     * @return int
     */
    public function getCost()
    {
        return $this->car->getCost() + 1000;
    }

    /**
     * Der Spritverbrauch sinkt um 10%
     * @return float
     */
    public function getConsumptionKm()
    {
        return $this->car->getConsumptionKm() * 0.9;
    }
}