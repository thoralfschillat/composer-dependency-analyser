<?php

namespace App {
    LocalToApp::call(); // not global, App\LocalToApp
}

namespace {
    // global scope: names are not relative to any namespace
    new Vendor\Package\Qualified();
    UnknownGlobal::call();
    new PDO();
}

namespace Other {
    LocalToOther::call(); // not global, Other\LocalToOther
    new PDO(); // not global, Other\PDO
}
