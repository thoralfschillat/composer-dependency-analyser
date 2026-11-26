<?php

namespace App;

// A trait use that is taken for an import registers the trait name, so the "new" after each case would be detected.

$plain = new class {
    use PlainTrait; // trait use, NOT an import
};

new PlainTrait();

$extending = new class (1) extends Base implements Contract {
    use ExtendingTrait; // trait use, NOT an import
};

new ExtendingTrait();

$readonly = new readonly class {
    use ReadonlyTrait; // trait use, NOT an import
};

new ReadonlyTrait();

$withAttribute = new #[Attr] class {
    use AttributeTrait; // trait use, NOT an import
};

new AttributeTrait();
