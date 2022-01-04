<?php

/**
 * representation of a hydrogin engine
 *
 * @author Thorsten Hallwas
 */
class HydrogenEngine
{
    /**
     * hydrogin usage per 100 miles in liters
     */
    public $usagePerHundredMiles = 10;

    /**
     * acceleration in foot/second²
     * @var float
     */
    public $accel = 13.12;

    /**
     * prize of the engine in USD
     * @var int
     */
    public $prize = 20000;

    /**
     * name of the engine
     * @var string
     */
    public $name = 'Hydrogen Engine';
}