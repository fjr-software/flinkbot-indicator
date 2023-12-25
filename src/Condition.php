<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

use LogicException;

class Condition
{
    public function __construct(
        private readonly IndicatorInterface $indicator,
        private readonly string $operator,
        private readonly float $value
    ) {
    }

    /**
     * Check if the condition is satisfied
     *
     * @return bool
     * @throws LogicException
     */
    public function isSatisfied(): bool
    {
        $result = array_map(
            [$this, 'condition'],
            $this->indicator->getValue()
        );

        return !in_array(false, $result, true);
    }

    /**
     * Check condition for given value
     *
     * @param float $value
     * @return bool
     * @throws LogicException
     */
    private function condition(float $value): bool
    {
        $operator = OperatorInterface::OPERATORS[$this->operator] ?? false;

        if (!$operator) {
            throw new LogicException('Unknown operator: ' . $this->operator);
        }

        return eval($this->parseOperator($value, $operator, $this->value));
    }

    /**
     * Parse operator
     *
     * @param float $value1
     * @param string $operator
     * @param float $value2
     * @return string
     */
    private function parseOperator(float $value1, string $operator, float $value2): string
    {
        return sprintf(
            'return %f %s %f;',
            $value1,
            $operator,
            $value2
        );
    }
}
