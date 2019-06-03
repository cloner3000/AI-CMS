<?php 
    $this->assign('title',$content->title);
    $this->assign('meta_keyword',$content->meta_keyword);
    $this->assign('meta_description',$content->meta_description);
?>
<?php $this->start('breadcrumb');?>
    <?=$this->Element('breadcrumb',['breadCrumbLinks' => [
        [
            'title' => 'Berita',
            'isLink' => false,
        ]
    ]]);?>
<?php $this->end();?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                DAFTAR BERITA
            </div>
        </div>
    </div>
</section>