<?php

namespace ByTIC\Progress\Tests\Fixtures\Stepper\Steps;
use ByTIC\Progress\Stepper\Steps\Behaviours\CanEvaluate;
use ByTIC\Progress\Stepper\Steps\Behaviours\HasUrl;
use ByTIC\Progress\Stepper\Steps\ProgressStep;

/**
 *
 */
class EnhancedStep extends ProgressStep
{
    use HasUrl;
    use CanEvaluate;

    public $isDone = false;
    public $isActive = false;

    protected function evaluateIsDone(): bool
    {
        return $this->isDone;
    }

    protected function evaluateIsActive(): bool
    {
        return $this->isActive;
    }
}