<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use mranger\load_more_pager\LoadMorePager;

$this->title = 'Eden Woolf - Blogs';

?>

<!-- *****************Blogs-start****************** -->
<section class="blogs-sec">
	<div class="container blogs-sec-header">
		<button class="category-collapse-button">
			<i class="fa fa-bars" style="padding-left: 10px;
			"></i>
	    </button>
		<h2 class="news-heading">
			News
		</h2>
		<div class="row icons category">
		 	<ul>
		 		<li>
		 			<a href=<?php echo Url::to(['index']); ?>>
			 			<img src="/frontend/images/icons/icon_all.png" />
			 			<div>View All</div>
		 			</a>
		 		</li>
		 		<li>
		 			<a href=<?php echo Url::to(['category', 'id' => 1]); ?>>
			 			<img src="/frontend/images/icons/icon_entertainment.png" />
			 			<div>Entertainment</div>
		 			</a>
		 		</li>
		 		<li>
		 			<a href=<?php echo Url::to(['category', 'id' => 2]); ?>>
			 			<img src="/frontend/images/icons/icon_food_wine.png" />
			 			<div>Food and Wine</div>
		 			</a>
		 		</li>
		 		<li>
		 			<a href=<?php echo Url::to(['category', 'id' => 3]); ?>>
			 			<img src="/frontend/images/icons/icon_lifestyle.png" />
			 			<div>LifeStyle</div>
		 			</a>
		 		</li>
		 		<li>
		 			<a href=<?php echo Url::to(['category', 'id' => 4]); ?>>
			 			<img src="/frontend/images/icons/icon_opinion.png" />
			 			<div>Opinion</div>
		 			</a>
		 		</li>
		 		<li>
		 			<a href=<?php echo Url::to(['category', 'id' => 5]); ?>>
			 			<img src="/frontend/images/icons/icon_politics.png" />
			 			<div>Politics</div>
		 			</a>
		 		</li>
		 		<li>
		 			<a href=<?php echo Url::to(['category', 'id' => 6]); ?>>
			 			<img src="/frontend/images/icons/icon_finance.png" />
			 			<div>Finance</div>
		 			</a>
		 		</li>
		 	</ul>
		</div>
	</div>
	<div class="container blog-container">
		<?php
			foreach ($blogs as $id => $blog) {
				echo $this->render('_blog_item.php', [
					'blog' => $blog
				]);
			}
		?>
	</div>
	<div class="showmore-button">
		<?php
			if ($pages->getPageSize() > 1 && $pages->getPage() < $pages->getPageSize()) {
				echo LoadMorePager::widget([
					'pagination' => $pages,
					'id'                  => 'pagination',
					'class'      	      => 'showmore-btn',
					'buttonText'          => '<span class="showmore-txt">SHOW MORE</span>', // Текст на кнопке пагинации
				    'template'            => '<div class="text-center">{button}</div>', // Шаблон вывода кнопки пагинации
				    'contentSelector'     => '.blog-container', // Селектор контента
				    'contentItemSelector' => '.blog-item', // Селектор эллементов контента
				    'includeCssStyles'    => true, // Подключать ли CSS стили виджета, или вы оформите пагинацию сами
				    'loaderShow'          => true, // Отображать ли индикатор загрузки
				    'loaderAppendType'    => LoadMorePager::LOADER_APPEND_TYPE_CONTENT,
				    'loaderTemplate'      => '<i class="load-more-loader"></i>', // Шаблон индикатора загрузки
				    'options'             => [], // Массив опций кнопки паганации
				    'onLoad'              => null, 
				    'onAfterLoad'         => null, // Событие javascript которое будет вызываться в момент окончания загрузки новых эллементов
				    'onFinished'          => null, // Событие javascript которое будет вызываться в момент, когда все страницы паганации були загружены
				    'onError'             => null,
				]);
			}
		?>
	</div>
</section>
<!-- *****************Blogs-end****************** -->