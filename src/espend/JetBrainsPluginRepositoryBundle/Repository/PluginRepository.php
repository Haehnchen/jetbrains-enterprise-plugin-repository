<?php

namespace espend\JetBrainsPluginRepositoryBundle\Repository;

use espend\JetBrainsPluginRepositoryBundle\Model\Plugin;

class PluginRepository
{
    /**
     * @return Plugin[]
     */
    public function findAll(): array
    {
        return $this->getPlugins();
    }

    /**
     * @param string $id
     * @return Plugin|null
     */
    public function findOneById(string $id)
    {
        foreach ($this->getPlugins() as $plugin) {
            if ($plugin->getId() === $id) {
                return $plugin;
            }
        }

        return null;
    }

    /**
     * @param string $updateId
     * @return Plugin|null
     */
    public function findOneByUpdateId(string $updateId)
    {
        foreach ($this->getPlugins() as $plugin) {
            if ($plugin->getUpdateId() === $updateId) {
                return $plugin;
            }
        }

        return null;
    }

    /**
     * @return Plugin[]
     */
    private function getPlugins(): array
    {
        return [
            new Plugin('foobar', 'foobar'),
            new Plugin('foobar2', 'foobar2'),
        ];
    }
}