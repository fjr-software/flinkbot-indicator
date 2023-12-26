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
     * @var float
     */
    private float $symbolPrice = 0;

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
    public function setSymbolPrice(float $price): void
    {
        $this->symbolPrice = $price;
    }

    /**
     * @inheritdoc
     */
    public function getSymbolPrice(): float
    {
        return $this->symbolPrice;
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
