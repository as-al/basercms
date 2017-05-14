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
 * [ADMIN] 統合コンテンツメニュー
 */
?>


<tr>
	<th><?php echo __d('baser', 'Contents Menu') ?></th>
	<td>
		<ul class="cleafix">
			<li><?php $this->BcBaser->link(__d('baser', 'Contents List'), array('plugin' => '', 'admin' => true, 'controller' => 'contents', 'action' => 'index')) ?></li>
<?php if($this->name == 'Contents' && $this->request->action == 'admin_index'): ?>
			<li><?php $this->BcBaser->link(__d('baser', 'Add Content'), "#", array('id' => 'BtnAddContent')) ?></li>
<?php endif ?>
			<li><?php $this->BcBaser->link(__d('baser', 'Trash'), array('plugin' => '', 'admin' => true, 'controller' => 'contents', 'action' => 'trash_index')) ?></li>
		</ul>
	</td>
</tr>
