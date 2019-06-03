<?php if(!empty($breadCrumbLinks)):?>
    <div id="breadcrumb" class="clearfix">
        <div class="container">
            <div class="breadcrumb clearfix">
                <h3 class="bread-title"><?=$content->title;?></h3>
                <ul class="ul-breadcrumb">
                    <li>
                        <a href="<?=$this->Url->build('/');?>" title="Home">Home</a>
                        <i class="fa fa-angle-double-right"></i>
                    </li>
                    <?php foreach($breadCrumbLinks as $key => $r):?>
                        <?php if($r['isLink']):?>
                            <li>
                                <a href="<?=$r['url'];?>" title="<?=$r['title'];?>"><?=$r['title'];?></a>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                        <?php else:?>
                            <li>
                                <span><?=$r['title'];?></span>
                            </li>
                        <?php endif;?>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
<?php endif;?>