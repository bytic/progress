<?php

namespace ByTIC\Progress\Stepper;

use Nip\Collections\Typed\ClassCollection;

/**
 * Class StepCollection
 * @package ByTIC\Progress\Stepper
 */
class StepCollection extends ClassCollection
{
    protected $validClass = ProgressStep::class;

}