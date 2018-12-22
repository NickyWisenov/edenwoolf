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
				<img src="/frontend/images/icons/social-twitter.png" />
				<!-- <span class="fb-shared-num" data-sc-fb="<?= Yii::$app->request->absoluteUrl ?>">0</span> -->
			</li>				
			<li class="in">
				<img src="/frontend/images/icons/social-twitter.png" />
				<!-- <span class="in-shared-num" data-sc-ln="<?= Yii::$app->request->absoluteUrl ?>">0</span> -->
			</li>				
			<li class="tw">
				<img src="/frontend/images/icons/social-twitter.png" />
<!-- 				<span class="tw-shared-num" data-sc-tw="<?= Yii::$app->request->absoluteUrl ?>">0</span> -->
			</li>
		</ul>
	</div>
	
	<div class="body"><?=$blog->body ?></p>

</div>

<div class="recent-blogs-sec">
	<div class="recent-blogs-header">
		<label style="position: absolute;margin-top: -10px;font-size: 1.2em;">Recent Blogs</label>
		<hr style="margin-left: 120px"; />
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
</div>



<?php echo \cyneek\comments\widgets\Comment::widget(['model' => $blog]); ?>
