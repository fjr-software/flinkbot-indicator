<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

class SupportResistance implements IndicatorInterface
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
            $this->getResistance(),
            $this->getSupport()
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
        $max = max($this->values);
        $avg = array_sum($this->values) / count($this->values);

        return ($max + $avg) / 2;
    }

    /**
     * Get support
     *
     * @return float
     */
    private function getSupport(): float
    {
        $min = min($this->values);
        $avg = array_sum($this->values) / count($this->values);

        return ($min + $avg) / 2;
    }
}
