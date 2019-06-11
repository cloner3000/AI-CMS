<?php
/**
 * App\src\Template\Webadmin\Covers\add.ctp
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
                            echo $this->Form->control('name',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-8 col-xl-6 col-md-8',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Nama *'
                                ],
                            ]);
                            echo $this->Form->control('slug',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-6',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Slug Page'
                                ],
                            ]);
                            echo $this->Form->control('sort',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-6',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Sort'
                                ],
                            ]);
                            echo $this->Form->control('file',[
                                'class'=>'form-control m-input',
                                'type' => 'file',
                                'templateVars' => [
                                    'colsize' => 'col-lg-8 col-xl-6 col-md-8',
                                    'helper' => '<span class="form-text text-muted">Rekomendasi ukuran gambar : '. $defaultAppSettings['Cover.RM'].'</span>'
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Gambar'
                                ],
                            ]);
                            echo $this->Form->control('heading',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-6',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Heading'
                                ],
                            ]);
                            echo $this->Form->control('description',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-6',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'Description'
                                ],
                            ]);
                            echo $this->Form->control('url',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-6',
                                ],
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'url'
                                ],
                            ]);
                            echo $this->Form->control('status',[
                                'class'=>'form-control m-input',
                                'templateVars' => [
                                    'colsize' => 'col-lg-4 col-xl-3',
                                    'typeLine' => 'kt-checkbox-inline',
                                    'labeltext' => 'Status'
                                ],
                                'type' => 'checkbox',
                                'label' => [
                                    'class'=> 'col-lg-2 col-xl-2 col-md-4 col-form-label',
                                    'text'=>'AKTIF'
                                ]
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