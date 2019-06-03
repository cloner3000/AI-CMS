<div class="main-content">
    <?php if(!empty($covers)):?>
        <!-- Slideshow -->
        <div class="tiva-slideshow-wrapper nav-number">
            <div id="tiva-slideshow" class="nivoSlider">
                <?php foreach($covers as $key => $r):?>
                    <a href="#" title="Slideshow image">
                        <img class="img-responsive" src="<?=$this->Utilities->generateUrlAsset($r->file_dir,$r->file);?>" title="#caption1" alt="Slideshow image">
                    </a>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif;?>
    <?=$this->fetch('content');?>
</div>