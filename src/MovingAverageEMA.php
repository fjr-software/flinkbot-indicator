<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

class MovingAverageEMA extends MovingAverage
{
    /**
     * @const int
     */
    public const TRADER_MA_TYPE = self::TRADER_MA_TYPE_EMA;
}
