<section>
	<article>
		<div class="head"><?php echo $view["article"][0]["head"]; ?></div>
		<?php foreach($view["article"] as $contents ) {?>
		<div class="content">
			<div class="content-date">Veriliş Tarihi: <?php echo $contents["starting"]; ?> | Teslim Tarihi: <?php echo $contents["deadline"]; ?></div>
			<div class="content-head"><a href="?url=user/profile&no=<?php echo $contents["no"]; ?>"><?php echo $contents['name']; ?></a></div>
			<div class="content-body"><?php echo $contents["body"] ; ?></div>
		</div>
		<?php } ?>

		<?php /*foreach($view["article_childs"] as $comments ) { ?>
		<div class="content">			 
			<div class="comment-left">
				<div class="user-thumbnail"><img src="<?php echo $comments["image"]; ?>" width="100%" /></div>
			</div>
			<div class="comment-right">
				<div class="content-date"><?php echo $comments['starting']; ?> | <a href="?url=profile&no=<?php echo $comments["no"]; ?>"><?php echo $comments['name']; ?></a></div>
				<div class="content-head"><a href="?url=content/notice/published&id=<?php echo $comments["id"]; ?>"><?php echo $comments['head']; ?></a></div>	
				<div class="content-body"><?php echo $comments['body']; ?></div>
			</div>
		</div>
		<?php } */?>

		<?php
		function m_child($id=0){
			global $conn;
			$query = mysqli_query($conn, "SELECT content.id, content.starting, content.head, content.body, user.no, user.name, user.image  FROM content INNER JOIN user ON content.user_id_fk=user.id  WHERE parent_id = $id") or die(mysqli_error($conn));
			if (mysqli_affected_rows($conn)) {
				while ($row = mysqli_fetch_assoc($query)){ ?>
					<div class="content">			 
					<div class="comment-left">
						<div class="user-thumbnail"><img src="<?php echo $row["image"]; ?>" width="100%" /></div>
					</div>
					<div class="comment-right">
						<div class="content-date"><?php echo $row['starting']; ?> | <a href="?url=user/profile&no=<?php echo $row["no"]; ?>"><?php echo $row['name']; ?></a></div>
						<div class="content-head"><a href="?url=content/show&id=<?php echo $row["id"]; ?>"><?php echo $row['head']; ?></a></div>	
						<div class="content-body"><?php echo $row['body']; ?></div>
					</div>
				</div><div class="content"><div class="comment-right"><?php m_child($row["id"]); ?></div></div>
				<?php }
			} else return array();
		} m_child($_GET["id"]); ?>

		<?php if($_SESSION['user_role']!="public"){?>
		<div class="content">	
			<div class="comment-left">
				<div class="user-thumbnail"><img src="<?php echo $_SESSION['user_image']; ?>" width="100%" /></div>
			</div>	
			<div class="comment-right">
				<form action="" method="post">
					<textarea name="body" rows="10" placeholder="Yorum..." minlength="0" maxlength="5000" pattern=".{0,5000}" title="En az 0, en cok 5000 karakterlik metin" required></textarea>
					<input type="submit" name="comment" value="GONDER" />
				</form>
			</div>
		</div>
		<?php } ?>
	</article>
	<aside>
		<div class="head">Hizli Baglantilar</div>
		<div class="bar">
			<ul>
				<li><a href="https://obs.cumhuriyet.edu.tr/">OBS Ogrenci Bilgi Sistemi</a></li>
				<li><a href="http:./sqlmanager/">SQL Manager</a></li>
				<li><a href="http:./webexamsys/">WEB Exams</a></li>
				<li><a href="http:./phpweb/">PHP Server</a></li>
				<li><a href="ftp:./">FTP Server</a></li>
				<li><a href="http://www.cumhuriyet.edu.tr/haber/">Haberler</a></li>
				<li><a href="http://www.cumhuriyet.edu.tr/etkinlik/">Etkinlikler</a></li>
				<li><a href="http://www.cumhuriyet.edu.tr/duyuru/">Duyurular</a></li>
				<!--Cu-Radio <li><audio controls="" autoplay="autoplay"><source src="http://95.173.162.186:9804/;stream.mp3" type="audio/mp3">Tarayıcınız Desteklemiyor</audio></li> Cu-Radio-->
			</ul>
		</div>
	</aside>
</section>

