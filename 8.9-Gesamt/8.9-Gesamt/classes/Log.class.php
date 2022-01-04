<?php

/**
 * stores log entries
 *
 * @author stepo
 */
class Log
{
    protected static $entries = array();

    public static function addEntry($title, $text)
    {
        self::$entries[] = array('title'=>$title, 'text'=>$text);
    }

    public static function showLog()
    {
        print '<table>';
        foreach(self::$entries as $entry) {
            print '<tr><td>' . $entry['title'] . '</td><td>' . $entry['text'] . '</td></tr>';
        }
        print '</table>';
    }


}