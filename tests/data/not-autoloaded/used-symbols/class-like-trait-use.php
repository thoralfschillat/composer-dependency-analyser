<?php

namespace ClassLikeTraitUse;

// A trait use that is taken for an import registers the trait name, so the "new" after each case would be detected.

enum WithTraitUse {
    use UsedByEnum; // trait use, NOT an import
}

new UsedByEnum();

trait WithNestedTraitUse {
    use UsedByTrait; // trait use, NOT an import
}

new UsedByTrait();
