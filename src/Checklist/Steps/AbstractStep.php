<?php

declare(strict_types=1);

namespace ByTIC\Progress\Checklist\Steps;

/**
 *
 */
abstract class AbstractStep
{
    /**
     * The name of the step being evaluated.
     *
     * @var string
     */
    public string $name;

    protected ?string $label = null;

    protected ?string $description = null;

    /**
     * The passed status of the step class.
     *
     * @var bool
     */
    protected $passed = null;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Evaluate the Step and determine if it passed or failed.
     * True for passed, false for failed.
     *
     * @return bool
     */
    public function passed(): bool
    {
        if ($this->passed === null) {
            $this->passed = $this->evaluate();
        }

        return (bool)$this->passed;
    }

    /**
     * Evaluate the step and store the result in the $passed property.
     */
    abstract protected function evaluate(): bool;

    /**
     * @param bool $passed
     */
    public function setPassed(bool $passed): void
    {
        $this->passed = $passed;
    }

    /**
     * @return string|null
     */
    public function label(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     * @return AbstractStep
     */
    public function withLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return AbstractStep
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

}