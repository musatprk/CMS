<section>
	<aside style="float: none; margin: auto;">
        <div class="head"><?php echo $view["title"]; ?></div>
        <div class="content">
            <form action="" method="POST">
                <br>
                <input type="radio" id="male" name="gender" value="Beyefendi" checked><label for="male">Beyefendi </label>
                <input type="radio" id="female" name="gender" value="Hanımefendi"><label for="female">Hanımefendi </label><br><br>

				<input type="text" name="no" autocomplete="off" placeholder="Numaranızı Giriniz" minlength="10" maxlength="10" pattern="\d{10}" title="10 katakterlik okul numarası" required><br>
                <input type="text" name="name" autocomplete="off" placeholder="Adınızı Giriniz" minlength="3" maxlength="10" pattern="[a-z]{3,10}" title="Sadece küçük harf kullanınız, türkçe karakter, özel karakterler ve boşluk kullanmayınız, en cok 10 karakter kullanılabilir" required><br>
                <input type="password" name="password_1" placeholder="Şifrenizi Belirleyiniz" minlength="6" maxlength="10" pattern=".{6,10}" title="En az 6, en cok 10 karakterlik şifre" required><br>
                <input type="password" name="password_2" placeholder="Şifrenizi Tekrarlayınız" minlength="6" maxlength="10" required><br><br>

                <input type="submit" name="register" value="KAYIT OL"><br><br>

                <a href="?url=user/login">Giris icin tiklayiniz</a><br>
            </form>
        </div>
	</aside>
</section>