<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 4.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * コンテンツ一覧
 */
?>


<?php echo $this->BcForm->create('Content', ['url' => ['action' => 'index']]) ?>
<?php echo $this->BcForm->hidden('Content.open', ['value' => true]) ?>
<p>
	<span>
		<?php echo $this->BcForm->label('Content.folder_id', __d('baser', 'Folder')) ?>
		<?php echo $this->BcForm->input('Content.folder_id', ['type' => 'select', 'options' => $folders, 'empty' => __d('baser', 'Not specified'), 'escape' => false]) ?>　
	</span>
	<span>
		<?php echo $this->BcForm->label('Content.name', __d('baser', 'Content Name')) ?>
		<?php echo $this->BcForm->input('Content.name', ['type' => 'text', 'size' => 20]) ?>
	</span>
	<span>
		<?php echo $this->BcForm->label('Content.type', __d('baser', 'Content Type')) ?>
		<?php echo $this->BcForm->input('Content.type', ['type' => 'select', 'options' => $contentTypes, 'empty' => __d('baser', 'Not specified')]) ?>　
	</span>
	<span>
		<?php echo $this->BcForm->label('Content.self_status', __d('baser', 'Publish Status')) ?>
		<?php echo $this->BcForm->input('Content.self_status', ['type' => 'select', 'options' => $this->BcText->booleanMarkList(), 'empty' => __d('baser', 'Not specified')]) ?>　
	</span>
	<span>
		<?php echo $this->BcForm->label('Content.author_id', __d('baser', 'Author')) ?>
		<?php echo $this->BcForm->input('Content.author_id', ['type' => 'select', 'options' => $authors, 'empty' => __d('baser', 'Not specified')]) ?>　
	</span>
	<?php echo $this->BcSearchBox->dispatchShowField() ?>
</p>
<div class="button">
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_search.png', ['alt' => __d('baser', 'Search'), 'class' => 'btn']), "javascript:void(0)", ['id' => 'BtnSearchSubmit']) ?>
	<?php $this->BcBaser->link($this->BcBaser->getImg('admin/btn_clear.png', ['alt' => __d('baser', 'Clear'), 'class' => 'btn']), "javascript:void(0)", ['id' => 'BtnSearchClear']) ?>
</div>
<?php $this->BcForm->end() ?>
