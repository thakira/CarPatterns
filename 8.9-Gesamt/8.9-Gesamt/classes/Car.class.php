<?php

/**
 * This class represents the car
 *
 * @author Thorsten Hallwas
 */
class Car extends CarBase
{

    /**
     * engine-kit
     * @var EngineKit
     */
    protected $engineKit = null;

    /**
     * base cost in euros without the engine
     * @var int
     */
    protected $cost = 12000;

    /**
     * kilometers driven
     * @var float
     */
    protected $kilometersDriven = 0.0;

    /**
     * size of the tank in liters
     * @var float
     */
    protected $tankSize = 50.0;

    /**
     * actual status of the tank
     * @var float
     */
    protected $tankStatus = 50.0;

    /**
     * speed in meters/second that the car can drive through a turn
     * @var float
     */
    protected $turnSpeed = 14.0;

    /**
     * the max speed in meters/second
     * @var float
     */
    protected $maxSpeed = 50.0;

    /**
     * observers of this car
     * @var array
     */
    protected $observers = array();

    /**
     * deceleration (brakes) in m/s²
     * @var float
     */
    protected $deceleration = 10.0;


    /**
     * get the name of the car
     * @return string
     */
    public function getName()
    {
        $name = $this->name;
        if (is_object($this->engineKit)) {
            $name .= ' with ' . $this->engineKit->getName();
        }
        return $name;
    }

    /**
     * insert an engine-kit
     * @param EngineKit $engineKit
     */
    public function insertEngine($engineKit)
    {
        if (!is_object($this->engineKit)) {
            $this->engineKit = $engineKit;
        }
        return ($this->engineKit != null);
    }

    /**
     * remove the engine-kit
     */
    public function removeEngine()
    {
        $this->engineKit = null;
    }

    /**
     * get the max speed for this car
     * @return float
     */
    public function getMaxSpeed()
    {
        return $this->maxSpeed;
    }

    /**
     * get the speed in meters/second that the car can drive through a turn
     * @return float
     */
    public function getTurnSpeed()
    {
        return $this->turnSpeed;
    }

    /**
     * get the acceleration for this car
     * @return float
     */
    public function getAcceleration()
    {
        if (is_object($this->engineKit)) {
            return $this->engineKit->getAcceleration();
        }
        return 0.0;
    }

    /**
     * get the deceleration(brakes) for this car
     * @return float
     */
    public function getDeceleration()
    {
        return $this->deceleration;
    }

    /**
     * get the cost of the car in Euro
     * @return float
     */
    public function getCost()
    {
        $prize = $this->cost;
        if (is_object($this->engineKit)) {
            $prize += $this->engineKit->getCost();
        }
        return $prize;
    }

    /**
     * get the amount of kilometers driven
     * @return float
     */
    public function getKilometersDriven()
    {
        return $this->kilometersDriven;
    }

    /**
     * get the amount of the engery source used per kilometer
     * @return float
     */
    public function getConsumptionPerKilometer()
    {
        if (is_object($this->engineKit)) {
            return $this->engineKit->getConsumptionPerKilometer();
        }
        return 0.0;
    }

    /**
     * get the engine kit
     * @return EngineKit
     */
    public function getEngineKit()
    {
        return $this->engineKit;
    }

    /**
     * attach an observer
     * @param CarObserver $observer
     */
    public function attachObserver($observer)
    {
        if (is_object($observer) && $observer instanceOf CarObserver) {
            $this->observers = array_merge($this->observers, array($observer));
        }
    }

    /**
     * detach an observer
     * @param CarObserver $observer
     */
    public function detachObserver($observer)
    {
        $this->observers[] = array_diff($this->observers, array($observer));
    }

    /**
     * notfiy all observers
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * drive the car for the given amount of kilometers
     * @param float $amount
     * @return float kilometers driven
     */
    public function drive($amount)
    {
        if (is_object($this->engineKit)) {
            $this->kilometersDriven += $amount;
            $this->notify();
        } else {
            print '<br><span style="color: red">No engine!</span>';
        }

        return $this->kilometersDriven;
    }

    /**
     * use energy source
     * @param float $amount
     * @return float new tank status
     */
    public function useEnergySource($amount)
    {
        $this->tankStatus -= $amount;
        $this->notify();
        return $this->tankStatus;
    }


    /**
     * get the size of the tank
     * @return float
     */
    public function getTankSize()
    {
        return $this->tankSize;
    }

    /**
     * get the current tank status
     * @return float tank status
     */
    public function getTankStatus()
    {
        return $this->tankStatus;
    }

    /**
     * fill up the tank with a given amount
     * @param float $amount
     * @return float tank status
     */
    public function fillTank($amount)
    {
        $spaceLeft = $this->tankSize - $this->tankStatus;
        if ($amount > $spaceLeft) {
            print '<span style="color: red">Tried to fill more than possible! Just used ' . $amount - $spaceLeft . '</span>';
            $this->tankStatus = $this->tankSize;
        } else {
            $this->tankStatus += $amount;
        }
        $this->notify();
        return $this->tankStatus;
    }

}