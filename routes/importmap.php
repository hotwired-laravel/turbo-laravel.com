<?php

use Tonysm\ImportmapLaravel\Facades\Importmap;

Importmap::pinAllFrom("resources/js", to: "js/");

Importmap::pin("@hotwired/stimulus-loading", to: "vendor/stimulus-laravel/stimulus-loading.js");
Importmap::pin("@hotwired/stimulus", to: "/js/vendor/@hotwired--stimulus.js"); // @3.2.2
Importmap::pin("@hotwired/turbo", to: "/js/vendor/@hotwired--turbo.js"); // Unknown Version
Importmap::pin("el-transition", to: "/js/vendor/el-transition.js"); // @0.0.7
