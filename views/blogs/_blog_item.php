<?php
	use yii\helpers\BaseStringHelper;
	use yii\helpers\Url;

?>
<!-- Blog Item Partial Start -->
<div class="blog-item col-lg-4 col-md-6 col-xs-12">
	<div class="blog-img">
		<img src="<?= $blog->image ?>">
	</div>
	<p class="blog-categoryName"><?= $blog->category->category_name ?></p>
	<div class="blog-title-div">
		<a class="blog-title" href=<?php echo Url::to(['view', 'id' => $blog->id]); ?>>
			<?= $blog->title ?>
		</a>
	</div>
	
	<div class="blog-subheading-div">
		<h2 class="blog-subheading">
			<?= $blog->subheading ?>
		</h2>
	</div>

	<div class="blog-body">
		<?= BaseStringHelper::truncate($blog->body, 100, ' ... ', null, true); ?>
	</div>
	<div class="blog-footer">
		<span class="blog-created-at">
			<?php
				Yii::$app->formatter->locale = 'en-US';
				echo Yii::$app->formatter->asDate($blog->created_at);
			?>
		</span>
		<span class="blog-author">
			<a href="#">
				<?= $blog->getAuthor()['display_name']; ?>
			</a>
		</span>
		<div class="share-buttons" data-blogId="<?= $blog->id ?>">
			<ul class="share-buttons-list">
				<li class="fb">
					<i class="fa fa-facebook"></i>
					<span class="fb-shared-num" data-sc-fb="<?= Yii::$app->urlManager->createAbsoluteUrl('/blogs/'. $blog->id) ?>">0</span>
				</li>				
				<li class="in">
					<i class="fa fa-linkedin"></i>
					<span class="in-shared-num" data-sc-ln="<?= Yii::$app->urlManager->createAbsoluteUrl('/blogs/'. $blog->id) ?>">0</span>
				</li>				
				<li class="tw">
					<i class="fa fa-twitter"></i>
					<span class="tw-shared-num" data-sc-tw="<?= Yii::$app->urlManager->createAbsoluteUrl('/blogs/'. $blog->id) ?>">0</span>
				</li>
			</ul>
		</div>	
	</div>
</div>
<!-- Blog Item Partial End -->
