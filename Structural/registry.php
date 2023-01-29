<?php

abstract class Registry
{
    private static array $services = [];

    final public static function setService($key, Service $service): string
    {
        if (isset(self::$services[$key])) {
            return 'Сервис под таким ключом уже существует';
        }
        self::$services[$key] = $service;
        return 'Сервис зарегистрирован';
    }

    final public static function getService($key): Service|string
    {
        if (isset(self::$services[$key])) {
            return self::$services[$key];
        }
        return 'Сервиса под таким ключом не существует';
    }
}

class Service
{

}

$service = new Service;
$x = Registry::setService(1, $service);
$s = Registry::setService(1, $service);
$service = Registry::getService(1);
var_dump($s);