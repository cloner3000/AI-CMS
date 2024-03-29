<?php
/**
 * App\src\Template\Webadmin\Element\content_header.ctp
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
?>
<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title"><?=$titleModule;?></h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <?php if(!empty($breadCrumbs)):?>
            <div class="kt-subheader__breadcrumbs">
                <a href="<?=$this->Url->build(['controller'=>'Default','action'=>'index']);?>" class="kt-subheader__breadcrumbs-home">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                            <path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" id="Combined-Shape" fill="#000000"/>
                        </g>
                    </svg>
                </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <?php 
                    $countbreadCrumbs = count($breadCrumbs);
                    $no = 1;
                    foreach($breadCrumbs as $url => $label):
                        if($no != $countbreadCrumbs):
                ?>
                        <a href="<?=$url;?>" class="kt-subheader__breadcrumbs-link">
                            <?=$label;?>                    
                        </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                    <?php else:?>
                        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active"><?=$label;?></span>
                    <?php endif;?>
                <?php $no++;endforeach;?>
            </div>
            <?php endif;?>
        </div>
        <?=$this->element('sub_header_toolbar',[
            'toolbar'=>$this->fetch('sub_header_toolbar')
        ]);?>
    </div>
<!-- end:: Content Head -->		