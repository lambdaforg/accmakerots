<?php
/**
 * Created by PhpStorm.
 * User: Właściciel
 * Date: 2020-02-19
 * Time: 11:42
 */

class Route
{
    public  static $validRoutes;

    public  function addGLobalTwig($array){
        //ułomna wersja
        self::$validRoutes = $array;
    }
    public  function set($route, $function)
    {

       // self::$validRoutes[] = $route;

        if ($_GET['url'] == $route) {

            $function->__invoke();


        }
    }

}