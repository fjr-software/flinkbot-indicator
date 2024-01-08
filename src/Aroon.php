<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

class Aroon implements IndicatorInterface
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
     * @param int $period
     */
    public function __construct(
        private readonly array $values,
        private readonly int $period
    ) {
        $this->result = trader_aroon(
            $this->values[0],
            $this->values[1],
            $this->period
        ) ?? [];
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
        return [
            end($this->result[0]),
            end($this->result[1])
        ] ?? [];
    }
}
