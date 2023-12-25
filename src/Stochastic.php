<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

class Stochastic implements IndicatorInterface
{
    private array $result = [];

    /**
     * Constructor
     *
     * @param array $high
     * @param array $low
     * @param array $close
     * @param int $fastKPeriod
     * @param int $slowKPeriod
     * @param int $slowKMAType
     * @param int $slowDPeriod
     * @param int $slowDMAType
     */
    public function __construct(
        private readonly array $high,
        private readonly array $low,
        private readonly array $close,
        private readonly int $fastKPeriod,
        private readonly int $slowKPeriod,
        private readonly int $slowKMAType,
        private readonly int $slowDPeriod,
        private readonly int $slowDMAType
    ) {
        $this->result = trader_stoch(
            $this->high,
            $this->low,
            $this->close,
            $this->fastKPeriod,
            $this->slowKPeriod,
            $this->slowKMAType,
            $this->slowDPeriod,
            $this->slowDMAType
        ) ?? [];
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
