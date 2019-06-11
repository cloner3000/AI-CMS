<?php
/**
 * App\src\Template\Webadmin\Contents\edit.ctp
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
                    <?php if($record->contents_category_id > 2):?>
                        <div class="kt-section kt-section-attribute">
                            <?php foreach($contentsAttributes as $key_attr => $r):?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <?php
                                                $validations = $r->validations;
                                                $validator = [];
                                                $isRequired = false;
                                                if(!empty($validations)){
                                                    $explodeValidatons = explode("|",$validations);
                                                    foreach($explodeValidatons as $key => $val):
                                                        $explodeVal = explode(':',$val);
                                                        $validator[$explodeVal[0]] = $explodeVal[1];
                                                        if($explodeVal[0] == "required" && $explodeVal[1] == "true"){
                                                            $isRequired = true;
                                                        }
                                                    endforeach;
                                                }
                                                $inputData = "";
                                                $defaultValidation = ($isRequired ? 'required="required"' : '').' '.(!empty($validator['maxlength']) ? 'maxlength="'.$validator['maxlength'].'"' : '');
                                                if($r->type == "text"){
                                                    $inputData = '<input type="text" name="contents_data_attributes['.$key_attr.'][data]" class="form-control m-input" '.$defaultValidation.' value="'.$r->_matchingData['ContentsDataAttributes']['data'].'">';
                                                }
                                                if($r->type == "file"){
                                                    $inputData = '<input type="file" name="contents_data_attributes['.$key_attr.'][data]" class="form-control m-input" '.$defaultValidation.'>';
                                                }
                                                if($r->type == "long_text"){
                                                    $inputData = '<textarea name="contents_data_attributes['.$key_attr.'][data]" class="form-control m-input" '.$defaultValidation.'>'.$r->_matchingData['ContentsDataAttributes']['data'].'</textarea>';
                                                }
                                                if($r->type == "list"){
                                                    $inputData = '<select name="contents_data_attributes['.$key_attr.'][data]" class="form-control m-input" '.$defaultValidation.' value="'.$r->_matchingData['ContentsDataAttributes']['data'].'">';
                                                    if($r->options != ""){
                                                        $decode = json_decode($r->options);
                                                        if(!empty($decode)){
                                                            foreach($decode as $key => $opt){
                                                                $inputData .= '<option value="'.$key.'" '.($r->_matchingData['ContentsDataAttributes']['data'] == $key ? 'selected="selected"' : '').'>'.$opt.'</option>';
                                                            }
                                                        }
                                                    }
                                                    $inputData .='</select>';
                                                }
                                                $inputData .= '<input type="hidden" name="contents_data_attributes['.$key_attr.'][contents_attribute_id]" class="form-control m-input" value="'.$r->id.'">';
                                                $inputData .= '<input type="hidden" name="contents_data_attributes['.$key_attr.'][type]" class="form-control m-input" value="'.$r->type.'">';
                                            ?>
                                            <label class="col-lg-2 col-md-2 col-form-label"><?=$r->label;?> <?=$isRequired ? '*' : '';?></label>
                                            <div class="col-lg-10 col-md-10">
                                                <?=$inputData;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
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
        
        function isJson(str){
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
        $("#contents-category-id").on('change',function(e){
            $(".kt-section-attribute").remove();
            if($(this).val() == 2){
                $(".node-row").show()
                $(".row-body").hide()
            }else{
                $(".node-row").hide()
                $(".row-body").show()
                if($(this).val() != 1 && $(this).val().length > 0){
                    $.ajax({
                        url : "<?=$this->Url->build(['controller'=>'Apis','action'=>'getContentAttributes']);?>/"+$(this).val(),
                        dataType : "json",
                        success : function(response){
                            var dataAttributes = "";
                            $.each(response,function(e,item){
                                var inputValidation = [];
                                var validations = item.validations;
                                var requiredInput = false; 
                                if(validations != ""){
                                    var checkValidations = validations.split("|");
                                    $.each(checkValidations,function(k,vItem){
                                        var valid = vItem.split(":");
                                        var validator = valid[0];
                                        var value_validator = valid[1];
                                        if(validator == "required" && value_validator == "true"){
                                            requiredInput = true;
                                        }
                                        inputValidation[validator] = value_validator;
                                    })
                                }
                                var inputData = "";
                                var defaultValidation = (requiredInput ? 'required="required"' : '')+' '+(inputValidation['maxlength'] != undefined ? 'maxlength="'+inputValidation['maxlength']+'"' : '');
                                if(item.type == "text"){
                                    inputData = '<input type="text" name="contents_data_attributes['+e+'][data]" class="form-control m-input" '+defaultValidation+'>';
                                }
                                if(item.type == "file"){
                                    inputData = '<input type="file" name="contents_data_attributes['+e+'][data]" class="form-control m-input" '+defaultValidation+'>';
                                }
                                if(item.type == "long_text"){
                                    inputData = '<textarea name="contents_data_attributes['+e+'][data]" class="form-control m-input" '+defaultValidation+'></textarea>';
                                }
                                if(item.type == "list"){
                                    inputData = '<select name="contents_data_attributes['+e+'][data]" class="form-control m-input" '+defaultValidation+'>'
                                    if(item.options != ""){
                                        if(isJson(item.options)){
                                            var obj =JSON.parse(item.options);
                                            $.each(obj, function(k_opt,opt){
                                                inputData += '<option value="'+k_opt+'">'+opt+'</option>'
                                            })
                                        }
                                    }
                                    inputData +='</select>';
                                }
                                inputData += '<input type="hidden" name="contents_data_attributes['+e+'][contents_attribute_id]" class="form-control m-input" value="'+item.id+'">'
                                inputData += '<input type="hidden" name="contents_data_attributes['+e+'][type]" class="form-control m-input" value="'+item.type+'">';
                                dataAttributes +=   '<div class="row">'
                                        +'<div class="col-md-12">'
                                        +'<div class="form-group row">'
                                        +'<label class="col-lg-2 col-md-2 col-form-label">'+item.label+' '+(requiredInput ? '*' : '')+'</label>'
                                        +'<div class="col-lg-10 col-md-10">'
                                        +inputData
                                        +'</div>'
                                        +'</div>'
                                        +'</div>'
                                        +'</div>'
                            })
                            if(dataAttributes != ""){
                                $(".kt-portlet__body").append('<div class="kt-section kt-section-attribute">'+dataAttributes+'</div>')
                            }
                        }
                    })
                }
            }
        })
        
    </script>
<?php $this->end();?>