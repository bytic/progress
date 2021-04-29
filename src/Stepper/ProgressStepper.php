<?php

namespace ByTIC\Progress\Stepper;


use ByTIC\Progress\Stepper\Renderer\DefaultRenderer;

/**
 * Class ProgressStepper
 * @package ByTIC\Progress\ProgressStepper
 *
 * @method first()
 * @method last()
 */
class ProgressStepper
{
    /**
     * @var StepCollection|ProgressStep[]
     */
    protected $steps;
    protected $current = null;

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
     * ProgressStepper constructor.
     * @param $steps
     */
    protected function __construct(array $steps, $current)
    {
        $this->steps = new StepCollection();
        $this->setSteps($steps);
        $this->current = $current;
    }

    /**
     * @param $name
     * @param $arguments
     * @return false|mixed
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        $collection_methods = ['first', 'last'];
        if (in_array($name, $collection_methods)) {
            return call_user_func_array([$this->steps, $name], $arguments);
        }
        throw new \Exception("Invalid method call $name for " . self::class);
    }


    /**
     * @param array $steps
     * @return $this
     */
    public function setSteps($steps = [])
    {
        $this->steps->clear();
        foreach ($steps as $step) {
            $this->addStep($step);
        }

        return $this;
    }

    /**
     * @param ProgressStep $step
     */
    public function addStep(ProgressStep $step): ProgressStepper
    {
        $step->setPosition(count($this->steps) + 1);
        $this->steps[$step->getName()] = $step;

        return $this;
    }

    /**
     * @return StepCollection
     */
    public function getSteps(): StepCollection
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
     * @return mixed
     */
    public function getCurrentStep()
    {
        return $this->steps[$this->current];
    }

    /**
     * @return StepCollection
     */
    public function getDoneSteps(): StepCollection
    {
        return $this->steps->filter(
            function (ProgressStep $item) {
                return $item->isDone();
            }
        );
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

    /**
     * @return string
     */
    public function render()
    {
        return (new DefaultRenderer($this))->render();
    }

    protected function setCurrentStepFlags()
    {
        $done = true;
        foreach ($this->steps as $step) {
            if ($step->getName() == $this->current) {
                $done = false;
                $step->setActive(true);
            } else {
                $step->setActive(false);
            }
            $step->setDone($done);
        }
    }

}
