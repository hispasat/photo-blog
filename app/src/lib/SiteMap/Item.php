<?php

namespace Lib\SiteMap;

use Lib\SiteMap\Contracts\Item as ItemContract;

/**
 * Class SiteMapItem.
 *
 * @package Lib\SiteMap
 */
class Item implements ItemContract
{
    protected $location;
    protected $lastModified;
    protected $changeFrequency;
    protected $priority;

    /**
     * @inheritdoc
     */
    public function __construct(
        string $location = '',
        string $lastModified = '',
        string $changeFrequency = '',
        string $priority = ''
    )
    {
        $this->setLocation($location);
        $this->setLastModified($lastModified);
        $this->setChangeFrequency($changeFrequency);
        $this->setPriority($priority);
    }

    /**
     * @inheritdoc
     */
    public function setLocation(string $value)
    {
        $this->location = $value;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @inheritdoc
     */
    public function hasLocation(): bool
    {
        return !!$this->location;
    }

    /**
     * @inheritdoc
     */
    public function setLastModified(string $value)
    {
        $this->lastModified = $value;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLastModified(): string
    {
        return $this->lastModified;
    }

    /**
     * @inheritdoc
     */
    public function hasLastModified(): bool
    {
        return !!$this->lastModified;
    }

    /**
     * @inheritdoc
     */
    public function setChangeFrequency(string $value)
    {
        $this->changeFrequency = $value;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getChangeFrequency(): string
    {
        return $this->changeFrequency;
    }

    /**
     * @inheritdoc
     */
    public function hasChangeFrequency(): bool
    {
        return !!$this->changeFrequency;
    }

    /**
     * @inheritdoc
     */
    public function setPriority(string $value)
    {
        $this->priority = $value;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPriority(): string
    {
        return $this->priority;
    }

    /**
     * @inheritdoc
     */
    public function hasPriority(): bool
    {
        return !!$this->priority;
    }
}
