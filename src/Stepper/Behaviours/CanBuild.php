<?php

declare(strict_types=1);

namespace ByTIC\Progress\Stepper\Behaviours;

use ByTIC\Progress\Stepper\Steps\StepCollection;

/**
 *
 */
trait CanBuild
{
    protected $built = false;

    /**
     * @return StepCollection
     */
    public function getSteps(): StepCollection
    {
        $this->checkBuild();
        return $this->steps;
    }

    protected function checkBuild(): void
    {
        if ($this->built) {
            return;
        }
        $this->doBuild();
        $this->built = true;
    }

    abstract protected function doBuild();
}

