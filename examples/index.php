<?php

include '../vendor/autoload.php';
?>
<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"/>

<link rel="stylesheet" href="../dist/assets/css/progress.css">

<body>
<section style="margin-top: 40px">
    <div class="container">
        <h2 class="title">DEMO</h2>
        <p class="description">Examples of progress elements</p>
    </div>
</section>

<hr/>

<?php include('_progress_stepper.php'); ?>

<hr/>

<?php include('spinners/index.php'); ?>
<hr/>

<?php include('loaders/index.php'); ?>
</body>
</html>