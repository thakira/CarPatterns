<?php

/**
 * Observers for a car
 *
 * @author Thorsten Hallwas
 */
interface CarObserver
{
    /**
     * receive updates from a car
     * @param Car $car
     */
    public function update($car);

}