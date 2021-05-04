<?php

?>
<div class="container mb-5">
    <h3 class="title">Loaders Text</h3>

    <pre><code>
echo \ByTIC\Progress\Loaders\TextSwitching::animateDown(
    ['Loading robots', 'Powering up', 'Doing the work', 'All done']
);
    </code></pre>

    <div class="row">
        <div class="col col-sm-3 mb-4">
            <div class="bg-light py-2">
                <div class="container-progress">
                    <?php echo \ByTIC\Progress\Loaders\TextSwitching::animateDown(
                        ['All done']
                    ); ?>
                </div>
            </div>
        </div>
        <div class="col col-sm-3 mb-4">
            <div class="bg-light py-2">
                <div class="container-progress">
                    <?php echo \ByTIC\Progress\Loaders\TextSwitching::animateDown(
                        ['Doing the work', 'All done']
                    ); ?>
                </div>
            </div>
        </div>
        <div class="col col-sm-3 mb-4">
            <div class="bg-light py-2">
                <div class="container-progress">
                    <?php echo \ByTIC\Progress\Loaders\TextSwitching::animateDown(
                        ['Powering up', 'Doing the work', 'All done']
                    ); ?>
                </div>
            </div>
        </div>
        <div class="col col-sm-3 mb-4">
            <div class="bg-light py-2">
                <div class="container-progress">
                    <?php echo \ByTIC\Progress\Loaders\TextSwitching::animateDown(
                        ['Loading robots', 'Powering up', 'Doing the work', 'All done']
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>