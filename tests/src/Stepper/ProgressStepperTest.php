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
        self::assertSame($step, $stepper->getCurrentStep());

        $stepper->setCurrent(null);
        self::assertNull($stepper->getCurrent());

        self::expectException(\InvalidArgumentException::class);
        $stepper->setCurrent('dnx');
    }

    public function test_first_last()
    {
        $step1 = ProgressStep::build('step1', 'Step 1');
        $step2 = ProgressStep::build('step2', 'Step 2');
        $stepper = ProgressStepper::build()
            ->addStep($step1)
            ->addStep($step2);
        self::assertSame($step1, $stepper->first());
        self::assertSame($step2, $stepper->last());
    }

    public function test_getActiveSteps()
    {
        $stepper = ProgressStepper::build()
            ->addStep(ProgressStep::build('step1', 'Step 1'))
            ->addStep(ProgressStep::build('step2', 'Step 2'))
            ->addStep(ProgressStep::build('step3', 'Step 3'))
            ->setCurrent('step2');

        self::assertCount(3, $stepper->getSteps());
        self::assertCount(1, $stepper->getDoneSteps());
    }
}