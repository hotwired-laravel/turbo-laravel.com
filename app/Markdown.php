<?php

namespace App;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\MarkdownConverter;
use Torchlight\Commonmark\V2\TorchlightExtension;

class Markdown
{
    private MarkdownConverter $converter;

    public function __construct(?MarkdownConverter $converter = null)
    {
        $this->converter = $converter ?? $this->makeConverter();
    }

    private function makeConverter(): MarkdownConverter
    {
        $environment = new Environment([]);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());
        $environment->addExtension(new AttributesExtension());
        $environment->addExtension(new TorchlightExtension());

        return new MarkdownConverter($environment);
    }

    public function convert(string $content): string
    {
        return $this->converter->convert($content);
    }
}
