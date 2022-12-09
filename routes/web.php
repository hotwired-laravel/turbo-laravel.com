<?php

use Illuminate\Support\Facades\Route;
use Facades\App\Documentation;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', '1.x');
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('docs/{page?}', function (?string $page = null) {
    return redirect('/docs/' . DEFAULT_VERSION . '/' . ($page ?? 'installation'));
})->name('docs.index');

Route::get('docs/{version}/{page?}', function (string $version, ?string $page = null) {
    if (! Documentation::isVersion($version)) {
        return redirect('/docs/' . DEFAULT_VERSION . '/'. $page, 301);
    }

    if (! Documentation::pageExistsInVersion($version, $page)) {
        return redirect('/docs/' . $version . '/installation', 301);
    }

    [$index, $content] = Documentation::render($version, $page ?? 'installation');

    return view('docs', [
        'index' => $index,
        'content' => $content,
    ]);
});
