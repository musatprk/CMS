<section>
	<article>
		<div class="head"><?php echo $view["article_head"]; ?></div>
		<div class="content">
			<?php echo $view["article"]; ?>
		</div>
	</article>
	<aside>
		<div class="head"><?php echo $view["aside_head"]; ?></div>
		<div class="bar">
			<ul>
				<?php include_once($view['aside']);?>
			</ul>
		</div>
	</aside>
</section>