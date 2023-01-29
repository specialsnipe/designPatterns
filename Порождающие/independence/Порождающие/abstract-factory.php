<?php

interface Worker2
{
    public function work();
}

interface Dev extends Worker2
{

}

interface Des extends Worker2
{

}

class NatDevWorker implements Dev
{

    public function work()
    {
        print_r('natDev');
    }
}
class OutDevWorker implements Dev
{

    public function work()
    {
        print_r('outDev');
    }
}
class NatDesWorker implements Des
{

    public function work()
    {
        print_r('natDes');
    }
}
class OutDesWorker implements Des
{

    public function work()
    {
        print_r('outDes');
    }
}

interface AbstractFactory
{
    public static function makeOutWorker();
    public static function makeNatWorker();
}

class DevFactory implements AbstractFactory
{

    public static function makeOutWorker(): Dev
    {
        return new OutDevWorker();
    }

    public static function makeNatWorker(): Dev
    {
        return new NatDevWorker();
    }
}

class DesFactory implements AbstractFactory
{

    public static function makeOutWorker(): Des
    {
        return new OutDesWorker();
    }

    public static function makeNatWorker(): Des
    {
        return new NatDesWorker();
    }
}

$outDev = DevFactory::makeOutWorker();
$outDev->work();