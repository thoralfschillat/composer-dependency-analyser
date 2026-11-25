<?php

namespace App;

use Carbon\Carbon;

class ConstClass
{
    // T_NAMESPACE after T_CONST - should not reset use statements
    public const NAMESPACE = 'some-namespace';

    public function test(): void
    {
        // Carbon should be detected here (after const NAMESPACE definition)
        Carbon::now();
    }
}

class IssueHere
{
    public function init(): void
    {
        // T_NAMESPACE after T_DOUBLE_COLON - should not reset use statements
        $namespace = ConstClass::NAMESPACE;

        // Carbon should still be detected here (after ::NAMESPACE access)
        Carbon::now();
    }
}

class HookedProperty
{
    // T_NAMESPACE after T_DOUBLE_COLON, followed by a property hook - should not reset use statements
    public string $namespace = ConstClass::NAMESPACE { get => $this->namespace; }

    public function test(): void
    {
        // Carbon should still be detected here (after ::NAMESPACE and the hook's opening brace)
        Carbon::now();
    }
}
