<?php


/**
* Motorbausatz Ethanolmotor
*/
class EthanolEngineKit extends EngineKit
{
/**
* Erstellen eines neuen Motors
*/
public function __construct()
{
parent::__construct();
$this->acceleration = 2.40;
$this->consumptionKm = 0.01;
$this->cost = 7000;
}
}