<?php

use Illuminate\Support\Facades\Route;
use Facades\App\Documentation;
use Facades\App\Guide;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', '1.x');
}

Route::domain('bootcamp.turbo-laravel.com', function () {
    Route::redirect('/', '/guides/introduction');
});

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

Route::get('guides/{page?}', function (?string $page = null) {
    if (! $page || ! Guide::pageExists($page)) {
        return redirect('/guides/introduction');
    }

    [$index, $content] = Guide::render($page);

    return view('guides', [
        'page' => $page,
        'index' => $index,
        'content' => $content,
    ]);
})->name('guides.index');
