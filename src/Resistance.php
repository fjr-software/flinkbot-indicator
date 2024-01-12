<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

class Resistance implements IndicatorInterface
{
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
     */
    public function __construct(
        private readonly array $values
    ) {
        $this->result = [
            $this->getResistance()
        ];
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
        return $this->result ?? [];
    }

    /**
     * Get resistance
     *
     * @return float
     */
    private function getResistance(): float
    {
        $max = max($this->values[2]);
        $avg = array_sum($this->values[2]) / count($this->values[2]);

        return ($max + $avg) / 2;
    }
}
