<?php
	use yii\helpers\Url;
?>

<div class="recent-blog-item col-lg-4 col-sm-4 col-xs-12">
	<div class="recent-blog-img">
		<img src="<?= str_replace('original', 'preview', $recent_blog->image) ?>">
	</div>
	<div class="recent-blog-body">
		<div class="recent-blog-title-div">
			<a href=<?php echo Url::to(['view', 'id' => $recent_blog->id]); ?>>
				<h3 class="recent-blog-title">
					<?= $recent_blog->title ?>
				</h3>
			</a>
		</div>
		<div class="recent-blog-subheading-div">
			<h4 class="recent-blog-subheading">
				<?= $recent_blog->subheading ?>
			</h4>	
		</div>
	</div>
</div>