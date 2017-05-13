<?php

namespace espend\JetBrainsPluginRepositoryBundle\Factory;

use espend\JetBrainsPluginRepositoryBundle\Model\Plugin;
use espend\JetBrainsPluginRepositoryBundle\Utils\SimpleXMLElementExtended;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PluginListFactory
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param Plugin[] $plugins
     * @return string
     */
    public function create(array $plugins): string
    {
        $xml = new SimpleXMLElementExtended("<plugin-repository/>");

        foreach ($plugins as $plugin) {
            $this->buildPluginStructure($xml, $plugin);
        }

        return $xml->asXML();
    }

    /**
     * @param Plugin $plugin
     * @return string
     */
    public function createPlugin(Plugin $plugin): string
    {
        $xml = new SimpleXMLElementExtended("<plugin-repository/>");

        $this->buildPluginStructure($xml, $plugin);

        return $xml->asXML();
    }

    /**
     * @param \SimpleXMLElement $xml
     * @param Plugin $plugin
     */
    private function buildPluginStructure(\SimpleXMLElement $xml, Plugin $plugin)
    {
        $ideaPlugin = $xml->addChild('idea-plugin');

        $ideaPlugin->addAttribute('downloads', $plugin->getStatistics()->getDownloads());
        $ideaPlugin->addAttribute('size', $plugin->getStatistics()->getSize());
        $ideaPlugin->addAttribute('date', $plugin->getStatistics()->getDate());

        $ideaPlugin->addAttribute('url', $this->urlGenerator->generate('plugin_show', [
            'pluginId' => $plugin->getId(),
        ], UrlGeneratorInterface::ABSOLUTE_URL));

        $ideaPlugin->addChild('id', $plugin->getId());
        $ideaPlugin->addChild('name', $plugin->getName());
        $ideaPlugin->addChild('rating', '4.3');
        $ideaPlugin->addChild('description', 'Foobar Description');
        $ideaPlugin->addChild('version', '1.6');
        $ideaPlugin->addChild('change-notes', 'My changes');

        $ideaPlugin->addChild('download-url', $this->urlGenerator->generate('plugin_download', [
            'updateId' => $plugin->getUpdateId(),
        ], UrlGeneratorInterface::ABSOLUTE_URL));
    }
}