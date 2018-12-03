<?php
	use yii\helpers\BaseStringHelper;
	use yii\helpers\Url;
	$user_id = $comment->user_id;
?>

<div class="container comment-div ">
	<div class="user-avatar">
		<img src="<?= $this->context->getUserProfileImage($user_id) ?>" class="media-object user-avatar-img">
	</div>
	<div class="comment-body">
		<p class="comment-user-date">
			<a href="#"><?= $comment->user->display_name ?></a> commented on
			<span class="commented-date">
				<?= substr($comment->created_at, 0, 10); ?>
			</span>
		</p>
		<p class="comment-text">
			<?= $comment->body ?>
		</p>
		<div class="comment-buttons">
			<a href="javascript:;" class="like-btn" data-id="<?= $comment->id ?>">
				<i class="glyphicon glyphicon-thumbs-up"></i>
				Like
			</a>
			<span><?= $comment->likes == 0 ? '0' : $comment->likes ?> likes</span>
			<a href="javascript:;" class="reply-btn" data-id="<?= $comment->id ?>">Reply</a>
			<a href="javascript:;" class="report-btn" data-id="<?= $comment->id ?>">Report</a>
		</div>
	</div>
</div>