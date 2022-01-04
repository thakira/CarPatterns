<?php

/**
 * BasisKlasse Auto
 */
abstract class CarBase
{

    /**
     * Name des Autos
     * @param String $name
     */
    protected $name = '';

    /**
     * Konstruktor
     * @param String $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Getter für die Höchstgeschwindigkeit (m/s)
     * @return float
     */
    abstract public function getMaxSpeed();

    /**
     * Getter für die Kurvengeschwindigkeit (m/s)
     * @return float
     */
    abstract public function getTurnSpeed();

    /**
     * Getter für die Beschleunigung (m/s²)
     * @return float
     */
    abstract public function getAcceleration();

    /**
     * Getter für die Bremsverzögerung (m/s²)
     * @return float
     */
    abstract public function getDeceleration();

    /**
     * Getter für den Preis in Euro
     * @return int
     */
    abstract public function getCost();

    /**
     * Getter für den Kraftstoffverbraucht (l/km)
     * @return float
     */
    abstract public function getConsumptionKm();

    /**
     * Zusammenfassung des erstellten Autos
     */
    public function displayInformation()
    {
        print '<table cellspacing=2>';
        print '<tr><td align=right>Preis:</td><td>' . $this->getCost() . ' &euro;</td></tr>';
        print '<tr><td align=right>Name: </td><td>' . $this->getName() . '</td></tr>';
        printf('<tr><td align=right>Beschleunigung:</td><td>%.2f m/s&sup2;</td></tr>', $this->getAcceleration());
        if($this->getAcceleration() != 0)
        {
        printf('<tr><td align=right>0-100 km/h:</td><td>%.2f s</td></tr>', (27.78 / $this->getAcceleration()));
        }
        else
        {
            printf('<tr><td align=right>0-100 km/h:</td><td>%.2f s</td></tr>', ($this->getAcceleration()));
        }
        printf('<tr><td align=right>Höchstgeschwindigkeit:</td><td>%.2f m/s;</td></tr>', $this->getMaxSpeed());
        printf('<tr><td align=right>Kurvengeschwindigkeit:</td><td>%.2f m/s;</td></tr>', $this->getTurnSpeed());
        printf('<tr><td align=right>Kraftstoff-Füllstand:</td><td>%.2f Liter;</td></tr>', $this->getTankStatus());
        printf('<tr><td align=right>Kraftstoffverbrauch:</td><td>%.2f Liter/km;</td></tr>', $this->getConsumptionKm());
        print '</table>';
        print '<hr>';
    }

}