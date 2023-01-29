<?php

interface WorkerFacade
{
    public function startWOrk();
    public function stopWOrk();
}

class Developer
{
    public function startDeveloping()
    {
        print_r('start developing' . PHP_EOL);
    }

    public function stopDeveloping()
    {
        print_r('stop developing' . PHP_EOL);
    }
}

class Designer
{
    public function startDesigning()
    {
        print_r('start designing' . PHP_EOL) ;
    }

    public function stopDesigning()
    {
        print_r('stop designing' . PHP_EOL) ;
    }
}

class Facade implements WorkerFacade
{
    public function __construct(private Developer $developer, private Designer $designer)
    {
    }

    public function startWOrk()
    {
        $this->developer->startDeveloping();
        $this->designer->startDesigning();
    }

    public function stopWOrk()
    {
        $this->developer->stopDeveloping();
        $this->designer->stopDesigning();
    }
}

$dev = new Developer();
$des = new Designer();

$fas = new Facade($dev,$des);
$fas->startWOrk();
$fas->stopWOrk();


