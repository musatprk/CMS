<section>
	<aside style="float: none; margin: auto;">
        <div class="head"><?php echo $view["title"]; ?></div>
        <div class="content">
            <form action="" method="POST">
                <br>
                <input type="text" name="no" autocomplete="off" placeholder="Numaranızı Giriniz" minlength="10" maxlength="10" pattern="\d{10}" title="On katakterlik okul numarası" required><br><br>
                
                <input type="submit" name="lostpassword" value="YENİ ŞİFRE İSTE"><br><br>

                <a href='javascript:window.history.back();'>← Geri dön</a><br>
            </form>
        </div>
	</aside>
</section>