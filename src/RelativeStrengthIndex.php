<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

class RelativeStrengthIndex
{
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
        $this->result = trader_rsi($this->values, $this->period) ?? [];
    }

    /**
     * Get result
     *
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue(): float
    {
        return end($this->result) ?? 0;
    }
}
