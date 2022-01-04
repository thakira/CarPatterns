<?php

/**
 * Base Class for Track parts
 *
 * @author Thorsten Hallwas
 */
abstract class TrackPart
{

    /**
     * name of the track
     * @var string
     */
    protected $name = '';

    /**
     * length of this track
     * @var float
     */
    protected $length = 0.0;

    /**
     * straight part of this track
     * @var float
     */
    protected $straightLength = 0.0;

    /**
     * turn part of this track
     * @var float
     */
    protected $turnLength = 0.0;


    /**
     * create a new track
     * @param string $name
     * @param float $length
     */
    public function __construct($name, $length)
    {
        $this->name   = $name;
        $this->length = $length;
    }

    /**
     * get length of the track
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * get the length of the turn part
     * @return float
     */
    public function getTurnLength()
    {
        return $this->turnLength;
    }

    /**
     * get the length of the straight part
     * @return float
     */
    public function getStraightLength()
    {
        return $this->straightLength;
    }

    /**
     * get the name of the track
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * drive a car on track starting with an initial speed
     * @param Car $car
     * @param float $initialSpeed
     * @param float $resultingSpeed
     * @return float time taken in seconds
     */
    abstract public function driveOnTrack($car, $initialSpeed, &$resultingSpeed);

    /**
     * print the info of this track
     */
    public function printInfo()
    {
        printf("The track called <i>{$this->getName()}</i> has got a length of %.3f kilometers.<br>", $this->getLength());
    }

    /**
     * drive a car on track starting with an initial speed
     * @param Car $car
     * @param float $maxSped
     * @param float $initialSpeed
     * @param float $resultingSpeed
     * @return float time taken in seconds
     */
    public function simulateDriveOnTrack($car, $maxSpeed, $initialSpeed, &$resultingSpeed)
    {
        $toDrive = $this->length * 1000;
        $time    = 0.0;
        Log::addEntry('driving', sprintf("'<i>{$car->getName()}</i>' on {$this->getName()}.", $toDrive));
        if ($initialSpeed < $maxSpeed) {
            Log::addEntry('driving', "&gt;&gt;&gt;accelerating car&gt;&gt;&gt;");
            $maxSpeedLength = ($maxSpeed * $maxSpeed) / (2 * $car->getAcceleration());
            Log::addEntry('status',sprintf("max speed at: %.2f m", $maxSpeedLength));
            $fullSpeedTime = ($maxSpeed - $initialSpeed) / $car->getAcceleration();
            Log::addEntry('status',sprintf("fullspeedtime: %.2f s", $fullSpeedTime));

            if ($toDrive < $maxSpeedLength) {
                //geschwindigkeit am ende der Strecke
                $resultingSpeed = sqrt(2 * $car->getAcceleration() * $toDrive + $initialSpeed * $initialSpeed);
                Log::addEntry('driving', sprintf("driving at %.2f m/s, reached end of track", $resultingSpeed));
                $time += ($resultingSpeed - $initialSpeed) / $car->getAcceleration();
                $toDrive = 0;
            } else {
                $resultingSpeed = $maxSpeed;
                $driven = 0.5 * $car->getAcceleration() * $fullSpeedTime * $fullSpeedTime + $fullSpeedTime * $initialSpeed;
                Log::addEntry('driving',sprintf("driven %.2f m till full speed", $driven));
                $toDrive = $toDrive - $driven;
                $time += $fullSpeedTime;
            }
        } else if ($initialSpeed > $maxSpeed) {
            Log::addEntry('driving', "&lt;&lt;&lt;decelerating car&lt;&lt;&lt;");
            $brakingTime = ($initialSpeed - $maxSpeed) / $car->getDeceleration();
            Log::addEntry('driving', "lost {$brakingTime} s with braking");
            $time += $brakingTime;
        }
        if ($toDrive > 0) {
            $resultingSpeed = $maxSpeed;
            Log::addEntry('driving', sprintf("driving %.2f m at full speed", $toDrive));
            $time += $toDrive / $maxSpeed;
        }
        $carDriven = $car->drive($this->length);
        Log::addEntry('driven', sprintf("time taken: %.2f s", $carDriven));
        Log::addEntry('driving',sprintf("time taken: %.2f s", $time));
        Log::addEntry('driving',sprintf("resulting speed: %.2f m/s", $resultingSpeed));
        return $time;
    }


}