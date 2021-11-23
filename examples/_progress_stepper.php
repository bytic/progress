<?php

use ByTIC\Progress\Stepper\ProgressStep;
use ByTIC\Progress\Stepper\ProgressStepper;

?>
<div class="container">
    <h3 class="title">Progress Stepper</h3>


    <pre><code>
$stepper = ProgressStepper::build()
    ->addStep(ProgressStep::build('step1', 'Step 1'))
    ->addStep(ProgressStep::build('step2', 'Step 2'))
    ->addStep(ProgressStep::build('step3', 'Step 3'))
    ->setCurrent('step1');
    </code></pre>

    <?php
    $stepper = ProgressStepper::build()
        ->addStep(ProgressStep::build('step1', 'Step 1','<i class="fas fa-cart-arrow-down"></i>'))
        ->addStep(ProgressStep::build('step2', 'Step 2',''))
        ->addStep(ProgressStep::build('step3', 'Step 3','<i class="fas fa-cart-arrow-down"></i>'))
        ->addStep(ProgressStep::build('step4', 'Step 4',''))
    ;
    echo $stepper;
    echo $stepper->setCurrent('step1');
    echo $stepper->setCurrent('step2');
    echo $stepper->setCurrent('step3');
    echo $stepper->setCurrent('step4');
    ?>
</div>