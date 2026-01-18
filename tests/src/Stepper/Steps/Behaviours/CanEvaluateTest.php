<?php

namespace ByTIC\Progress\Tests\Stepper\Steps\Behaviours;

use ByTIC\Progress\Tests\AbstractTest;
use ByTIC\Progress\Tests\Fixtures\Stepper\Steps\EnhancedStep;

/**
 *
 */
class CanEvaluateTest extends AbstractTest
{
    public function test_isEvaluated()
    {
        $step = EnhancedStep::build('test', 'Test', 'icon');
        self::assertFalse($step->isEvaluated());

        $step->setEvaluated(true);
        self::assertTrue($step->isEvaluated());
    }

    public function test_evaluate()
    {
        $step = EnhancedStep::build('test', 'Test', 'icon');
        $step->isDone = true;
        $step->isActive = true;

        $step->evaluate();

        self::assertTrue($step->isEvaluated());
        self::assertTrue($step->isDone());
        self::assertTrue($step->isActive());
    }
}
