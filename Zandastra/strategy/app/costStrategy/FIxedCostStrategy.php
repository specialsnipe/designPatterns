<?php

namespace App\costStrategy;

use App\Lesson\Lesson;

class FixedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson): int
    {
        return 30;
    }

    public function chargeType(): string
    {
        return "Фиксированная ставка";
    }
}