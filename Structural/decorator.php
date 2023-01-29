<?php

interface Worker4
{
    public function countSalary();
}

abstract class WorkerDecorator implements Worker4
{
    public function __construct(public Worker4 $worker)
    {
    }
}

class Developer implements Worker4
{

    public function countSalary()
    {
        return 20 * 3000;
    }
}

class DeveloperOverTime extends WorkerDecorator
{

    public function countSalary()
    {
        return $this->worker->countSalary() + $this->worker->countSalary() * 0.2;
    }
}

$dev = new Developer;
$devOver = new DeveloperOverTime($dev);
var_dump($dev->countSalary());
var_dump($devOver->countSalary());