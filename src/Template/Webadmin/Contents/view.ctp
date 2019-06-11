<?php
/**
 * App\src\Template\Webadmin\Contents\view.ctp
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
    <?php if($this->Acl->check(['action'=>'edit']) == true):?>
        <a href="<?=$this->Url->build(['action'=>'edit',$record->id]);?>" class="btn btn-success">
            <i class="la la-edit"></i> Edit Data
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
            <div class="kt-portlet__body">
                <table class="table table-striped table-bordered table-hover table-checkable">
                    <tr>
                        <th scope="row" width="20%"><?= __('Kategori') ?></th>
                        <td><?= h($record->contents_category->title) ?></td>
                    </tr>
                    <tr>
                        <th scope="row" width="20%"><?= __('Judul') ?></th>
                        <td><?= h($record->title) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Slug') ?></th>
                        <td><?= h($record->slug) ?></td>
                    </tr>
                    <tr>
                        <th scope="row" width="20%"><?= __('Gambar Konten') ?></th>
                        <td><img src="<?= $this->Utilities->generateUrlAsset($record->picture_dir,$record->picture,$defaultAppSettings['Thumbnail.SM'].'_') ?>" class="img-thumbnail"></td>
                    </tr>
                    <?php if($record->contents_category_id == 2):?>
                        <tr>
                            <th scope="row"><?= __('Node') ?></th>
                            <td><?= h($record->node) ?></td>
                        </tr>
                    <?php endif;?>
                    <?php if($record->contents_category_id != 2):?>
                        <tr>
                            <th scope="row"><?= __('Konten') ?></th>
                            <td><?=  $record->body ?></td>
                        </tr>
                    <?php endif;?>
                    <tr>
                        <th scope="row"><?= __('Meta Keyword') ?></th>
                        <td><?= h($record->meta_keyword) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Meta Description') ?></th>
                        <td><?= h($record->meta_description) ?></td>
                    </tr>
                    <?php if(!empty($record->contents_data_attributes)):?>
                        <?php foreach($record->contents_data_attributes as $key => $cda):?>
                            <tr>
                                <th scope="row"><?= __($cda->contents_attribute->label) ?></th>
                                <td>
                                    <?php if($cda->contents_attribute->type == "text" || $cda->contents_attribute->type == "long_text"):?>
                                        <?=$cda->data;?>
                                    <?php elseif($cda->contents_attribute->type == "list"):?>
                                        <?php 
                                            if($cda->contents_attribute->options != ""):
                                                $decode = json_decode($cda->contents_attribute->options);
                                                $data = $cda->data;
                                                echo $decode->$data;
                                            endif;
                                        ?>
                                    <?php elseif($cda->contents_attribute->type == "file"):?>
                                       <a href="<?=$this->Utilities->generateUrlAsset(null,$cda->data);?>" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($record->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($record->modified) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Status') ?></th>
                        <td><?= $this->Utilities->statusLabelAktif($record->status); ?></td>
                    </tr>
                </table>
            </div>
		</div>
    </div>
</div>