<section>
	<article>
		<div class="head"><?php echo $view['title']?></div>
		<div class="content">
			<div class="content-date"><?php echo $view['article_head']." ".$view['article'][0]['name']; ?></div>
		    <div class="content-head"><?php echo $view['article'][0]['no']; ?></div><br>
		    <div class="content-body">İşlemlerinizi sağ tarafdaki menüden gerçekleştirebilirsiniz</div>
		</div>
	</article>
	<aside>
		<div class="head"><?php echo $view["aside_head"]; ?></div>
		<div class="content">
			<div class="bar">
				<ul>
					<?php include_once($view["aside"]); ?>
				</ul>
			</div>
		</div>
	</aside>
</section>