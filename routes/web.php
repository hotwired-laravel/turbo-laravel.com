<?php

use Illuminate\Support\Facades\Route;
use Facades\App\Documentation;
use League\CommonMark\Node\Block\Document;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', '2.x');
}

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('docs/{page?}', function (?string $page = null) {
    return redirect('/docs/' . DEFAULT_VERSION . '/' . ($page ?? 'installation'));
})->name('docs.index');

Route::get('change-version', function () {
    $version = request()->input('version');
    $page = request()->input('page');

    return redirect('/docs/' . $version . '/' . $page);
})->name('change-version');

Route::get('docs/{version}/{page?}', function (string $version, ?string $page = null) {
    if (! Documentation::isVersion($version)) {
        return redirect('/docs/' . DEFAULT_VERSION . '/'. $page, 301);
    }

    if (! Documentation::pageExistsInVersion($version, $page)) {
        return redirect('/docs/' . $version . '/installation', 301);
    }

    [$index, $content] = Documentation::render($version, $page ?? 'installation');

    return view('docs', [
        'page' => $page,
        'currentVersion' => $version,
        'versions' => Documentation::getVersions(),
        'index' => $index,
        'content' => $content,
    ]);
});
