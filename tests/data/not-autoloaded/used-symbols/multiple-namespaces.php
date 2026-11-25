<?php

namespace First;

use Vendor\BeforeSimpleName;

new BeforeSimpleName();

namespace Second;

new BeforeSimpleName(); // imported in the previous namespace only

use Vendor\BeforeQualifiedName;

new BeforeQualifiedName();

namespace Third\Sub;

new BeforeQualifiedName(); // imported in the previous namespace only

use Vendor\BeforeKeywordName;

new BeforeKeywordName();

namespace Match;

new BeforeKeywordName(); // imported in the previous namespace only

use Vendor\BeforeCloseTag;

new BeforeCloseTag();

namespace Fifth ?>
<?php

new BeforeCloseTag(); // imported in the previous namespace only
