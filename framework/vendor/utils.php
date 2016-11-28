<?php

/**
* 
*/
class Utils
{
    
    function __construct()
    {
    }

    public static function getController()
    {
        $temp = $_SERVER['REDIRECT_URL'];
        $temp = substr($temp, strpos($temp, __MODULE__));
        $temp = str_replace(__MODULE__.'/', '', $temp);
        $temp = explode('/',$temp);
        $controller = reset($temp);
        if ($controller != self::getAction()) {
            return $controller;
        }
        return null;
    }

    public static function getAction()
    {
        $temp = $_SERVER['REDIRECT_URL'];
        $temp = str_replace('/'.__MODULE__.'/', '', $temp);
        $temp = explode('/',$temp);
        $action = end($temp);
        return $action;
    }

    public static function getTitle()
    {
        if (is_null(self::getController())) {
            return self::getAction();
        }
        return self::getController();
    }

    public static function link($controller, $action = null)
    {
        if ($controller == 'home') { return __URL__.'index'; }
        return __URL__.$controller.DS.(is_null($action)?'index':$action);
    }

    public static function dateFormat($date, $format = null)
    {
        $d = '';
        $m = '';
        $y = '';
        $temp = explode('/', $date);
        if (sizeof($temp) == 3 ) {
            $d = $temp[0];
            $m = $temp[1];
            $y = $temp[2];
        }
        $temp = explode('-', $date);
        if (sizeof($temp) == 3 ) {
            $d = $temp[2];
            $m = $temp[1];
            $y = $temp[0];
        }
        if (strlen($date) == 8) {
            $y = substr($date, 0, 4);
            $m = substr($date, 4,2);
            $d = substr($date, 6,2);
        }
        switch ($format) {
            case 'd/m/y':
                return $d.'/'.$m.'/'.$y;
                break;

            case 'ymd':
                return $y.$m.$d;
                break;

            default:
                return $y.'-'.$m.'-'.$d;
                break;
        }
    }
}
