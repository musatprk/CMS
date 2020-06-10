<section>
	<aside style="float: none; margin: auto;">
        <div class="head"><?php echo $view["title"]; ?></div>
        <div class="content">
            <form action="" method="POST">
                <br>
                <input type="text" name="no" autocomplete="off" placeholder="Numaranızı Giriniz" minlength="10" maxlength="10" pattern="\d{10}" title="On katakterlik okul numarası" required><br>
                <input type="password" name="password" placeholder="Şifrenizi Giriniz" minlength="6" maxlength="10" pattern=".{6,10}" title="En az 6, en cok 10 karakterlik şifre" required><br><br>
                
                <input type="submit" name="login" value="GİRİŞ YAP"><br><br>

                <a href="?url=user/register">Kayit icin tiklayiniz</a> | <a href="?url=user/lostpassword">Şifrenizi mi unuttunuz?</a><br>
            </form>
        </div>
	</aside>
</section>