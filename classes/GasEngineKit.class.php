<?php

/**
 * Motorbausatz Benzinmotor
 */
class GasEngineKit extends EngineKit
{
    /**
     * Erstellen eines neuen Motors
     */
    public function __construct()
    {
        parent::__construct();
        $this->acceleration = 3.47;
        $this->consumptionKm = 0.1;
        $this->cost = 5000;
    }
}