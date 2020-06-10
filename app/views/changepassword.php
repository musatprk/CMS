<section>
	<aside style="float: none; margin: auto;">
        <div class="head"><?php echo $view["title"]; ?></div>
        <div class="content">
            <form action="" method="POST">
                <br>
                <input type="password" name="password" placeholder="Mevcut Şifrenizi Giriniz" minlength="6" maxlength="10" pattern=".{6,10}" title="En az 6, en cok 10 karakterlik şifre" required><br>
                <input type="password" name="password_1" placeholder="Yeni Şifrenizi Belirleyiniz" minlength="6" maxlength="10" pattern=".{6,10}" title="En az 6, en cok 10 karakterlik şifre" required><br>
                <input type="password" name="password_2" placeholder="Yeni Şifrenizi Tekrarlayiniz" minlength="6" maxlength="10" pattern=".{6,10}" title="En az 6, en cok 10 karakterlik şifre" required><br><br>

                <input type="submit" name="changepassword" value="ŞİFREMİ DEGİSTİR"><br><br>

                <a href='javascript:window.history.back();'>← Geri dön</a><br><br>

            </form>
        </div>
	</aside>
</section>