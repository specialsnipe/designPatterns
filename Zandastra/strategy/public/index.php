<?php

require_once('../vendor/autoload.php');

use App\Lesson\Seminar;
use App\costStrategy\TimedCostStrategy;
use App\costStrategy\FixedCostStrategy;

$lessons[] = new Seminar(4, new TimedCostStrategy());
$lessons[] = new Seminar(4, new FixedCostStrategy());

foreach ($lessons as $lesson) {
    print "Оплата за занятие {$lesson->cost()}.";
    print "Тип {$lesson->chargeType()}\n";
}
