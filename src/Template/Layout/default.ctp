<?php
/**
 * App\src\Template\Webadmin\Layout\default.ctp
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
?>
<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$defaultWebSettings['Web.Name'];?> <?=!empty($this->fetch('title')) ? ' | '.$this->fetch('title') : '';?></title>
        <meta name="description" content="<?=$this->fetch('meta_keyword');?>">
        <meta name="keywords" content="<?=$this->fetch('meta_description');?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="aiqbalsyah@gmail.com">
        <link rel="shortcut icon" href="<?=$this->Utilities->generateUrlAsset(null,$defaultWebSettings['Web.Favico']);?>" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <?php
            $cssExternal = [];
            $cssVendor = [
                "libs/bootstrap/css/bootstrap.min.css",
                "libs/nivo-slider/css/nivo-slider.css",
                "libs/nivo-slider/css/animate.css",
                "libs/nivo-slider/css/style.css",
                "libs/font-awesome/css/font-awesome.min.css",
                "libs/font-pe-icon-7-stroke/css/pe-icon-7-stroke.min.css",
                "libs/font-flaticon/css/flaticon.css",
                "libs/owl.carousel/assets/owl.carousel.css",
                "libs/hover/css/hover.css",
                "libs/slick-slider/css/slick-theme.css",
                "libs/slick-slider/css/slick.css",
            ];
            $cssTemplate = [
                "css/style.css",
                "css/responsive.css",
            ];
            
            $this->Html->css($cssExternal,['block'=>'cssExternal']);
            $this->Html->css($cssVendor,['block'=>'cssVendor','pathPrefix' => 'assets/']);
            $this->Html->css($cssTemplate,['block'=>'cssTemplate','pathPrefix' => 'assets/']);
        ?>
        
        <?=$this->fetch('cssExternal');?>
        <!--begin::Page Vendors Styles -->
            <?=$this->fetch('cssVendor');?>
        <!--end::Page Vendors Styles -->
        <!--begin::Page Template Styles -->
            <?=$this->fetch('cssTemplate');?>
        <!--end::Page Template Styles -->

        <?=$this->fetch('cssMain');?>
        
        
    </head>
    <!-- end::Head -->

    <!-- begin::Body -->
    <body  class="home-3">
        <div id="all">
            <?=$this->element('main');?>
        </div>
        <?php
            $jsVendor = [
                'libs/jquery/jquery.min.js',
                'libs/bootstrap/js/bootstrap.min.js',
                'libs/owl.carousel/owl.carousel.min.js',
                'libs/nivo-slider/js/jquery.nivo.slider.js',
                'libs/slick-slider/js/slick.min.js',
            ];
            $jsTemplate = [
                'js/main.js'
            ];
            $this->Html->script($jsVendor,['block'=>'jsVendor','pathPrefix' => 'assets/']);
            $this->Html->script($jsTemplate,['block'=>'jsTemplate','pathPrefix' => 'assets/']);
        ?>
        <!--begin::Js Vendors -->
            <?=$this->fetch('jsVendor');;?>
        <!--end::Js Vendors -->

        <!--begin::Js Template -->
            <?=$this->fetch('jsTemplate');;?>
        <!--end::Js Template -->
        <?=$this->fetch('script');;?>
    </body>
    <!-- end::Body -->
</html>