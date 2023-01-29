<?php

interface NativeWorker
{
    public function countSalary(): int;
}

interface OutsourceWorker
{
    public function countSalaryByHour(int $hour): int;
}

class NativeDeveloper implements NativeWorker
{
    public function countSalary(): int
    {
        return 3000 * 20;
    }
}

class OutsourceDeveloper implements OutsourceWorker
{

    public function countSalaryByHour(int $hour): int
    {
        return $hour * 500;
    }
}

class OutsourceWorkerAdapter implements NativeWorker
{

    public function __construct(private OutsourceDeveloper $outsourceDeveloper)
    {
    }

    public function countSalary(): int
    {
       return $this->outsourceDeveloper->countSalaryByHour(80);
    }
}

$nat = new NativeDeveloper();
$out = new OutsourceDeveloper();
$ad = new OutsourceWorkerAdapter($out);

var_dump($nat->countSalary());
var_dump($ad->countSalary());

