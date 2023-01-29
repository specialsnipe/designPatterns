<?php

interface Worker1
{
    public function work();
}

class Developer implements Worker1
{
    public function work()
    {
        print_r('developing');
    }
}

class Designer implements Worker1
{
    public function work()
    {
        print_r('designer');
    }
}

class WorkerFactory
{
    public static function make(string $workerTitle)
    {
        if (class_exists($workerTitle)) {
            return new $workerTitle();
        }
        return null;
    }
}

$developer = WorkerFactory::make('DeveLoper');
$developer->work();