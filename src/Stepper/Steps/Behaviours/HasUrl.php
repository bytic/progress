<?php

declare(strict_types=1);

namespace ByTIC\Progress\Stepper\Steps\Behaviours;

/**
 *
 */
trait HasUrl
{
    protected $url = false;
    protected ?bool $linkable = null;

    /**
     * @return null
     */
    public function getUrl()
    {
        if ($this->url === false) {
            $this->url = $this->generateUrl();
        }
        return $this->url;
    }

    public function hasUrl(): bool
    {
        return !empty($this->getUrl());
    }

    /**
     * @param null $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return null
     */
    public function isLinkable()
    {
        if ($this->linkable === null) {
            $this->linkable = $this->generateLinkable();
        }
        return $this->linkable;
    }

    /**
     * @param null $linkable
     */
    public function setLinkable($linkable): void
    {
        $this->linkable = $linkable;
    }

    protected function generateUrl()
    {
        return null;
    }

    protected function generateLinkable(): bool
    {
        return $this->getUrl() !== null;
    }
}