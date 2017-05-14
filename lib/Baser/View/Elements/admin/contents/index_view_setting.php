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
if($this->action == 'admin_index') {
	echo $this->BcForm->hidden('ViewSetting.mode', array('value' => 'index'));
} elseif($this->action = 'admin_trash_index') {
	echo $this->BcForm->hidden('ViewSetting.mode', array('value' => 'trash'));
}
?>


<?php if($this->action == 'admin_index'): ?>
<div class="panel-box" id="ViewSetting">
<?php if(count($sites) >= 2): ?>
    <small><?php echo __d('baser', 'Site') ?></small> <?php echo $this->BcForm->input('ViewSetting.site_id', array('type' => 'select', 'options' => $sites)) ?>　｜　
<?php else : ?>
    <?php echo $this->BcForm->input('ViewSetting.site_id', array('type' => 'hidden', 'options' => $sites)) ?>
<?php endif ?>
    <small><?php echo __d('baser', 'Display Setting') ?></small> <?php echo $this->BcForm->input('ViewSetting.list_type', array('type' => 'radio', 'options' => $listTypes)) ?>
    <span id="GrpChangeTreeOpenClose">
        　｜　
        <button id="BtnOpenTree" class="button-small"><?php echo __d('baser', 'Expand All') ?></button>　
        <button id="BtnCloseTree" class="button-small"><?php echo __d('baser', 'Close All') ?></button>
    </span>
</div>
<?php endif ?>