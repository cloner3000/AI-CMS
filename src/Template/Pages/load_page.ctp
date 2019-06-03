<?php $this->start('breadcrumb');?>
    <?=$this->Element('breadcrumb',['breadCrumbLinks' => [
        [
            'title' => $content->title,
            'isLink' => false,
        ]
    ]]);?>
<?php $this->end();?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <?=$content->body;?>
            </div>
        </div>
    </div>
</section>