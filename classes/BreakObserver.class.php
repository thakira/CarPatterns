<?php

/**
 * Observer to monitor the energy source
 *
 * @author Thorsten Hallwas
 */
class BreakObserver implements CarObserver
{

    public function update($car)
    {
        print '<br><span>Gefahrene Kilometer: '. $car->getDrivenKm()  . '</span>';
        print '<br><span style="color: red">Zeit für eine Pause!</span>';

    }
}