<section>
	<article>
		<div class="head"><?php echo $view["article_head"]." ".count($view["article"])." Adet"; ?></div>
		<?php foreach($view["article"] as $content ) {?>
		<div class="content">
			<div class="content-left">
				<div class="content-thumbnail"><img src="<?php echo $content["href"]; ?>" width="100%" /></div>
			</div>
			<div class="content-right">
				<div class="content-date"><?php echo $content["starting"]; ?> | <?php echo $content["deadline"]; ?> | <a href="?url=content/edit&id=<?php echo $content["id"]; ?>"><?php echo $view["edit_text"]; ?></a></div>
				<div class="content-head"><a href="?url=content/show&id=<?php echo $content["id"]; ?>"><?php echo $content["head"]; ?></a></div>
				<div class="content-body"><?php echo substr($content["body"], '0', '220')." ..."; ?></div>
			</div>
			</div>
		<?php } ?>	
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