<?php

interface Worker1
{
    public function work();
}

class Developer implements  Worker1
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
        print_r('designing');
    }
}

interface WorkerFactory

{
    public function make();
}

class DeveloperFactory
{
    public static function make()
    {
        return new Developer();
    }
}
class DesignerFactory
{
    public static function make()
    {
        return new Designer();
    }
}

$designer = DesignerFactory::make();
$developer = DeveloperFactory::make();
$designer->work();
$developer->work();