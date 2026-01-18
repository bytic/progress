<?php

declare(strict_types=1);

namespace ByTIC\Progress\Stepper\Behaviours;

use ByTIC\Progress\Stepper\Steps\StepCollection;

/**
 *
 */
trait CanEvaluate
{
    protected $evaluation = null;

    public function evaluation()
    {
        if ($this->evaluation === null) {
            $this->doEvaluation();
        }
        return $this->evaluation;
    }

    protected function doEvaluation()
    {
        $this->evaluation = [];
        $steps = $this->getSteps();
        foreach ($steps as $step) {
            $step->evaluate();
        }
    }

    abstract public function getSteps(): StepCollection;
}