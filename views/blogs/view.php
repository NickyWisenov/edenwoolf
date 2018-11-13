<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use mranger\load_more_pager\LoadMorePager;
use yii\widgets\ActiveForm;


$this->title = "Eden Woolf - $blog->title";
?>

<div class="container detail-view-sec">
<!-- 	<div style="float: right; margin-top:25px;">
		<a class="btn-default to-the-list" href="<?= Url::to(['blogs/index']);?>">&lt&ltTo the List</a>

	</div>	 -->

	<h1 class="title"><?=$blog->title ?></h1>

	<h2 class="subheading"><?= $blog->subheading ?></h2>
	
	<div>
		Posted by <a class="author" href="#"><?=$blog->getAuthor()['display_name']; ?></a> on 
		<span class="date">
			<?php
				Yii::$app->formatter->locale = 'en-US';
				echo Yii::$app->formatter->asDate($blog->created_at);
			?>
		</span>
	</div>

	<div class="image-div">
		<img class="image" src="<?= $blog->image ?>" />
	</div>

	<div class="share-buttons" data-blogId="<?= $blog->id ?>">
		<ul class="share-buttons-list">
			<li class="fb">
				<i class="fa fa-facebook"></i>
				<span class="fb-shared-num" data-sc-fb="<?= Yii::$app->request->absoluteUrl ?>">0</span>
			</li>				
			<li class="in">
				<i class="fa fa-linkedin"></i>
				<span class="in-shared-num" data-sc-ln="<?= Yii::$app->request->absoluteUrl ?>">0</span>
			</li>				
			<li class="tw">
				<img src="/frontend/images/icons/social-twitter.png" />
				<span class="tw-shared-num" data-sc-tw="<?= Yii::$app->request->absoluteUrl ?>">0</span>
			</li>
		</ul>
	</div>
	
	<div class="body"><?=$blog->body ?></p>

</div>

<div class="recent-blogs row">
	<?php
		$recentBlogs = $blog->getMostRecentBlogs();
		foreach ($recentBlogs as $id => $recent_blog) {
			echo $this->render('_recent_blog_item.php', [
				'recent_blog' => $recent_blog
			]);
		}
	?>
</div>

<div class="comments-sec">
	<div class="comments-sec-header">
		<span><?= count($comments); ?></span> comments

	</div>
	<div class="add-comment-div">
	    <?php $form = ActiveForm::begin(
                [
                    'action' => [Url::to(['blogs/comment']),'id' => $blog->id],
                    'enableClientValidation' => true,
                    'options' => [
                        'role' => 'form',
                        'class' => 'comment-form',
                        'id'=> 'comment-form'
                    ]
                ]
            ); ?>

		    <?= $form->field($new_comment, 'body')->textArea(['class' => "form-control", 'placeholder' => "Comment Here", 'required' => true])->label(false); ?>

		    <div class="form-group">
		        <?= Html::a(Html::tag('span', 'SUBMIT')
			     , null,  ['href' => 'javascript:void(0)', 'onclick'=>"submit()", 'class' => 'btn-comment']); ?>
		    </div>
	    <?php ActiveForm::end(); ?>
	</div>
	<div class="comments-list">
		<?php 
			if (!empty($blog->comments)) {
				foreach ($blog->comments as $comment) {
					if ($comment->status == 1 || $comment->user->id == 2) {
						echo $this->render('../comment/_comment_item.php', [
							'comment' => $comment
						]);
					}
				}
			}
		?>
	</div>
</div>

<script type="text/javascript">
	function submit(e) {
		if ($(".comment-form").find("textarea").val() != "") {
			$(".comment-form").submit();
		} else {
			alert("Comment Here");
		}
	}
</script>