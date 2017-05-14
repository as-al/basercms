<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Mail.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [PUBLISH] メールフォーム送信完了ページ
 */
$this->BcBaser->css('Mail.style', array('inline' => true));
if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']) {
	$this->Html->meta(array('http-equiv' => 'Refresh'), null, array('content' => '5;url=' . $mailContent['MailContent']['redirect_url'], 'inline' => false));
}
?>

<h1 class="contents-head">
	<?php $this->BcBaser->contentsTitle() ?>
</h1>

<h2 class="contents-head"><?php echo __('Completed mail submission') ?></h2>

<div class="section">
	<p><?php echo __('Thank you for your inquiry. As soon as we confirm it, we will contact you.') ?></p>
<?php if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']): ?>
	<p>※<?php echo __('It moves automatically to the top page after %s seconds.', 5) ?></p>
	<p><a href="<?php echo $mailContent['MailContent']['redirect_url']; ?>"><?php echo __('If you can not move, please click here.') ?>≫</a></p>
<?php endif; ?>
</div>
