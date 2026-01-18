<?php

namespace ByTIC\Progress\Tests\Stepper\Renderer;

use ByTIC\Progress\Stepper\ProgressStepper;
use ByTIC\Progress\Stepper\Renderer\DefaultRenderer;
use ByTIC\Progress\Stepper\Steps\ProgressStep;
use ByTIC\Progress\Tests\AbstractTest;

/**
 * Class DefaultRendererTest
 * @package ByTIC\Progress\Tests\Stepper\Renderer
 */
class DefaultRendererTest extends AbstractTest
{
    public function test_render()
    {
        $stepper = ProgressStepper::build()
            ->addStep(ProgressStep::build('step1', 'Step 1'))
            ->addStep(ProgressStep::build('step2', 'Step 2'))
            ->addStep(ProgressStep::build('step3', 'Step 3'));
        $renderer = new DefaultRenderer($stepper);

        self::assertEquals(
            file_get_contents(TEST_FIXTURE_PATH . '/html/stepper/renderer/basic.html'),
            $renderer->render()
        );
    }
}