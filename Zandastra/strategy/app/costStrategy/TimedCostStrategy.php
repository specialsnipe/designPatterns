<?php

namespace App\costStrategy;

use App\Lesson\Lesson;

class TimedCostStrategy extends CostStrategy
{

    public function cost(Lesson $lesson): int
    {
        return ($lesson->getDuration() * 5);
    }

    public function chargeType(): string
    {
        return "Почасовая полата";
    }
}