<?php

use App\Documentation;
use App\Guide;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('docs/{page?}', function (?string $page = null) {
    return redirect('/docs/' . Documentation::DEFAULT_VERSION . '/' . ($page ?? 'installation'));
})->name('docs.index');

Route::get('change-version', function () {
    $version = request()->input('version');
    $page = request()->input('page');

    return redirect('/docs/' . $version . '/' . $page);
})->name('change-version');

Route::get('docs/{version}/{page?}', function (Documentation $docs, string $version, ?string $page = null) {
    if (! $docs->isVersion($version)) {
        return redirect('/docs/' . Documentation::DEFAULT_VERSION . '/'. $page, 301);
    }

    if (! $docs->pageExistsInVersion($version, $page)) {
        return redirect('/docs/' . $version . '/installation', 301);
    }

    [$index, $content] = $docs->render($version, $page ?? 'installation');

    return view('docs', [
        'page' => $page,
        'currentVersion' => $version,
        'versions' => $docs->getVersions(),
        'index' => $index,
        'content' => $content,
    ]);
});

Route::get('guides/{page?}', function (Guide $guide, ?string $page = null) {
    if (! $page || ! $guide->pageExists($page)) {
        return redirect('/guides/introduction');
    }

    [$index, $content] = $guide->render($page);

    return view('guides', [
        'page' => $page,
        'index' => $index,
        'content' => $content,
    ]);
})->name('guides.index');
