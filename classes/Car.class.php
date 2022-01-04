<?php

/**
 *  Auto Repräsentation
 */
class Car extends CarBase
{
    /**
     * Name des Autos
     * @param String $name
     */

//    protected $name = '';

    /**
     * Motor-Art
     * @var EngineKit
     */
    protected $engineKit = null;

    /**
     * Grundpreis ohne Motor
     * @var int
     */
    protected $cost = 12000;

    /**
     * Kilometerstand
     * @var float
     */
    protected $drivenKm = 0.0;

    /**
     * Größe des Tanks (Liter)
     * @var float
     */
    protected $tankSize = 50.0;

    /**
     * aktueller Füllstand des Tanks
     * @var float
     */
    protected $tankStatus = 50.0;

//    /**
//     * Höchstgeschwindigkeit in m/s
//     * @var float
//     */
//    protected $maxSpeed = 0.0;
//
//    /**
//     * Kurvengeschwindigkeit (m/s)
//     * @var float
//     */
//    protected $turnSpeed = 0.0;

    /**
     * Beobachter des Autos
     *@var array
     */
    protected $observers = array();

    /**
     * Beschleunigung von 0 auf 100 (m/s²)
     * @var float
     */
//    protected $acceleration = 3.47;

    /**
     * Bremsverzögerung (m/s²)
     * @var float
     */
    protected $deceleration = 10.0;


    /**
     * Name des Autos
     * @return String
     */
    public function getName()
    {
        $name = $this->name;
        if(is_object($this->engineKit))
        {
            $name .= ' mit ' . $this->engineKit->getName();
        }
        return $name;
    }

    /**
     * Motor hinzufügen
     * $param EngineKit $engineKit
     */
    public function insertEngine($engineKit)
    {
        if(!is_object($this->engineKit))
        {
            $this->engineKit = $engineKit;
        }
        return ($this->engineKit != null);
    }

    public function removeEngine()
    {
        $this->engineKit = null;
    }


    /**
     * Getter für Kurvengeschwindigkeit
     * @return float
     */
    public function getTurnSpeed()
    {
        if(is_object($this->engineKit))
        {
            return $this->engineKit->getTurnSpeed();
        }
        return 0.0;
    }

    /**
     * Getter für Beschleunigung
     * @return float
     */
    public function getAcceleration()
    {
        if(is_object($this->engineKit))
        {
            return $this->engineKit->getAcceleration();
        }
        return 0.0;
    }

    /**
     * Getter für Höchstgeschwindigkeit
     * @return float
     */
    public function getMaxSpeed()
    {
        if(is_object($this->engineKit))
        {
            return $this->engineKit->getMaxSpeed();
        }
        return 0.0;
    }

    /**
     * Getter für Bremsverzögerung
     * @return float
     */
    public function getDeceleration()
    {
        return $this->deceleration;
    }

    /**
     * Getter für den Preis in Euro
     * @return int
     */
    public function getCost()
    {
        $prize = $this->cost;
        if(is_object($this->engineKit))
        {
            $prize += $this->engineKit->getCost();
        }
        return $prize;
    }

    /**
     * Getter für den Kilometerstand
     * @return float
     */
    public function getDrivenKm()
    {
        return $this->drivenKm;
    }

    /**
     * Getter für den Kraftstoffverbrauch
     * @return float
     */
    public function getConsumptionKm()
    {
        if(is_object($this->engineKit))
        {
            return $this->engineKit->getConsumptionKm();
        }
        return 0.0;
    }

    /**
     * Getter für den Motor
     * @return EngineKit
     */
    public function getEngineKit()
    {
        return $this->engineKit;
    }

    /**
     * Getter für die Tankgrösse
     * @return float
     */
    public function getTankSize()
    {
        return $this->tankSize;
    }

    /**
     * Getter für Tank-Füllstand
     * @return float
     */
    public function getTankStatus()
    {
        return $this->tankStatus;
    }


    /**
     * Beobachter andocken
     * @param CarObserver $observer
     */
    public function attachObserver($observer)
    {
        if (is_object($observer) && $observer instanceOf CarObserver) {
            $this->observers = array_merge($this->observers, array($observer));
        }
    }

    /**
     * Beobachter abdocken
     * @param CarObserver $observer
     */
    public function detachObserver($observer)
    {
        $this->observers[] = array_diff($this->observers, array($observer));
    }

    /**
     * alle Beobachter informieren
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * fährt eine angegebene Anzahl von km mit dem Auto
     * @param float $amount
     * @return float kilometers driven
     */
    public function drive($amount)
    {
        if (is_object($this->engineKit)) {
            $mileage = $this->drivenKm;
            while($amount != 0)
            {
                $mileage++;
                $amount--;
                if ($mileage == 400) {
                    $this->drivenKm += $mileage;
                    $this->notify();
                    $mileage = 0;
                }
            }
            $this->drivenKm += $mileage;

        } else {
            print '<br><span style="color: red">No engine!</span>';
        }

        return $this->drivenKm;
    }
}

    /**
     * Kraftstoffverbrauch pro Kilometer (Liter)
     * @var float
     */
  //  protected $consumptionKm = 0.1;

    /**
     * Motor für das Auto
     * @var String
     */
 //   protected $engineKit = 'Standard';






    /**
     * Konstruktor für ein neues Auto
     * @param String $name
     */
/*    public function __construct($name)
    {
        $this->name = $name;
    }*/

    /**
     * Getter für den Namen
     * @return String $name
     */
/*    public function getName()
    {
        return $this->name;
    }*/














    /**
     * Getter für den Motor
     * @return String
     */
/*    public function getEngineKit()
    {
        return $this->engineKit;
    }*/

