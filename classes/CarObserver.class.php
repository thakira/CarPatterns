<?php

/**
 * Beobachter des Autos
 *
 */
interface CarObserver
{
    /**
     * erhält Updates des Autos
     * @param Car $car
     */
    public function update($car);

}