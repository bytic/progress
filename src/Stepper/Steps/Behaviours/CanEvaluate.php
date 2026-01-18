<?php

declare(strict_types=1);

namespace ByTIC\Progress\Stepper\Steps\Behaviours;

/**
 *
 */
trait CanEvaluate
{
    protected $evaluated = false;

    public function isEvaluated(): bool
    {
        return $this->evaluated;
    }

    public function setEvaluated(bool $evaluated): void
    {
        $this->evaluated = $evaluated;
    }

    public function evaluate()
    {
        $this->doEvaluation();
        // Implement evaluation logic here
        $this->setEvaluated(true);
    }

    protected function doEvaluation()
    {
        $this->setDone($this->evaluateIsDone());
        $this->setActive($this->evaluateIsActive());
    }

    abstract public function setDone(bool $done);
    abstract public function setActive(bool $active);
    abstract protected function evaluateIsDone(): bool;

    abstract protected function evaluateIsActive(): bool;
}