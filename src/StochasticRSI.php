<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

class StochasticRSI
{
    /**
     * @var Stochastic
     */
    private Stochastic $stochastic;

    /**
     * @var RelativeStrengthIndex
     */
    private RelativeStrengthIndex $relativeStrengthIndex;

    /**
     * @var array
     */
    private array $result = [];

    /**
     * Constructor
     *
     * @param array $values
     * @param int $fastKPeriod
     * @param int $slowKPeriod
     * @param int $slowDPeriod
     */
    public function __construct(
        private readonly array $values,
        private readonly int $fastKPeriod,
        private readonly int $slowKPeriod,
        private readonly int $slowDPeriod,
    ) {
        $this->relativeStrengthIndex = new RelativeStrengthIndex($this->values, $this->fastKPeriod);
        $rsi = $this->relativeStrengthIndex->getResult();

        $this->stochastic = new Stochastic(
            $rsi,
            $rsi,
            $rsi,
            $this->fastKPeriod,
            $this->slowKPeriod,
            MovingAverageInterface::TRADER_MA_TYPE_SMA,
            $this->slowDPeriod,
            MovingAverageInterface::TRADER_MA_TYPE_SMA
        );

        $this->result = $this->stochastic->getResult();
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
     * @return array
     */
    public function getValue(): array
    {
        return [
            end($this->result[0]),
            end($this->result[1])
        ] ?? [];
    }
}
