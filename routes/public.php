<?php

use App\Documentation;
use App\Guide;
use Illuminate\Support\Facades\Route;

// Cache them for 30mins...
Route::middleware(['cache.headers:public;max_age=1800;etag'])->group(function () {
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
});

Route::get('/up', function () {
    return response(
        <<<HTML
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Application is Up!</title>
        </head>
        <body style="height: 100%; background-color: green;">
        </body>
        </html>
        HTML,
        status: 200,
    );
});
