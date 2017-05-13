<?php

namespace espend\JetBrainsPluginRepositoryBundle\Model;

class PluginStatistic
{
    /**
     * @var int
     */
    private $downloads = 0;

    /**
     * @var int
     */
    private $size = 0;

    /**
     * microtime
     * @var int
     */
    private $date = 0;

    /**
     * PluginStatistic constructor.
     * @param int $downloads
     * @param int $size
     * @param int $date
     */
    public function __construct(int $downloads, int $size, int $date)
    {
        $this->downloads = $downloads;
        $this->size = $size;
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getDownloads(): int
    {
        return $this->downloads;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }
}
