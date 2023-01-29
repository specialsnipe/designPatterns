<?php

interface WorkerP
{
    public function setHours($hours);

    public function countSalary(): int;
}

class WorkerOutsource implements WorkerP
{
    private array $hours = [];

    public function setHours($hours)
    {
        $this->hours[] = $hours;
    }

    public function countSalary(): int
    {
        return array_sum($this->hours) * 500;
    }
}

class WorkerProxy extends WorkerOutsource implements WorkerP
{
    private $salary = 0;

    public function countSalary(): int
    {
        if ($this->salary == 0) {
            $this->salary = parent::countSalary();
        }
        return $this->salary;
    }
}

