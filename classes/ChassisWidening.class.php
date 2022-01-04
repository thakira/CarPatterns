<?php
/**
 * Dekoriert das Auto mit einem Fahrwerksverbreiterung
 *
 */
class ChassisWidening extends CarDecorator
{
    /**
     * erstellt einen neuen Spoilerkit-Dekorierer
     * @param Car $car
     */
    public function __construct($car)
    {
        parent::__construct($car, 'Fahrwerksverbreiterung');
    }

    /**
     * Die Fahrwerksverbreiterung erhöht die Kurvengeschwindigkeit um 4%
     * @return float
     */
    public function getTurnSpeed()
    {
        return $this->car->getTurnSpeed() * 1.04;
    }
}