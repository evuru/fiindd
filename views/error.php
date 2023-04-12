<?php /** @var $exception \Exception  */?>
<div class="d-flex flex-column align-items-center justify-content-center vh-100 bg-primary">
    <h2><?php echo $exception->getMessage()?></h2>
    <h1 class="row display-1 fw-bold text-white"><?php echo $exception->getCode()?></h1>
</div>
