<?php $this->BcBaser->js('admin/libs/jquery.baseUrl.js', false, ['once' => true]); ?>
<?php $this->BcBaser->js('admin/libs/jquery.bcUtil.js', false, ['once' => true]); ?>
<?php $this->BcBaser->js('admin/libs/jquery.bcToken.js', false, ['once' => true]); ?>
<?php $this->BcBaser->js('Blog.blog_comments_scripts.js', false, [
	'once' => true,
	'id' => 'BlogCommentsScripts',
	'data-alertMessageName' => __('Please enter your name'),
	'data-alertMessageComment' => __('Please enter comments'),
	'data-alertMessageAuthImage' => __('Please enter the letters of the image'),
	'data-alertMessageAuthComplate' => __('Submission has been completed. After confirming the contents we will make it public.'),
	'data-alertMessageComplate' => __('Comment submission has been completed.'),
	'data-alertMessageError' => __('Failed to submit comment. Please check the input contents.'),
]); ?>
<div id="BaseUrl" style="display: none"><?php echo $this->request->base; ?></div>

<script>
	authCaptcha = <?php echo $blogContent['BlogContent']['auth_captcha'] ? 'true' : 'false'; ?>;
	commentApprove = <?php echo $blogContent['BlogContent']['comment_approve'] ? 'true' : 'false'; ?>;

	$(function() {
		loadAuthCaptcha();
		$("#BlogCommentAddButton").click(function() {
			sendComment();
			return false;
		});
	});
</script>
