<?php

namespace App\Markdown;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;
use League\Config\ConfigurationBuilderInterface;
use Nette\Schema\Expect;

class DocsLinksExtension implements ExtensionInterface, NodeRendererInterface, ConfigurableExtensionInterface
{
    private string $currentVersion;
    private ?string $frame;

    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $builder->addSchema('docs_links', Expect::structure([
            'current_version' => Expect::string()->default(DEFAULT_VERSION),
            'frame' => Expect::string()->default(''),
        ]));
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        if ($environment->getConfiguration()->exists('docs_links')) {
            $this->currentVersion = $environment->getConfiguration()->get('docs_links/current_version');
            $this->frame = $environment->getConfiguration()->get('docs_links/frame') ?: null;

            $environment->addRenderer(Link::class, $this, 10);
        }
    }

    /**
     * @return \Stringable|string|null
     *
     * @throws \InvalidArgumentException if the wrong type of Node is provided
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        assert($node instanceof Link);

        return new HtmlElement('a', array_filter([
            'title' => $node->getTitle() ?: null,
            'href' => str_replace(urlencode('{{version}}'), $this->currentVersion, $node->getUrl()),
            'data-turbo-frame' => $this->frame,
        ]), $childRenderer->renderNodes($node->children()));
    }
}
