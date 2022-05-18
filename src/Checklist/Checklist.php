<?php

declare(strict_types=1);

namespace ByTIC\Progress\Checklist;

use ByTIC\Progress\Checklist\Exceptions\NoStepsException;
use ByTIC\Progress\Checklist\Steps\AbstractStep;
use Nip\Utility\Arr;

/**
 *
 */
class Checklist
{
    /**
     * The steps used to determine overall progress
     * @var AbstractStep[]
     */
    protected $steps = [];

    protected ?array $evaluation = null;

    /**
     * Instantiate the Progress class.
     *
     * @param mixed $steps array or single instance of \Mtownsend\Progress\Step
     */
    public function __construct(...$steps)
    {
        if (!empty($steps)) {
            $this->add(...$steps);
        }
    }

    /**
     * Add a step to the process.
     * @return $this
     */
    public function add(...$steps): self
    {
        $steps = Arr::flatten($steps);
        foreach ($steps as $step) {
            if (!($step instanceof AbstractStep)) {
                continue;
            }
            $this->steps[$step->name] = $step;
        }

        return $this;
    }

    /**
     * The progress percentage complete.
     * @return double
     * @throws NoStepsException
     */
    public function percentageComplete(): float
    {
        return $this->evaluation('percentage_complete');
    }

    /**
     * The progress percentage complete.
     * @return double
     * @throws NoStepsException
     */
    public function percentageIncomplete(): float
    {
        return $this->evaluation('percentage_incomplete');
    }

    /**
     * The progress percentage complete.
     * @return int
     * @throws NoStepsException
     */
    public function stepsComplete(): int
    {
        return $this->evaluation('steps_complete');
    }

    /**
     * The progress percentage complete.
     * @return int
     * @throws NoStepsException
     */
    public function stepsIncomplete(): int
    {
        return $this->evaluation('steps_incomplete');
    }

    /**
     * @return int
     * @throws NoStepsException
     */
    public function totalSteps(): int
    {
        return $this->evaluation('total_steps');
    }

    /**
     * @return array
     * @throws NoStepsException
     */
    public function completeStepNames(): array
    {
        return $this->evaluation('complete_step_names');
    }

    /**
     * @return array
     * @throws NoStepsException
     */
    public function incompleteStepNames(): array
    {
        return $this->evaluation('incomplete_step_names');
    }

    /**
     * Return an array of the steps data.
     * @return array
     * @throws NoStepsException
     */
    public function toArray(): array
    {
        return $this->evaluation();
    }

    /**
     * Return a json string of the steps data.
     *
     * @return string
     * @throws NoStepsException
     */
    public function toJson(): string
    {
        return json_encode($this->evaluation());
    }

    /**
     * @throws NoStepsException
     */
    public function __toString()
    {
        return (string) $this->percentageComplete();
    }

    /**
     * Return an array of the steps data.
     * @return array
     * @throws NoStepsException
     */
    public function __invoke(): array
    {
        return $this->evaluation();
    }

    /**
     * @param string|null $key
     * @return mixed|null
     * @throws NoStepsException
     */
    public function evaluation(string $key = null)
    {
        if ($this->evaluation === null) {
            $this->doEvaluation();
        }
        return $key === null ? $this->evaluation : $this->evaluation[$key];
    }

    /**
     * Evaluate all of the steps to determine progress.
     */
    protected function doEvaluation(): void
    {
        if (empty($this->steps)) {
            throw new NoStepsException('No steps have been supplied to the Progress class');
        }

        $this->evaluation = [
            'total_steps' => count($this->steps),
            'steps_complete' => 0,
            'steps_incomplete' => 0,
            'complete_step_names' => [],
            'incomplete_step_names' => []
        ];

        foreach ($this->steps as $step) {
            if ($step->passed()) {
                $this->evaluation['steps_complete']++;
                $this->evaluation['complete_step_names'][] = $step->name;
            } else {
                $this->evaluation['steps_incomplete']++;
                $this->evaluation['incomplete_step_names'][] = $step->name;
            }
        }

        $this->evaluation['percentage_complete'] = round(
            $this->evaluation['steps_complete'] / ($this->evaluation['total_steps'] / 100),
            2
        );
        $this->evaluation['percentage_incomplete'] = max(100 - $this->evaluation['percentage_complete'], 0);
    }
}
