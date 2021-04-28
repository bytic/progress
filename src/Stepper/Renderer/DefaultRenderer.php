<?php

namespace ByTIC\Progress\Stepper\Renderer;

use ByTIC\Progress\Stepper\ProgressStep;
use ByTIC\Progress\Stepper\ProgressStepper;

/**
 * Class DefaultRenderer
 * @package ByTIC\Progress\Stepper\Renderer
 */
class DefaultRenderer
{
    /**
     * @var ProgressStepper
     */
    protected $stepper;

    /**
     * DefaultRenderer constructor.
     * @param ProgressStepper $stepper
     */
    public function __construct(ProgressStepper $stepper)
    {
        $this->stepper = $stepper;
    }

    public function render(): string
    {
        $return = '<ul class="progress-stepper">' . $this->renderSteps($this->stepper->getSteps()) . '</ul>';
        return $return;
    }

    /**
     * @param ProgressStep[] $steps
     * @return string
     */
    protected function renderSteps($steps)
    {
        $return = '';
        foreach ($steps as $step) {
            $return .= $this->renderStep($step);
        }
        return $return;
    }

    protected function renderStep(ProgressStep $step): string
    {
        return '<li class="step ' . $this->renderStepClasses($step) . '">'
            . $this->renderStepIcon($step)
            . $this->renderStepLabel($step)
            . '</li>';
    }

    protected function renderStepClasses(ProgressStep $step): string
    {
        return '';
    }

    /**
     * @param ProgressStep $step
     * @return string
     */
    protected function renderStepIcon(ProgressStep $step): string
    {
        return '<span class="icon"><i class="' . $step->getIcon() . '"></i></span>';
    }

    /**
     * @param ProgressStep $step
     * @return string
     */
    protected function renderStepLabel(ProgressStep $step): string
    {
        return '<span class="label">'. $step->getLabel() . '</span>';
    }
}