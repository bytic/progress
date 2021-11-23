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
        $return = '<div class="progress-stepper">' . $this->renderSteps($this->stepper->getSteps()) . '</div>';
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
        return '<div class="step ' . $this->renderStepClasses($step) . '">'
            . '<div class="figure">'
            . $this->renderStepIcon($step)
            . $this->renderStepPosition($step)
            . '</div>'
            . $this->renderStepLabel($step)
            . '</div>';
    }

    protected function renderStepClasses(ProgressStep $step): string
    {
        $classes = [];
        if ($step->isDone()) {
            $classes[] = 'done';
        }
        if ($step->isActive()) {
            $classes[] = 'active';
        }
        if ($step->hasIcon()) {
            $classes[] = 'has-icon';
        }
        return implode(' ', $classes);
    }

    /**
     * @param ProgressStep $step
     * @return string
     */
    protected function renderStepIcon(ProgressStep $step): string
    {
        if ($step->hasIcon()) {
            $icon = (string)$step->getIcon();
            $iconHtml = str_contains($icon, '>') ? $icon : '<i class="' . $icon . '"></i>';
        } else {
            $iconHtml = '';
        }

        return '<span class="icon">' . $iconHtml . '</span>';
    }

    /**
     * @param ProgressStep $step
     * @return string
     */
    protected function renderStepLabel(ProgressStep $step): string
    {
        return '<span class="label">' . $step->getLabel() . '</span>';
    }

    protected function renderStepPosition(ProgressStep $step)
    {
        return '<span class="count">' . $step->getPosition() . '</span>';
    }
}
