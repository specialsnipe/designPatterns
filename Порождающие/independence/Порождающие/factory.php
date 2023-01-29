<?php

class Worker1
{
    public function work(): void
    {
        print_r('a am worker');
    }
}

class WorkerFactory
{
    public static function make()
    {
        return new Worker1();
    }
}

$worker = WorkerFactory::make();
$worker->work();