<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="block-section box-item-details">
                <?= $content ?>
            </div>
        </div>
    </div>

</div>
<?php $this->endContent(); ?>