<?php

/**
 * This class represents the car
 *
 * @author Thorsten Hallwas
 */
class Car extends CarBase
{

	/**
	 * Name of the car
	 * @param string $name
	 */
	protected $name = '';

	/**
	 * the max speed in meters/second
	 * @var float
	 */
	protected $maxSpeed = 50.0;

	/**
	 * speed in meters/second that the car can drive through a turn
	 * @var float
	 */
	protected $turnSpeed = 14.0;

	/**
	 * acceleration provided in meter/second²
	 * 0 - 100 in 8 seconds
	 * @var float
	 */
	protected $acceleration = 3.47;

	/**
	 * deceleration (brakes) in m/s²
	 * @var float
	 */
	protected $deceleration = 10.0;

	/**
	 * base cost in euros without the engine
	 * @var int
	 */
	protected $cost = 17000;

	/**
	 * kilometers driven
	 * @var float
	 */
	protected $kilometersDriven = 0.0;

	/**
	 * consumption of the engery source per kilometer
	 * @var float
	 */
	protected $consumptionPerKilometer = 0.1;

	/**
	 * engine kit for this car
	 * @var string
	 */
	protected $engineKit = 'Standard';

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
	 * create a new car
	 * @param string $name
	 */
	public function  __construct($name)
	{
		$this->name = $name;
	}

	/**
	 * get the name of the car
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
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
		return $this->acceleration;
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
	 * get the prize of the car in Euro
	 * @return float
	 */
	public function getCost()
	{
		return $this->cost;
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
		return $this->consumptionPerKilometer;
	}

	/**
	 * get the engine kit
	 * @return string
	 */
	public function getEngineKit()
	{
		return $this->engineKit;
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
}