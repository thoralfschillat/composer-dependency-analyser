<?php

namespace App;

// Each case imports its own class, so a position that resets the use statements fails on its own.

use Vendor\NamedArgument;

// T_NAMESPACE as named argument - should not reset use statements
foo(namespace: 'x');

new NamedArgument();

use Vendor\AttributeArgument;

// T_NAMESPACE as attribute argument - should not reset use statements
#[Attr(namespace: 'x')]
class WithAttribute {}

new AttributeArgument();

use Vendor\MethodName;

class WithMethod
{
    // T_NAMESPACE after T_FUNCTION - should not reset use statements
    public function namespace(): void {}
}

new MethodName();

use Vendor\MethodReturningReference;

class WithReferenceMethod
{
    // T_NAMESPACE after "function &" - should not reset use statements
    public function &namespace(): array {}
}

new MethodReturningReference();

use Vendor\TypedConstant;

class WithTypedConstant
{
    // T_NAMESPACE after the constant type - should not reset use statements
    public const string NAMESPACE = 'x';
}

new TypedConstant();

use Vendor\ConstantList;

class WithConstantList
{
    // T_NAMESPACE as second constant of a list - should not reset use statements
    public const FIRST = 1, NAMESPACE = 2;
}

new ConstantList();

use Vendor\EnumCase;

enum WithCase
{
    // T_NAMESPACE after T_CASE - should not reset use statements
    case Namespace;
}

new EnumCase();

use Vendor\BackedEnumCase;

enum WithBackedCase: string
{
    // T_NAMESPACE after T_CASE, with a value - should not reset use statements
    case Namespace = 'x';
}

new BackedEnumCase();

use Vendor\TraitAliasSource;

class WithAliasSource
{
    use SomeTrait {
        // T_NAMESPACE as aliased trait method - should not reset use statements
        namespace as other;
    }
}

new TraitAliasSource();

use Vendor\TraitAliasTarget;

class WithAliasTarget
{
    use SomeTrait {
        // T_NAMESPACE after T_AS - should not reset use statements
        other as namespace;
    }
}

new TraitAliasTarget();

use Vendor\TraitAliasTargetWithVisibility;

class WithVisibleAliasTarget
{
    use SomeTrait {
        // T_NAMESPACE after T_AS and a visibility modifier - should not reset use statements
        other as protected namespace;
    }
}

new TraitAliasTargetWithVisibility();
