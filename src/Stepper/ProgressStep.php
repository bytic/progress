<?php

namespace ByTIC\Progress\Stepper;

/**
 * Class ProgressStep
 * @package ByTIC\Progress\Stepper
 */
class ProgressStep
{
    protected $name = '';
    protected $done = false;
    protected $active = false;
    protected $label = null;
    protected $icon = null;

    /**
     * ProgressStep constructor.
     * @param string $name
     * @param null $label
     * @param null $icon
     */
    public function __construct(string $name, $label, $icon)
    {
        $this->name = $name;
        $this->label = $label;
        $this->icon = $icon;
    }

    /**
     * @param $name
     * @param null $label
     * @param null $icon
     * @return static
     */
    public static function build($name, $label = null, $icon = null): ProgressStep
    {
        return new static($name, $label, $icon);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->done;
    }

    /**
     * @param bool $done
     */
    public function setDone(bool $done): void
    {
        $this->done = $done;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     */
    public function setIcon(string $icon)
    {
        $this->icon = $icon;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
