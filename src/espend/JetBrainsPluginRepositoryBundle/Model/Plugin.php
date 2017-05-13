<?php

namespace espend\JetBrainsPluginRepositoryBundle\Model;

class Plugin
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $updateId = '0399652c-71fd-45e6-a85b-2e0c33edcdd7';

    /**
     * @var PluginStatistic
     */
    private $statistics;

    /**
     * Plugin constructor.
     *
     * @param string $id
     * @param string $name
     */
    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->statistics = new PluginStatistic(1,1, round(microtime(true) * 1000));
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUpdateId(): string
    {
        return $this->updateId;
    }

    /**
     * @return PluginStatistic
     */
    public function getStatistics(): PluginStatistic
    {
        return $this->statistics;
    }
}