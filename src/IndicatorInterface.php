<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

interface IndicatorInterface
{
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
