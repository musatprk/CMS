<section>
	<article>
        <div class="head"> Yeni İçerik Ekle</div>
        <div class="content">
            <form action="" method="POST">
                <label for="typ">Icerik Seçimi: </label>
                <select id="typ" name="typ_id_fk">
                <?php foreach($view['article_1'] as $typ){  ?>
                <option value="<?php echo $typ['id'];?>"><?php echo $typ['name'];?></option>
                <?php } ?>
                </select>
                <label for="category">Ders Seçimi: </label>
                <select id="category" name="category_id_fk">
                <?php foreach($view['article_2'] as $category){  ?>
                <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                <?php } ?>
                </select>
                <label for="deadline">Teslim Tarihi: </label>
                <input type="date" name="deadline" id="deadline" size="15" value="<?php echo date('Y-m-d'); ?>"> 
                <label for="status">Yayınla</label>
                <input type="checkbox" name="status" id="status" value="published" checked>
                <input type="text" id="" name="head" value="" placeholder="Başlık..." maxlength="70" required><br>
                <textarea id="" name="body" rows="20" placeholder="Gövde..." required></textarea><br>
                <input type="submit" name="contentnew" value="KAYDET" />
            </form>
        </div>
	</article>
</section>