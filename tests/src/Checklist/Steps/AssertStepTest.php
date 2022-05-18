<?php

declare(strict_types=1);

namespace ByTIC\Progress\Tests\Checklist\Steps;

use ByTIC\Progress\Checklist\Steps\AssertStep;
use ByTIC\Progress\Tests\AbstractTest;

/**
 *
 */
class AssertStepTest extends AbstractTest
{
    public function test_passed_true_if_no_condition()
    {
        $step = AssertStep::that(1, '');
        self::assertTrue($step->passed());
    }

    public function test_passed_with_rule()
    {
        $step = AssertStep::that(1, '')->isInteger();
        self::assertTrue($step->passed());
    }

    public function test_passed_failed_with_rule()
    {
        $step = AssertStep::that(1, '')->isBool();
        self::assertFalse($step->passed());
    }
}
