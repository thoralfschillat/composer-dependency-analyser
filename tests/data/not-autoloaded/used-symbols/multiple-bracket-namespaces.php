<?php

namespace First {
    use Vendor\BeforeNamedBlock;

    new BeforeNamedBlock();
}

namespace Second {
    new BeforeNamedBlock(); // imported in the previous namespace only

    use Vendor\BeforeGlobalBlock;

    new BeforeGlobalBlock();
}

namespace {
    new BeforeGlobalBlock(); // imported in the previous namespace only
}
