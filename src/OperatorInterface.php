<?php

declare(strict_types=1);

namespace FjrSoftware\Flinkbot\Indicator;

interface OperatorInterface
{
    /**
     * @const string
     */
    public const GREATER = 'greater';

    /**
     * @const string
     */
    public const GREATER_OPERATOR = '>';

    /**
     * @const string
     */
    public const GREATER_EQUAL = 'greater_equal';

    /**
     * @const string
     */
    public const GREATER_EQUAL_OPERATOR = '>=';

    /**
     * @const string
     */
    public const LESS = 'less';

    /**
     * @const string
     */
    public const LESS_OPERATOR = '<';

    /**
     * @const string
     */
    public const LESS_EQUAL = 'less_equal';

    /**
     * @const string
     */
    public const LESS_EQUAL_OPERATOR = '<=';

    /**
     * @const string
     */
    public const EQUAL = 'equal';

    /**
     * @const string
     */
    public const EQUAL_OPERATOR = '==';

    /**
     * @const array
     */
    public const OPERATORS = [
        self::GREATER => self::GREATER_OPERATOR,
        self::GREATER_EQUAL => self::GREATER_EQUAL_OPERATOR,
        self::LESS => self::LESS_OPERATOR,
        self::LESS_EQUAL => self::LESS_EQUAL_OPERATOR,
        self::EQUAL => self::EQUAL_OPERATOR,
    ];
}
