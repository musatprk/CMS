<section>
	<article>
		<div class="head"><?php echo $view['article'][0]['name']; ?></div>
		<div class="content">
            <div class="content-left">
                <div class="user-thumbnail"><img src="<?php echo $view['article'][0]['image']; ?>" width="100%"/></div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label id="label-file" for="input-file" onclick="document.getElementById('label-file').innerHTML='Resim Sec';">Resmi Degistir</label><input type="file" name="user_image" id="input-file" /><br><br>
                    <input type="submit" name="imgupdate" value="RESMI KAYDET">
                </form>
            </div>
            <div class="content-right">
                <form action="" method="POST">
                    <div class="content-date">Baglanti: <span style="font-weight: normal">(ornek: https://www.google.com/)</span></div>
                    <input type="url" name="url" value="<?php echo $view['article'][0]['url']; ?>" minlength="0" maxlength="70" pattern=".{0,70}" title="En az 0, en cok 70 karakterlik url" ><br><br>
                    <div class="content-date">Hakkimda: </div>
                    <textarea name="bio" minlength="0" maxlength="5000" pattern=".{0,5000}" title="En az 0, en cok 5000 karakterlik metin" ><?php echo $view['article'][0]['bio']; ?></textarea><br><br>
                    
                    <input type="submit" name="infoupdate" value="PROFILI GUNCELLE"><br><br>
                    
                </form>
            </div>
		</div>
	</article>
	<aside>
		<div class="head"><?php echo $view['aside_head'];?></div>
        <div class="content">
            <div class="bar">
                <ul>
                    <?php include_once($view['aside']);?> 
                </ul>
            </div>
        </div>
	</aside>
</section>