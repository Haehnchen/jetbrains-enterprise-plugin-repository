<?php
declare(strict_types=1);

namespace espend\JetBrainsPluginRepositoryBundle\Utils;

class SimpleXMLElementExtended extends \SimpleXMLElement
{
    /**
     * {@inheritdoc}
     */
    public function addChild($name, $value = null, $namespace = null)
    {
        if (is_string($value) && $this->needsCdataWrapping($value)) {
            return $this->addChildWithCDATA($name, $value, $namespace);
        }

        return parent::addChild($name, $value, $namespace);
    }

    /**
     * Wrap cdata to xml element
     *
     * @param $name
     * @param null $value
     * @param null $namespace
     *
     * @return mixed|\SimpleXMLElement
     */
    private function addChildWithCDATA($name, $value = null, $namespace = null)
    {
        $child = $this->addChild($name, null, $namespace);

        if ($child !== null) {
            $node = dom_import_simplexml($child);
            $no = $node->ownerDocument;
            $node->appendChild($no->createCDATASection($value));
        }

        return $child;
    }

    /**
     * Check for cars with need to wrapped with cdata element
     *
     * @param string $val
     * @return bool
     */
    private function needsCdataWrapping(string $val): bool
    {
        return preg_match('/[<>&]/', $val) == true;
    }
}