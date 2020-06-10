<section>
	<article>
		<div class="head-alert"><?php echo $view["article_1_head"]; ?></div>
		<div class="content">
			<div class="slide" >
				<!-- Slideshow container -->
				<div class="slideshow-container">
					<div class="mySlides fade">
						<div class="numbertext">1 / 5</div>
						<img src="src/slide/slide-1.jpg" style="width:100%">
						<div class="text">Caption One</div>
					</div>
					<div class="mySlides fade">
						<div class="numbertext">2 / 5</div>
						<img src="src/slide/slide-2.jpg" style="width:100%">
						<div class="text">Caption Two</div>
					</div>
					<div class="mySlides fade">
						<div class="numbertext">3 / 5</div>
						<img src="src/slide/slide-3.jpg" style="width:100%">
						<div class="text">Caption Three</div>
					</div>
					<div class="mySlides fade">
						<div class="numbertext">4 / 5</div>
						<img src="src/slide/slide-4.jpg" style="width:100%">
						<div class="text">Caption Four</div>
					</div>
					<div class="mySlides fade">
						<div class="numbertext">5 / 5</div>
						<img src="src/slide/slide-5.jpg" style="width:100%">
						<div class="text">Caption Five</div>
					</div>
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
				</div><br>
				<div style="text-align:center">
					<span class="dot" onclick="currentSlide(1)"></span> 
					<span class="dot" onclick="currentSlide(2)"></span> 
					<span class="dot" onclick="currentSlide(3)"></span>
					<span class="dot" onclick="currentSlide(4)"></span>
					<span class="dot" onclick="currentSlide(5)"></span>
				</div>
				<!-- -->
				<script type="text/javascript" src="js/slider.js"></script>
			</div>
		</div>
	</article>
	<aside>
		<div class="head"><?php echo $view["aside_1_head"]; ?></div>
		<div class="content">
			<div class="bar">
				<ul>
					<?php include_once ($view["aside_1"]); ?>
				</ul>
			</div>
		</div>
	</aside>
</section>
<section>
	<article>
		<div class="head"><?php echo $view["article_2_head"]; ?></div> 
		<?php foreach($view["article_2"] as $content) {?>
		<div class="content">
			<div class="content-left">
				<div class="content-thumbnail"><img src="<?php echo $content["href"]; ?>" width="100%" /></div>
			</div>
			<div class="content-right">
				<div class="content-date"><?php echo $content["starting"]; ?></div>
				<div class="content-head"><a href="?url=content/show&id=<?php echo $content["id"]; ?>"><?php echo $content["head"]; ?></a></div>
				<div class="content-body"><?php echo substr($content["body"], '0', '220') . " ..."; ?></div>
			</div>	
		</div>
		<?php } ?>
	</article>
	<aside>
		<div class="head"><?php echo $view["aside_2_head"]; ?></div>
		<?php foreach($view["aside_2"] as $content) {?>
		<div class="content">
			<div class="content-date"><?php echo $content["starting"]; ?></div>
			<div class="content-head"><a href="?url=content/show&id=<?php echo $content["id"]; ?>"><?php echo $content["head"]; ?></a></div>
			<div class="content-body"><br></div>
		</div>
		<?php } ?>
	</aside>
</section>