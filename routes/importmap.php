<?php

use Tonysm\ImportmapLaravel\Facades\Importmap;

Importmap::pinAllFrom("resources/js", to: "js/", preload: true);
Importmap::pin("axios", to: "https://ga.jspm.io/npm:axios@0.27.2/index.js");
Importmap::pin("lodash", to: "https://ga.jspm.io/npm:lodash@4.17.21/lodash.js");
Importmap::pin("#lib/adapters/http.js", to: "https://ga.jspm.io/npm:axios@0.27.2/lib/adapters/xhr.js");
Importmap::pin("#lib/defaults/env/FormData.js", to: "https://ga.jspm.io/npm:axios@0.27.2/lib/helpers/null.js");
Importmap::pin("buffer", to: "https://ga.jspm.io/npm:@jspm/core@2.0.0-beta.26/nodelibs/browser/buffer.js");
Importmap::pin("@hotwired/stimulus", to: "https://ga.jspm.io/npm:@hotwired/stimulus@3.1.0/dist/stimulus.js");
Importmap::pin("@hotwired/stimulus-loading", to: "vendor/stimulus-laravel/stimulus-loading.js", preload: true);