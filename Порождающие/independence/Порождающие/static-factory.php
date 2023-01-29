<?php

interface Worker2
{
    public function work();
}

class Dev implements Worker2
{

    public function work()
    {
        print_r('dev');
    }
}


class Des implements Worker2
{
    public function work()
    {
        print_r('des11');
    }
}

class WorkerFactory
{
    public static function make(string $classTitle): ?Worker2
    {
        if (class_exists($classTitle)) {
            return new $classTitle();
        }
        return null;
    }
}

$dev = WorkerFactory::make('des');
$dev->work();