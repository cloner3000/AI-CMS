<?php
/**
 * App\src\Template\Webadmin\ContentsAttributes\edit.ctp
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
                        <?php
                            echo $this->Form->control('contents_category_id',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-10 col-xl-10 col-md-8',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Kategori Konten *'
                                ],
                            ]);
                            echo $this->Form->control('label',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-10 col-xl-10 col-md-8',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Label *'
                                ],
                            ]);
                            echo $this->Form->control('type',[
                                'class'=>'form-control m-input',
                                'options' => [
                                    'text' => 'TEXT',
                                    'long_text' => 'LONG TEXT',
                                    'list' => 'LIST',
                                    'file' => 'FILE',
                                ],
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3 col-md-8',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Type *'
                                ],
                            ]);
                        ?>
                        <div class="options-text" style="<?=$record->type != "list" ? 'display:none' : '';?>">
                            <?php
                                echo $this->Form->control('options',[
                                    'class'=>'form-control m-input',
                                    'type'=>'textarea',
                                    'templateVars' => [
                                        'colsize' => 'col-lg-10 col-xl-10 col-md-8',
                                        'helper' => 'Masukan list dalam bentuk JSON'
                                    ],
                                    'label' => [
                                        'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                        'text'=>'Options *'
                                    ],
                                ]);    
                            ?>  
                        </div>
                        <?php
                            echo $this->Form->control('validations',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-10 col-xl-10 col-md-8',
                                    'helper' => 'Contoh : `required:true|max-length:22`'
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Validations'
                                ],
                            ]);
                        ?>
                        
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
        
        $("#type").on('change',function(e){
            if($(this).val() == 'list'){
                $(".options-text").show()
            }else{
                $(".options-text").hide()
            }
        })
        
    </script>
<?php $this->end();?>