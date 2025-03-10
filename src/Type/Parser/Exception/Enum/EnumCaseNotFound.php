<?php

declare(strict_types=1);

namespace CuyZ\Valinor\Type\Parser\Exception\Enum;

use CuyZ\Valinor\Type\Parser\Exception\InvalidType;
use RuntimeException;
use UnitEnum;

use function strpos;

/** @internal */
final class EnumCaseNotFound extends RuntimeException implements InvalidType
{
    /**
     * @param class-string<UnitEnum> $enumName
     */
    public function __construct(string $enumName, string $case)
    {
        $message = strpos($case, '*') !== false
            ? "Cannot find enum case with pattern `$enumName::$case`."
            : "Unknown enum case `$enumName::$case`.";

        parent::__construct($message, 1653468428);
    }
}
