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

class DocsVersionExtension implements ExtensionInterface, NodeRendererInterface, ConfigurableExtensionInterface
{
    private string $currentVersion;

    public function configureSchema(ConfigurationBuilderInterface $builder): void
    {
        $builder->addSchema('docs_version', Expect::structure([
            'current_version' => Expect::string()->default(DEFAULT_VERSION),
        ]));
    }

    public function register(EnvironmentBuilderInterface $environment): void
    {
        if ($environment->getConfiguration()->exists('docs_version')) {
            $this->currentVersion = $environment->getConfiguration()->get('docs_version/current_version');

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
        ]), $childRenderer->renderNodes($node->children()));
    }
}
