<?php

namespace App;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use SplFileInfo;

class Guide
{
    public function __construct(private Markdown $markdown)
    {
    }

    public function render(string $page): array
    {
        $index = Cache::remember(md5($page . '-guide-index-v4'), now()->addMinutes(5), fn () => $this->markdown->convert(File::get(resource_path("guides/index.md")), [
            'docs_links' => [
                'frame' => 'docs-content',
            ],
        ]));

        $content = Cache::remember(md5($page . '-guide-v4'), now()->addMinutes(5), fn () => $this->markdown->convert(File::get(resource_path("guides/{$page}.md")), [
            'docs_links' => [],
        ]));

        return [$index, $content];
    }

    public function pageExists(string $page)
    {
        return collect(File::files(resource_path('guides')))
            ->filter(fn (SplFileInfo $file) => $file->getFilename() !== 'index.md')
            ->filter(fn (SplFileInfo $file) => $file->getFilename() === ($page . '.md'))
            ->isNotEmpty();
    }
}
