<?php

/**
 * Observer to monitor the energy source
 *
 * @author Thorsten Hallwas
 */
class EnergySourceObserver implements CarObserver
{

    public function update($car)
    {
        if ($car->getTankStatus() <= 0.0) {
            print '<br><span style="color: red">Tank empty!</span>';
        } else if ($car->getTankStatus() < 5.0) {
            print '<br><span style="color: orange">Tank nearly empty. Refill!</span>';
        }
    }

}