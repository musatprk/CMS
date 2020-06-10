<section>
	<article>
		<div class="head"><?php echo $view['article'][0]['name']; ?></div>
		<div class="content">
			<div class="content-left">
				<div class="user-thumbnail"><img src="<?php echo $view['article'][0]['image']; ?>" width="100%" /></div><br>
				<div class="content-head"><?php echo $view["level_text"]; ?><span style="font-weight: normal; color: #61605c"><?php echo $view['article'][0]['level']; ?></span></div>
                <div class="content-head"><?php echo $view["content_count_text"]; ?><span style="font-weight: normal; color: #61605c"><?php //content count ?></span></div>
			</div>
			<div class="content-right">
				<div class="content-date"><?php echo "HAKKIMDA"; ?></div>
				<div class="content-head"><a href="<?php echo $view['article'][0]['url']; ?>" target="_blank"><?php echo $view['article'][0]['url']; ?></a></div><br>
				<div class="content-body"><?php echo $view['article'][0]['bio']; ?></div>
			</div>
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