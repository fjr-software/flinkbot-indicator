<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

interface MovingAverageInterface
{
    /**
     * @const int
     */
    public const TRADER_MA_TYPE_SMA = 0;

    /**
     * @const int
     */
    public const TRADER_MA_TYPE_EMA = 1;

    /**
     * @const int
     */
    public const TRADER_MA_TYPE_WMA = 2;

    /**
     * @const int
     */
    public const TRADER_MA_TYPE_DEMA = 3;

    /**
     * @const int
     */
    public const TRADER_MA_TYPE_TEMA = 4;

    /**
     * @const int
     */
    public const TRADER_MA_TYPE_TRIMA = 5;

    /**
     * @const int
     */
    public const TRADER_MA_TYPE_KAMA = 6;

    /**
     * @const int
     */
    public const TRADER_MA_TYPE_MAMA = 7;

    /**
     * @const int
     */
    public const TRADER_MA_TYPE_T3 = 8;
}
