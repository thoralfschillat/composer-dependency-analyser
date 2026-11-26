<?php

namespace ClassKeywordIdentifier;

// A keyword taken for a class declaration makes later use statements look like trait uses.
// Each case imports its own class after the keyword, so a position that corrupts $inClassLevel fails on its own.

// T_CLASS as named argument - should not corrupt $inClassLevel
foo(class: 'x');

use Vendor\NamedArgument;

new NamedArgument();

class WithAttribute
{
    // T_INTERFACE as attribute argument - should not corrupt $inClassLevel
    #[Attr(interface: 'x')]
    private $property;
}

use Vendor\AttributeArgument;

new AttributeArgument();

interface WithMethod
{
    // T_CLASS after T_FUNCTION - should not corrupt $inClassLevel
    public function class(): void;
}

use Vendor\MethodName;

new MethodName();

interface WithReferenceMethod
{
    // T_TRAIT after "function &" - should not corrupt $inClassLevel
    public function &trait(): array;
}

use Vendor\MethodReturningReference;

new MethodReturningReference();

class WithTypedConstant
{
    // T_INTERFACE after the constant type - should not corrupt $inClassLevel
    public const string INTERFACE = 'x';
}

use Vendor\TypedConstant;

new TypedConstant();

class WithConstantList
{
    // T_TRAIT as second constant of a list - should not corrupt $inClassLevel
    public const FIRST = 1, TRAIT = 2;
}

use Vendor\ConstantList;

new ConstantList();

enum WithCase
{
    // T_INTERFACE after T_CASE - should not corrupt $inClassLevel
    case Interface;
}

use Vendor\EnumCase;

new EnumCase();

enum WithBackedCase: string
{
    // T_TRAIT after T_CASE, with a value - should not corrupt $inClassLevel
    case Trait = 'x';
}

use Vendor\BackedEnumCase;

new BackedEnumCase();

class WithAliasSource
{
    use SomeTrait {
        // T_INTERFACE as aliased trait method - should not corrupt $inClassLevel
        interface as other;
    }
}

use Vendor\TraitAliasSource;

new TraitAliasSource();

class WithAliasTarget
{
    use SomeTrait {
        // T_TRAIT after T_AS - should not corrupt $inClassLevel
        other as trait;
    }
}

use Vendor\TraitAliasTarget;

new TraitAliasTarget();

class WithEnumAliasSource
{
    use SomeTrait {
        // T_ENUM as aliased trait method (the lexer emits T_ENUM when a name follows) - should not corrupt $inClassLevel
        enum as other;
    }
}

use Vendor\EnumTraitAliasSource;

new EnumTraitAliasSource();
