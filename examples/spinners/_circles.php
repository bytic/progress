<?php

?>
<div class="container">
    <h3 class="title">Spinners circle</h3>

    <pre><code>
echo \ByTIC\Progress\Spinners\SpinnerCircles::circle01();
    </code></pre>

    <div class="row">
        <?php $circles = ['circle01','circle02','circle03','circle04']; ?>
        <?php foreach ($circles as $circle) { ?>
            <div class="col col-sm-3 mb-4">
                <div class="bg-light position-relative">
                    <div class="position-absolute top-0 end-0 m-3">
                        <?php echo $circle ?>
                    </div>
                    <div class="container-spinner p-5 mt-10">
                        <?php echo \ByTIC\Progress\Spinners\SpinnerCircles::$circle(); ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>