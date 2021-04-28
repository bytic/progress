<?php

namespace ByTIC\Progress\Stepper;


/**
 * Class ProgressStepper
 * @package ByTIC\Progress\ProgressStepper
 */
class ProgressStepper
{
    /**
     * @var ProgressStep[]
     */
    protected $steps = [];
    protected $current = null;

    /**
     * ProgressStepper constructor.
     * @param $steps
     */
    protected function __construct(array $steps, $current)
    {
        $this->setSteps($steps);
        $this->current = $current;
    }

    /**
     * @param $steps
     * @param null $current
     * @return static
     */
    public static function build($steps = [], $current = null)
    {
        return new static($steps, $current);
    }

    /**
     * @param array $steps
     * @return $this
     */
    public function setSteps($steps = [])
    {
        $this->steps = [];
        foreach ($steps as $step) {
            $this->addStep($step);
        }

        return $this;
    }

    /**
     * @param ProgressStep $step
     */
    public function addStep(ProgressStep $step)
    {
        $this->steps[$step->getName()] = $step;

        return $this;
    }

    /**
     * @return array
     */
    public function getSteps(): array
    {
        return $this->steps;
    }

    /**
     * @return mixed
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * @param string|ProgressStep $current
     */
    public function setCurrent($current): ProgressStepper
    {
        if ($current === null) {
            $this->current = null;
            return $this;
        }
        $current = is_string($current) ? $current : (string)$current;
        if (!isset($this->steps[$current])) {
            throw new \InvalidArgumentException("Invalid step name [$current]");
        }
        $this->current = $current;
        $this->setCurrentStepFlags();
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    protected function setCurrentStepFlags()
    {
        $active = true;
        foreach ($this->steps as $step) {
            if ($step->getName() == $this->current) {
                $active = false;
            }
            $step->setActive(true);
        }
    }

}
