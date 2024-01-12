<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

class Support implements IndicatorInterface
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
     * Get support
     *
     * @return float
     */
    private function getSupport(): float
    {
        $min = min($this->values[2]);
        $avg = array_sum($this->values[2]) / count($this->values[2]);

        return ($min + $avg) / 2;
    }
}
