<?php

namespace ByTIC\Progress\Tests\Fixtures\Stepper;

use ByTIC\Progress\Stepper\Steps\ProgressStep;

class BuiltProgressStepper extends \ByTIC\Progress\Stepper\ProgressStepper
{
    use \ByTIC\Progress\Stepper\Behaviours\CanBuild;

    protected function doBuild(): void
    {
        $this->addStep(new ProgressStep('step1', 'Step 1', 'icon1'));
        $this->addStep(new ProgressStep('step2', 'Step 2', 'icon2'));
    }
}