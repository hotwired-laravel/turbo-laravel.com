<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use SplFileInfo;

class Documentation
{
    const DEFAULT_VERSION = '1.x';

    public function __construct(private Markdown $markdown)
    {
    }

    public function render(string $version, string $page): array
    {
        $index = Cache::remember(md5($version . $page . '-index-v1'), now()->addMinutes(5), fn () => $this->markdown->convert(File::get(resource_path("docs/{$version}/index.md")), [
            'docs_links' => [
                'frame' => 'docs-content',
                'current_version' => $version,
            ],
        ]));

        $content = Cache::remember(md5($version . $page . '-content-v1'), now()->addMinutes(5), fn () => $this->markdown->convert(File::get(resource_path("docs/{$version}/{$page}.md")), [
            'docs_links' => [
                'current_version' => $version,
            ],
        ]));

        return [$index, $content];
    }

    public static function getVersions(): array
    {
        return ['2.x', '1.x'];
    }

    public function isVersion(string $version)
    {
        return in_array($version, self::getVersions(), true);
    }

    public function pageExistsInVersion(string $version, string $page)
    {
        return collect(File::files(resource_path('docs/' . $version)))
            ->filter(fn (SplFileInfo $file) => $file->getFilename() !== 'index.md')
            ->filter(fn (SplFileInfo $file) => $file->getFilename() === ($page . '.md'))
            ->isNotEmpty();
    }
}
