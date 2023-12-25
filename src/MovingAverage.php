<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

abstract class MovingAverage implements MovingAverageInterface
{
    /**
     * @const int
     */
    public const TRADER_MA_TYPE = self::TRADER_MA_TYPE_SMA;

    /**
     * @var array
     */
    private array $result = [];

    /**
     * Constructor
     *
     * @param array $values
     * @param int $period
     */
    public function __construct(
        private readonly array $values,
        private readonly int $period
    ) {
        $this->result = trader_ma($this->values, $this->period, $this::TRADER_MA_TYPE) ?? [];
    }

    /**
     * @inheritdoc
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * @inheritdoc
     */
    public function getValue(): array
    {
        return [end($this->result)] ?? [];
    }
}
