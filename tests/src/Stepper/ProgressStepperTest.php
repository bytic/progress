<?php

namespace ByTIC\Progress\Tests\Stepper;

use ByTIC\Progress\Stepper\ProgressStep;
use ByTIC\Progress\Stepper\ProgressStepper;
use ByTIC\Progress\Tests\AbstractTest;

/**
 * Class ProgressStepperTest
 * @package ByTIC\Progress\Tests\Stepper
 */
class ProgressStepperTest extends AbstractTest
{
    public function test_build_chain()
    {
        $stepper = ProgressStepper::build()
            ->addStep(ProgressStep::build('step1', 'Step 1'))
            ->addStep(ProgressStep::build('step2', 'Step 2'))
            ->addStep(ProgressStep::build('step3', 'Step 3'));

        self::assertCount(3, $stepper->getSteps());
    }

    public function test_set_current()
    {
        $step = ProgressStep::build('step1', 'Step 1');

        $stepper = ProgressStepper::build()->addStep($step);
        self::assertNull( $stepper->getCurrent());

        $stepper->setCurrent('step1');
        self::assertSame('step1', $stepper->getCurrent());

        $stepper->setCurrent($step);
        self::assertSame('step1', $stepper->getCurrent());

        $stepper->setCurrent(null);
        self::assertNull( $stepper->getCurrent());

        self::expectException(\InvalidArgumentException::class);
        $stepper->setCurrent('dnx');
    }
}