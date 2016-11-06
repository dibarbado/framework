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
        $temp = $_SERVER['REQUEST_URI'];
        $temp = str_replace('/'.__MODULO__.'/', '', $temp);
        $temp = explode('/',$temp);
        $controller = reset($temp);
        if ($controller != self::getAction()) {
            return $controller;
        }
        return null;
    }

    public static function getAction()
    {
        $temp = $_SERVER['REQUEST_URI'];
        $temp = str_replace('/'.__MODULO__.'/', '', $temp);
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
        
    }
}
