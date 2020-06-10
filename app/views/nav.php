<nav>
	<div class="menu">
		<ul>
			<?php
			function nav_menu($id = 0){
				global $conn;
				$query = mysqli_query($conn, "SELECT * FROM category WHERE parent_id = $id") or die(mysqli_error($conn));
				if (mysqli_affected_rows($conn)){
					while ($row = mysqli_fetch_assoc($query)){ ?>
					<li><a href="<?php echo $row["href"]; ?>" title="<?php echo $row["title"]; ?>"><?php echo $row["name"]; ?></a>
						<ul><li><?php nav_menu($row["id"]); ?></ul></li><?php
					}
				} else return false;
			} nav_menu(); ?>			
		</ul>
		<ul style="float: right">
			<li></li>
		</ul>
	</div>
</nav>
