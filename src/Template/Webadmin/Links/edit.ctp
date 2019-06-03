<?php
/**
 * App\src\Template\Webadmin\Links\edit.ctp
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
?>
<?php
    $this->start('sub_header_toolbar');
?>
    <?php if($this->Acl->check(['action'=>'index']) == true):?>
        <a href="<?=$this->Url->build(['action'=>'index']);?>" class="btn btn-warning">
            <i class="la la-angle-double-left"></i> Kembali
        </a>
    <?php endif;?>
    <?php if($this->Acl->check(['action'=>'add']) == true):?>
        <a href="<?=$this->Url->build(['action'=>'add']);?>" class="btn btn-primary">
            <i class="la la-plus-circle"></i> Tambah Data
        </a>
    <?php endif;?>
<?php
    $this->end();
?>
<style>
    .ck-content {
        min-height: 300px !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						<?=$titlesubModule;?>
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<?= $this->Form->create($record,['class'=>'kt-form','type'=>'file']) ?>
				<div class="kt-portlet__body">
					<div class="kt-section kt-section--first">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    echo $this->Form->control('links_map_id',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-8',
                                        ],
                                        'style' => 'width:100%',
                                        'empty' => 'Pilih Sitemap',
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-4 col-form-label',
                                            'text'=>'Sitemap *'
                                        ],
                                    ]);
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    echo $this->Form->control('parent_id',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-9 col-md-8',
                                        ],
                                        'empty'=>'Pilih header link',
                                        'style' => 'width:100%',
                                        'label' => [
                                            'class'=> 'col-lg-3 col-md-4 col-form-label',
                                            'text'=>'Header Link *'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    echo $this->Form->control('title',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-xl-11 col-md-10',
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-xl-1 col-md-2 col-form-label',
                                            'text'=>'Judul *'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    echo $this->Form->control('target',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-8',
                                        ],
                                        'empty'=>'Pilih target link',
                                        'style' => 'width:100%',
                                        'options' => [
                                            '_SELF' => 'SELF',
                                            '_BLANK' => 'BLANK'
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-4 col-form-label',
                                            'text'=>'Target *'
                                        ],
                                    ]);
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    echo $this->Form->control('_type',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-8',
                                        ],
                                        'empty'=>'Pilih jenis link',
                                        'style' => 'width:100%',
                                        'options' => [
                                            'HEADER' => 'HEADER',
                                            'CONTENT' => 'CONTENT',
                                            'EXTERNAL' => 'EXTERNAL'
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-4 col-form-label',
                                            'text'=>'Jenis Link *'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>

                        <div class="row row-external" style="<?=($record->_type != 'EXTERNAL' ? 'display:none;' : '' );?>">
                            <div class="col-md-12">
                                <?php
                                    echo $this->Form->control('url',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-xl-11 col-md-10',
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-xl-1 col-md-2 col-form-label',
                                            'text'=>'Url *'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>

                        <div class="row row-content" style="<?=($record->_type != 'CONTENT' ? 'display:none;' : '' );?>">
                            <div class="col-md-12">
                                <?php
                                    echo $this->Form->control('content_id',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-xl-11 col-md-10',
                                        ],
                                        'empty' => 'Pilih konten',
                                        'style' => 'width:100%',
                                        'label' => [
                                            'class'=> 'col-lg-2 col-xl-1 col-md-2 col-form-label',
                                            'text'=>' Konten'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    echo $this->Form->control('picture',[
                                        'class'=>'form-control m-input',
                                        'type' => 'file',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-xl-11 col-md-10',
                                            'helper' => '<span class="form-text text-muted">Rekomendasi ukuran gambar : '. $defaultAppSettings['Thumbnail.RM'].'</span>'
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-xl-1 col-md-2 col-form-label',
                                            'text'=>'Gambar'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    echo $this->Form->control('sort',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-3 col-md-8',
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-4 col-form-label',
                                            'text'=>'Sort'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    echo $this->Form->control('status',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-8',
                                            'typeLine' => 'kt-checkbox-inline',
                                            'labeltext' => 'Status'
                                        ],
                                        'type' => 'checkbox',
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-4 col-form-label',
                                            'text'=>'AKTIF'
                                        ]
                                    ]);
                                ?>
                            </div>
                        </div>
                        
		            </div>
	            </div>
	            <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-warning">Reset</button>
							</div>
						</div>
					</div>
				</div>
			<?=$this->Form->end();?>
			<!--end::Form-->
		</div>
    </div>
</div>
<?php $this->start('script');?>
    <script>
        $("#links-map-id,#parent-id").select2();
        $("#content-id").select2();
        $("#target").select2({
            minimumResultsForSearch: -1
        });
        $("#type").select2({
            minimumResultsForSearch: -1
        }).on('select2:select',function(event){
            var dataID = event.params.data.id;
            if(dataID == "CONTENT"){
                $(".row-content").show();
                $(".row-external").hide();
            }else if(dataID == "EXTERNAL"){
                $(".row-content").hide();
                $(".row-external").show();
            }else{
                $(".row-content").hide();
                $(".row-external").hide();
            }
        });
        
        
    </script>
<?php $this->end();?>