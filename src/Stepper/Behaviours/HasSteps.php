<?php

declare(strict_types=1);

namespace ByTIC\Progress\Stepper\Behaviours;

use ByTIC\Progress\Stepper\Steps\ProgressStep;
use ByTIC\Progress\Stepper\Steps\StepCollection;

/**
 *
 */
trait HasSteps
{
    /**
     * @var StepCollection|ProgressStep[]
     */
    protected $steps;

    protected function initSteps($steps = []): void
    {
        $collectionClass = $this->stepCollection();
        $this->steps = new $collectionClass();
        $this->setSteps($steps);
    }

    protected function stepCollection(): string
    {
        return StepCollection::class;
    }
}