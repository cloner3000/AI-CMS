<?php
/**
 * App\src\Template\Webadmin\Element\header.ctp
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
?>
<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed">
            
            <div></div>
            <!-- begin:: Header Topbar -->
                <div class="kt-header__topbar">
                    <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">    
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="kt-header__topbar-user">
                                <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                                <span class="kt-header__topbar-username kt-hidden-mobile"><?=$userData['name'];?></span>
                                <img class="" alt="Pic" src="<?=$this->Url->build('/img/profile.png');?>" />
                            </div>
                        </div>

                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                            <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url('<?=$this->Url->build('/assets_admin/dist/media/misc/bg-1.jpg');?>')">
                                    <div class="kt-user-card__avatar">
                                        <img class="" alt="Pic" src="<?=$this->Url->build('/img/profile.png');?>" />
                                    </div>
                                    <div class="kt-user-card__name">
                                        <?=$userData['name'];?>
                                    </div>
                                </div>
                            <!--end: Head -->
                            <!--begin: Navigation -->
                                <div class="kt-notification">
                                    <a href="<?=$this->Url->build(['controller'=>'Default','action'=>'editProfile']);?>" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                My Profile
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Account settings and more
                                            </div>
                                        </div>
                                    </a>
                                    <div class="kt-notification__custom">
                                        <a href="<?=$this->Url->build(['controller'=>'Default','action'=>'logout']);?>"  class="btn btn-label-brand btn-sm btn-bold">Sign Out</a>
                                    </div>
                                </div>
                            <!--end: Navigation -->    
                        </div>
                    </div>
                    <!--end: User Bar -->	
                </div>
            <!-- end:: Header Topbar -->
        </div>
    <!-- end:: Header -->