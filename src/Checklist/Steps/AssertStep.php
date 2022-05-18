<?php

declare(strict_types=1);

namespace ByTIC\Progress\Checklist\Steps;

use Bytic\Assert\Assert;
use Bytic\Assert\Assertions\AssertionChain;
use Throwable;

/**
 *
 */
class AssertStep extends AbstractStep
{
    protected AssertionChain $assertion;

    /**
     * @param $data
     * @param $name
     * @return static
     */
    public static function that($data, $name)
    {
        $step = new static($name);
        $step->assertion = Assert::that($data);
        return $step;
    }

    /**
     * Collect unset methods and arguments that will be stored and passed on to the Assert class.
     *
     * @return self
     */
    public function __call($name, $arguments = [])
    {
        if ($this->passed === false) {
            return $this;
        }
        try {
            if (empty($arguments)) {
                $this->assertion->$name();
            } else {
                $this->assertion->$name(...$arguments);
            }
        } catch (Throwable $exception) {
            $this->passed = false;
        }

        return $this;
    }

    protected function evaluate(): bool
    {
        return true;
    }

}