<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

interface IndicatorInterface
{
    /**
     * Set symbol price
     *
     * @param float $price
     * @return void
     */
    public function setSymbolPrice(float $price): void;

    /**
     * Get symbol price
     *
     * @return float
     */
    public function getSymbolPrice(): float;

    /**
     * Get result
     *
     * @return array
     */
    public function getResult(): array;

    /**
     * Get value
     *
     * @return array
     */
    public function getValue(): array;
}
