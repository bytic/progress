<?php

namespace ByTIC\Progress\Stepper\Steps;

use Nip\Collections\Typed\ClassCollection;

/**
 * Class StepCollection
 * @package ByTIC\Progress\Stepper
 */
class StepCollection extends ClassCollection
{
    protected $validClass = ProgressStep::class;

    /**
     * @return ProgressStep|null
     */
    public function firstNotDone()
    {
        return $this->first(function (ProgressStep $step) {
            return $step->isDone() === false;
        });
    }
}