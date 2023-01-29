<?php

interface Worker1
{
    public function work();
}

class Dev implements Worker1
{
    public function work()
    {
        print_r('dev');
    }
}

class Des implements Worker1
{
    public function work()
    {
        print_r('dev');
    }
}

interface WorkerFactory1
{
    public static function make();
}

class DevFactory implements WorkerFactory1
{
    public static function make()
    {
        return new Dev();
    }
}

class DesFactory implements WorkerFactory1
{
    public static function make()
    {
        return new Des();
    }
}

$dev = DevFactory::make();
$dev->work();