<?php

interface AbstractFactory
{
    public static function makeDeveloperWorker(): DeveloperWorker;
    public static function makeDesignerWorker(): DesignerWorker;
}

class OutsourceFactory implements AbstractFactory

{
    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new OutDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new OutDesignerWorker();
    }
}

class NativeFactory implements AbstractFactory
{

    public static function makeDeveloperWorker(): DeveloperWorker
    {
        return new NatDeveloperWorker();
    }

    public static function makeDesignerWorker(): DesignerWorker
    {
        return new NatDesignerWorker();
    }
}

interface Worker1
{
    public function work();
}

interface DeveloperWorker extends Worker1
{

}

interface DesignerWorker extends Worker1
{

}

class OutDeveloperWorker implements DeveloperWorker
{

    public function work()
    {
        print_r('outDev');
    }
}

class NatDeveloperWorker implements DeveloperWorker
{

    public function work()
    {
        print_r('natDev');
    }
}

class OutDesignerWorker implements DesignerWorker
{

    public function work()
    {
        print_r('outDes');
    }
}

class NatDesignerWorker implements DesignerWorker
{

    public function work()
    {
        print_r('natDes');
    }
}

$nativeDeveloper = NativeFactory::makeDeveloperWorker();
$nativeDeveloper->work();



