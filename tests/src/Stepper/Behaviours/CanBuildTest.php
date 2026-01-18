<?php

namespace ByTIC\Progress\Tests\Stepper\Behaviours;

use ByTIC\Progress\Tests\AbstractTest;
use ByTIC\Progress\Tests\Fixtures\Stepper\BuiltProgressStepper;

class CanBuildTest extends AbstractTest
{
    public function test_getSteps_triggers_doBuild()
    {
        $stepper = BuiltProgressStepper::build();

        $steps = $stepper->getSteps();

        self::assertCount(2, $steps);
        self::assertTrue($steps->has('step1'));
        self::assertTrue($steps->has('step2'));
        self::assertSame(1, $steps->get('step1')->getPosition());
        self::assertSame(2, $steps->get('step2')->getPosition());
    }
}