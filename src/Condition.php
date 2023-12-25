<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

use LogicException;

class Condition
{
    /**
     * Constructor
     *
     * @param IndicatorInterface|IndicatorInterface[] $indicator
     * @param string $operator
     * @param float|array $value
     */
    public function __construct(
        private readonly IndicatorInterface|array $indicator,
        private readonly string $operator,
        private readonly float|array $value
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
        $indicators = is_array($this->indicator) ? $this->indicator : [$this->indicator];
        $values = is_array($this->value) ? $this->value : [$this->value];
        $result = [];

        foreach ($indicators as $indicator) {
            foreach ($indicator->getValue() as $key => $value) {
                $result[] = $this->condition($value, $values[$key] ?? $values[0]);
            }
        }

        return !in_array(false, $result, true);
    }

    /**
     * Check condition for given value
     *
     * @param float $value1
     * @param float $value2
     * @return bool
     * @throws LogicException
     */
    private function condition(float $value1, float $value2): bool
    {
        $operator = OperatorInterface::OPERATORS[$this->operator] ?? false;

        if (!$operator) {
            throw new LogicException('Unknown operator: ' . $this->operator);
        }

        return eval($this->parseOperator($value1, $operator, $value2));
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
