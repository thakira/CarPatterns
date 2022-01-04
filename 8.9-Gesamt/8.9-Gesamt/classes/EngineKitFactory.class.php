<?php
/**
 * creates engine-kits for cars
 *
 * @author Thorsten Hallwas
 */
class EngineKitFactory
{
    /**
     * create an engine - kit of the given type
     * @param $type
     * @return EngineKit
     */
    public static function createEngineKit($type)
    {
        try {
            $engineKit = new $type();
        } catch (Exception $e) {
            $engineKit = new GasEngineKit();
        }
        return $engineKit;
    }
}