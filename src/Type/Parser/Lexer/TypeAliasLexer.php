<?php

declare(strict_types=1);

namespace CuyZ\Valinor\Type\Parser\Lexer;

use CuyZ\Valinor\Type\Parser\Lexer\Token\Token;
use CuyZ\Valinor\Type\Parser\Lexer\Token\TypeToken;
use CuyZ\Valinor\Type\Type;

/** @internal */
final class TypeAliasLexer implements TypeLexer
{
    private TypeLexer $delegate;

    /** @var array<string, Type> */
    private array $aliases;

    /**
     * @param array<string, Type> $aliases
     */
    public function __construct(TypeLexer $delegate, array $aliases)
    {
        $this->delegate = $delegate;
        $this->aliases = $aliases;
    }

    public function tokenize(string $symbol): Token
    {
        if (isset($this->aliases[$symbol])) {
            return new TypeToken($this->aliases[$symbol], $symbol);
        }

        return $this->delegate->tokenize($symbol);
    }
}
