<?php

namespace App;

use App\Markdown\CalloutExtension;
use App\Markdown\DocsLinksExtension;
use App\Markdown\DocsVersionExtension;
use App\Markdown\LinksToTurboFrameExtension;
use Laravel\Unfenced\UnfencedExtension;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\MarkdownConverter;
use Torchlight\Commonmark\V2\TorchlightExtension;

class Markdown
{
    public function convert(string $content, array $configs = []): string
    {
        return $this->makeConverter($configs)->convert($content);
    }

    private function makeConverter(array $configs = []): MarkdownConverter
    {
        $environment = new Environment(array_replace_recursive([
            'table_of_contents' => [
                'html_class' => 'table-of-contents',
                'position' => 'placeholder',
                'style' => 'bullet',
                'min_heading_level' => 2,
                'max_heading_level' => 6,
                'normalize' => 'relative',
                'placeholder' => '[TOC]',
            ],
            'heading_permalink' => [
                'html_class' => 'heading-permalink',
                'insert' => 'after',
                'symbol' => '¶',
                'title' => "Permalink",
            ],
        ], $configs));

        $environment->addExtension(new DocsLinksExtension());
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new CalloutExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());
        $environment->addExtension(new AttributesExtension());
        $environment->addExtension(new TorchlightExtension());
        $environment->addExtension(new HeadingPermalinkExtension());
        $environment->addExtension(new TableOfContentsExtension());
        $environment->addExtension(new UnfencedExtension());

        return new MarkdownConverter($environment);
    }
}
