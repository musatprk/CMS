<section>
	<aside style="float: none; margin: auto;">
		<div class="head"><?php echo $view['title']?></div>
		<div class="content">
            <div class="content-body">Iceriklerini görmek istediğiniz kullanicinin numarasını giriniz</div>
            <form action="" method="POST">
                <br>
                <input type="text" name="no" autocomplete="off" placeholder="Kullanici Numarasını Giriniz" minlength="10" maxlength="10" pattern="\d{10}" title="On katakterlik okul numarası" required><br><br>

				<input type="submit" name="contentsfetch" value="KULLANICI ICERIGI GETIR"><br><br>
				
				<a href='javascript:window.history.back();'>← Geri dön</a><br><br>

            </form>
		</div>
	</aside>
</section>