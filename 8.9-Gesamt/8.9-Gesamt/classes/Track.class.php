<?php
/**
 * Track for the car to drive on
 *
 * @author stepo
 */
class Track extends TrackPart
{

    /**
     * tracks
     * @var string
     */
    protected $tracks = array();

    /**
     * create a new track
     * @param string $name
     * @param int $length
     */
    public function  __construct($name, $length)
    {
        $this->name   = $name;
        $this->length = $length;
    }

    /**
     * add a track
     * @param Track $track 
     */
    public function addTrack($track)
    {
        if (is_object($track) && $track instanceOf TrackPart) {
            $this->tracks[] = $track;
        }
    }

    /**
     * remove a track from a given index
     * @param TrackPart $track
     */
    public function removeTrack($track)
    {
        $this->tracks[] = array_diff($this->tracks, array($track));
    }

    /**
     * get length of this track
     * @return float
     */
    public function getLength()
    {
        $length = 0.0;
        foreach($this->tracks as $track) {
            $length += $track->getLength();
        }
        return $length;
    }

    /**
     * get length of the turns of this track
     * @return float
     */
    public function getTurnLength()
    {
        $length = 0.0;
        foreach($this->tracks as $track) {
            $length += $track->getTurnLength();
        }
        return $length;
    }


    /**
     * get length of the straight parts of this track
     * @return float
     */
    public function getStraightLength()
    {
        $length = 0.0;
        foreach($this->tracks as $track) {
            $length += $track->getStraightLength();
        }
        return $length;
    }

    /**
     * drive a car on track starting with an initial speed
     * @param Car $car
     * @param float $initialSpeed
     * @param float $resultingSpeed
     * @return float time taken in seconds
     */
    public function driveOnTrack($car, $initialSpeed, &$resultingSpeed)
    {
        $time = 0.0;
        foreach($this->tracks as $track) {
            $time += $track->driveOnTrack($car, $initialSpeed, $resultingSpeed);
            $initialSpeed = $resultingSpeed;
        }
        Log::addEntry('finished',sprintf("time taken: %.2f s", $time));
        Log::addEntry('finished',sprintf("resulting speed: %.2f m/s", $resultingSpeed));
        return $time;
    }

    /**
     * print the info for this track
     */
    public function printInfo()
    {
        print "<fieldset style=\"-moz-border-radius: 5px 5px 5px 5px;\"><legend>{$this->getName()}</legend>This track consists of multiple tracks!<br>";
        printf("The overall length is  %.3f kilometers.<br>", $this->getLength());
        printf("The straight parts have a combined length of %.3f kilometers.<br>", $this->getStraightLength());
        printf("The turns have a combined length of %.3f kilometers.<br>", $this->getTurnLength());
        foreach($this->tracks as $track) {
            $track->printInfo();
        }
        print "</fieldset>";
    }
}