<?php

declare(strict_types=1);

namespace ByTIC\Progress\Stepper\Behaviours;

/**
 *
 */
trait CanBuild
{
    /**
     * @param $steps
     * @param null $current
     * @return static
     */
    public static function build($steps = [], $current = null)
    {
        $self = new static($steps, $current);
        $self->doBuild();
        return $self;
    }

    protected function doBuild()
    {
    }
}

