<?php
/**
 * App\src\Template\Webadmin\WebSettings\index.ctp
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
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
			<?= $this->Form->create($dataSave,['class'=>'kt-form','type'=>'file']) ?>
				<div class="kt-portlet__body">
					<div class="kt-section kt-section--first">
                        <h3 class="kt-section__title">1. Informasi Website:</h3>
                        <div class="kt-section__body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?=$this->Form->control('Web_Name',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-9',
                                        ],
                                        'value'=>$webSettings['Web_Name']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-3 col-form-label',
                                            'text'=>'Nama Website *'
                                        ],
                                        'placeholder' => 'Masukan nama website'
                                    ]);;?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?=$this->Form->control('Web_Description',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-9',
                                        ],
                                        'type' => 'textarea',
                                        'value'=>$webSettings['Web_Description']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-3 col-form-label',
                                            'text'=>'Deskripsi Website *'
                                        ],
                                        'placeholder' => 'Masukan deskripsi website'
                                    ]);;?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Logo',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'type' => 'file',
                                        'value'=>$webSettings['Web_Logo']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Logo Website'
                                        ],
                                        'placeholder' => 'Upload logo website'
                                    ]);;?>
                                </div>
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Favico',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                            'helper' => 'Rekomendasi favicon 300x300px'
                                        ],
                                        'type' => 'file',
                                        'value'=>$webSettings['Web_Favico']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-3 col-form-label',
                                            'text'=>'Favicon Website'
                                        ],
                                        'placeholder' => 'Upload logo website'
                                    ]);;?>
                                </div>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                    </div>
                    <div class="kt-section">
                        <h3 class="kt-section__title">2. Kontak & Lokasi Profile:</h3>
                        <div class="kt-section__body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?=$this->Form->control('Web_Location_Address',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-10 col-md-9',
                                        ],
                                        'type'=>'textarea',
                                        'rows'=>2,
                                        'value'=>$webSettings['Web_Location_Address']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-2 col-md-3 col-form-label',
                                            'text'=>'Alamat *'
                                        ],
                                        'placeholder' => 'Masukan nama website'
                                    ]);;?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Location_Longitude',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Web_Location_Longitude']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Longitude'
                                        ],
                                        'placeholder' => 'Masukan Longitude'
                                    ]);;?>
                                </div>
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Location_Latitude',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Web_Location_Latitude']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Latitude'
                                        ],
                                        'placeholder' => 'Masukan Latitude'
                                    ]);;?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Location_Phone_Name',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Web_Location_Phone_Name']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Nama Kontak'
                                        ],
                                        'placeholder' => 'Masukan Nama Telp. Kontak'
                                    ]);;?>
                                </div>
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Location_Phone_Number',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Web_Location_Phone_Number']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Nomor Telp. Kontak'
                                        ],
                                        'placeholder' => 'Masukan Nomor Telp. Kontak'
                                    ]);;?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Location_Email',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Web_Location_Email']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Email'
                                        ],
                                        'placeholder' => 'Masukan Email'
                                    ]);;?>
                                </div>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
		            </div>
                    <div class="kt-section">
                        <h3 class="kt-section__title">3. Sosial Media Link:</h3>
                        <div class="kt-section__body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Facebook',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Web_Facebook']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Facebook'
                                        ],
                                        'placeholder' => 'Masukan link facebook'
                                    ]);;?>
                                </div>
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Twitter',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Web_Twitter']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Twitter'
                                        ],
                                        'placeholder' => 'Masukan link twitter'
                                    ]);;?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Instagram',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Web_Instagram']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Instagram'
                                        ],
                                        'placeholder' => 'Masukan link instagram'
                                    ]);;?>
                                </div>
                                <div class="col-md-6">
                                    <?=$this->Form->control('Web_Youtube',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Web_Youtube']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Youtube'
                                        ],
                                        'placeholder' => 'Masukan link youtube'
                                    ]);;?>
                                </div>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
		            </div>
                    <div class="kt-section">
                        <h3 class="kt-section__title">4. Google Utilities:</h3>
                        <div class="kt-section__body">
                            <div class="row">
                                <div class="col-md-6">
                                    <?=$this->Form->control('Google_Secret_Key',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Google_Secret_Key']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Google Secret Key'
                                        ],
                                        'placeholder' => 'Masukan google secret key'
                                    ]);;?>
                                </div>
                                <div class="col-md-6">
                                    <?=$this->Form->control('Google_Secret_File',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'type' => 'file',
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Google Secret File'
                                        ],
                                    ]);;?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?=$this->Form->control('Google_Analytics_ProfileId',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'value'=>$webSettings['Google_Analytics_ProfileId']['valueField'],
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Google Analytic Profile ID'
                                        ],
                                        'placeholder' => 'Masukan google map key'
                                    ]);;?>
                                </div>
                                <div class="col-md-6">
                                    <?=$this->Form->control('Google_Robots',[
                                        'class'=>'form-control m-input',
                                        'templateVars' => [
                                            'colsize' => 'col-lg-8 col-md-6',
                                        ],
                                        'type'=>'file',
                                        'label' => [
                                            'class'=> 'col-lg-4 col-md-6 col-form-label',
                                            'text'=>'Google Robots.txt'
                                        ],
                                    ]);;?>
                                </div>
                            </div>
                        </div>
                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
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
    var textEditor = ['#web-description'];
    var urlToken = '<?=$this->Url->build(['controller' => 'Apis','action'=>'getToken']);?>'
    var urlUpload = '<?=$this->Url->build(['controller' => 'Apis','action'=>'uploadMedia']);?>'
</script>
<?php
$this->Html->script([
    'ai_customs/ckeditor/ck_dist/bundle.js',
],['block'=>'jsPageVendors','pathPrefix' => '/assets_admin/']);?>
<?php $this->start('script');?>
    <script>
        
    </script>
<?php $this->end();?>