<?php
/**
 * App\src\Template\Webadmin\Contents\add.ctp
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
                            <div class="col-md-12">
                                <?php
                                    echo $this->Form->control('contents_category_id',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-10',
                                        ],
                                        'empty' => 'Pilih Kategori',
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-2 col-form-label',
                                            'text'=>'Kategori *'
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
                                            'colsize' => 'col-lg-10 col-md-10',
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-2 col-form-label',
                                            'text'=>'Judul *'
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
                                            'colsize' => 'col-lg-10 col-md-10',
                                            'helper' => '<span class="form-text text-muted">Rekomendasi ukuran gambar : '. $defaultAppSettings['Thumbnail.RM'].'</span>'
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-2 col-form-label',
                                            'text'=>'Gambar Konten'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>
                        <div class="row node-row" style="<?=($record->contents_category_id != 2 ? 'display:none;' : '' );?>">
                            <div class="col-md-12">
                                <?php
                                    echo $this->Form->control('node',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-10',
                                            'helper' => 'Masukan format controller dan action ex: Home:index'
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-2 col-form-label',
                                            'text'=>'Node *'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>
                        <div class="row row-body" style="<?=($record->contents_category_id == 2 ? 'display:none;' : '' );?>">
                            <div class="col-md-12">
                                <?php
                                    echo $this->Form->control('body',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-10',
                                        ],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-2 col-form-label',
                                            'text'=>'Konten'
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                    echo $this->Form->control('meta_keyword',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-8',
                                        ],
                                        'rows' => '2',
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-4 col-form-label',
                                            'text'=>'Meta Keyword'
                                        ],
                                    ]);
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    echo $this->Form->control('meta_description',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'rows' => '2',
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-4 col-form-label',
                                            'text'=>'Meta Description'
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
                                            'colsize' => 'col-lg-8 col-md-6',
                                            'typeLine' => 'kt-checkbox-inline',
                                            'labeltext' => 'Status'
                                        ],
                                        'type' => 'checkbox',
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-4 col-form-label',
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
<script>
    var textEditor = ['#body'];
    var urlToken = '<?=$this->Url->build(['controller' => 'Apis','action'=>'getToken']);?>'
    var urlUpload = '<?=$this->Url->build(['controller' => 'Apis','action'=>'uploadMedia']);?>'
</script>
<?php
$this->Html->script([
    'ai_customs/ckeditor/ck_dist/bundle.js',
],['block'=>'jsPageVendors','pathPrefix' => '/assets_admin/']);?>
<?php $this->start('script');?>
    <script>
        
        $("#contents-category-id").on('change',function(e){
            if($(this).val() == 2){
                $(".node-row").show()
                $(".row-body").hide()
            }else{
                $(".node-row").hide()
                $(".row-body").show()
            }
        })
        
    </script>
<?php $this->end();?>