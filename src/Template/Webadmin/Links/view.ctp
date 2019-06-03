<?php
/**
 * App\src\Template\Webadmin\Links\view.ctp
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
                        <th scope="row" width="20%"><?= __('Sitemap') ?></th>
                        <td><?= h($record->links_map->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Header Link') ?></th>
                        <td><?= h(($record->has('parent_link') ? $record->parent_link->title : '')) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Judul') ?></th>
                        <td><?= h($record->title) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Target') ?></th>
                        <td><?= h($record->target) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Jenis Link') ?></th>
                        <td><?= h($record->_type) ?></td>
                    </tr>
                    <?php if($record->_type == "EXTERNAL"):?>
                        <tr>
                            <th scope="row"><?= __('Url') ?></th>
                            <td><?= h($record->url) ?></td>
                        </tr>
                    <?php endif;?>
                    <?php if($record->_type == "CONTENT"):?>
                        <tr>
                            <th scope="row"><?= __('Konten') ?></th>
                            <td><?= h($record->content->title) ?></td>
                        </tr>
                    <?php endif;?>
                    <?php if(!empty($record->picture)):?>
                        <tr>
                            <th scope="row" width="20%"><?= __('Gambar') ?></th>
                            <td><img src="<?= $this->Utilities->generateUrlAsset($record->picture_dir,$record->picture,$defaultAppSettings['Thumbail.SM'].'_') ?>" class="img-thumbnail"></td>
                        </tr>
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