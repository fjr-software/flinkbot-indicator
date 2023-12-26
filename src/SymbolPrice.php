<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

class SymbolPrice implements IndicatorInterface
{
    /**
     * @var array
     */
    private array $result = [];

    /**
     * Constructor
     *
     * @param array $values
     */
    public function __construct(
        private readonly array $values
    ) {
        $this->result = $this->values;
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
