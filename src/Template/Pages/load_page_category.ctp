<?php $this->start('breadcrumb');?>
    <?=$this->Element('breadcrumb',['breadCrumbLinks' => [
        [
            'title' => $content->contents_category->title, 
            'url' => $this->Url->build('/'.$content->contents_category->slug),
            'isLink' => true,
        ],[
            'title' => $content->title,
            'isLink' => false,
        ],
    ]]);?>
<?php $this->end();?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <?=$content->body;?>
            </div>
            <div class="col-md-2">
                <h3>RELATED <?=$content->contents_category->title;?></h3>
            </div>
        </div>
    </div>
</section>