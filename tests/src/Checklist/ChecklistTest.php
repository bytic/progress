<?php

declare(strict_types=1);

namespace ByTIC\Progress\Tests\Checklist;

use ByTIC\Progress\Checklist\Checklist;
use ByTIC\Progress\Checklist\Steps\AssertStep;
use ByTIC\Progress\Tests\AbstractTest;

/**
 *
 */
class ChecklistTest extends AbstractTest
{
    public function test_can_receive_single_step()
    {
        $result = new Checklist((AssertStep::that(31, 'Age'))->integer());
        static::assertEquals($result->stepsComplete(), 1);
    }

    public function test_can_receive_multiple_steps()
    {
        $result = new Checklist(
            AssertStep::that(31, 'Age')->integer(),
            AssertStep::that('John Smith', 'Name')->string()->notEmpty()
        );
        static::assertEquals($result->stepsComplete(), 2);
    }

    public function test_can_receive_array_of_steps()
    {
        $steps = [
            AssertStep::that('https://marktownsend.rocks', 'Web Site')->url(),
            AssertStep::that('Laravel Developer', 'Profession')->contains('Laravel'),
            AssertStep::that(true, 'Premier Member')->boolean(),
        ];
        $result = new Checklist($steps);
        static::assertEquals($result->stepsComplete(), 3);
    }
}