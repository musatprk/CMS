<header>
	<div class="hdr-top">
		<div class="hdr-top-logo"><a href="./"><img src="img/hdr-logo.png"/></a></div>
		<div class="hdr-top-login">
			<?php 
			function header_menu(){
				if(isset($_SESSION['user_role'])&&$_SESSION['user_role']!="public"){
					$user_no=$_SESSION['user_no'];
					$user_name=$_SESSION['user_name'];
					$user_role=$_SESSION['user_role'];
					if($user_role=="user"){
						echo ("<a href='?url=user/panel&no=$user_no'>$user_name</a> • <a href='?url=user/logout'>cikis</a>");
					} else if($user_role=="advisor"){
						echo ("<a href='?url=user/panel&no=$user_no'>$user_name</a> • <a href='?url=user/logout'>cikis</a>");
					} else if($user_role=="admin"){
						echo ("<a href='?url=user/panel&no=$user_no'>$user_name</a> • <a href='?url=user/logout'>cikis</a>");
					} else echo ("<a href='?url=user/login'>giris</a>");
				} else echo ("<a href='?url=user/login'>giris</a>");
			} header_menu(); ?>
		</div>
	</div>
	<div class="hdr-bottom">
		<div class="hdr-bottom-logo"><a href="./"><img src="img/logo.png"/></a></div>
		<div class="hdr-bottom-text"><?php global $slogan; echo $slogan; ?></div>
		<div class="hdr-bottom-search"><input type="search" id="" name="" value="" placeholder="Elastik Arama..." /></div>
	</div>
</header>