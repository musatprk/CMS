<?php
function c_user_login($params){
    if(isset($_POST['login'])){
        model(array("file"=>"user.php"));
        $user=m_user_login($_POST["no"]);
        if($_POST["no"]==$user[0]["no"]&&md5($_POST["password"])==$user[0]["password"]){
            $_SESSION["user_id"]= $user[0]["id"];
            $_SESSION["user_no"]= $user[0]["no"];
            $_SESSION["user_name"]= $user[0]["name"];
            $_SESSION["user_password"]= $user[0]["password"];
            $_SESSION["user_role"]= $user[0]["role"];
            $_SESSION["user_gener"]= $user[0]["gender"];
            $_SESSION["user_level"]= $user[0]["level"];
            $_SESSION["user_image"]= $user[0]["image"];
            $_SESSION["user_url"]= $user[0]["url"];
            $_SESSION["bio"]= $user[0]["bio"];
            $no=$_SESSION["user_no"];
            header("Location: ?url=user/panel&no=$no");
        } else message("Uzgunuz!", "Giris yapilamadi. <a href='javascript:window.history.back();'>← Geri dön</a>");
    } else view(array(
        "file"=>"login.php",
        "title"=>"Giris"));
}
function c_user_register($params){
    if(isset($_POST["register"])){
        model(array("file"=>"user.php"));
        if($_POST['password_1']!=$_POST['password_2']){
            message("Uzgunuz!", "Sifreler uyusmuyor. Lutfen tekrar deneyin. <a href='javascript:window.history.back();'← Geri dön</a>");
        } else if($_POST['no']==m_user_control($_POST["no"])){
            message("Uzgunuz!", "Boyle bir kullanici zaten var. <a href='javascript:window.history.back();'← Geri dön</a>");
        } else m_user_register($_POST["no"], $_POST["name"], md5($_POST["password_1"]), $_POST["gender"]);
    } else view(array(
        "file"=>"register.php",
        "title"=>"Kayit"));
}
function c_user_lostpassword($params){
    if(isset($_POST["lostpassword"])){
        model(array("file"=>"user.php"));
        if($_POST['no']!=m_user_control($_POST['no'])){
        message("Uzgunuz!", "Boyle bir kullanici kayitli degil. <a href='javascript:window.history.back();'← Geri dön</a>");
        } else{
            //functions...
            message("Tebrikler!", "Yeni sifre istediniz. Yonetici onay verdikten sonra numaraniz ve yeni sifreniz ile giris yapabiliriniz");
        } 
    } else view(array(
        "file"=>"lostpassword.php",
        "title"=>"Sifremi Unuttum"));
}
function c_user_profile($params){
    if(isset($_GET["no"])&&!empty($_GET['no'])&&is_numeric($_GET['no'])){
        $no=$_GET["no"];
        model(array("file"=>"user.php"));
        view(array(
            "file"=>"profile.php",
            "title"=>"Profil",
            "article"=>m_user_profile($no),
            "level_text"=>"Seviye: ",
            "content_count_text"=>"Ödev Sayısı: ",
            "aside_head"=>"Menu",
            "aside"=>$params["aside"]));
            
    } else message("Biraz utanç verici, değil mi?", "Görünen o ki, aradığınız her ne ise bulamıyoruz. Belki elastik arama yapabilirsiniz.");
}
function c_user_changepassword($params){
    if(isset($_POST["changepassword"])){
        model(array("file"=>"user.php"));
        if($_POST['password_1']!=$_POST['password_2']){
            message("Uzgunuz!", "Sifreler uyusmuyor. <a href='javascript:window.history.back();'← Geri dön</a>"); 
        } else if(md5($_POST['password'])!=m_user_password_control($_SESSION['user_no'], md5($_POST['password']))){
            message("Uzgunuz!", "Mevcut sifreniz yanlis. <a href='javascript:window.history.back();'← Geri dön</a>");
        } else m_user_changepassword($_SESSION['user_no'], md5($_POST['password_1']));
    }else view(array(
        "file"=>"changepassword.php",
        "title"=>"Sifremi Degistir"));
}
function c_user_update($params){
    model(array("file"=>"user.php"));
    if(isset($_GET["no"])&&!empty($_GET['no'])&&is_numeric($_GET['no'])&&$_SESSION['user_no']==$_GET["no"]){
        $no=$_GET["no"];
        if(isset($_POST['infoupdate'])){
            m_user_info_update($no, $_POST['url'], $_POST['bio']);
        } else view(array(
            "file"=>"profileupdate.php",
			"title"=>"Profil Güncelle",
            "article"=>m_user_profile($no),
            "aside_head"=>"Hızlı Bağlantılar",
            "aside"=>$params["aside"]));
    } else message("Biraz utanç verici, değil mi?", "Görünen o ki, aradığınız her ne ise bulamıyoruz. Belki elastik arama yapabilirsiniz.");
    //IMAGE UPDATE BEGINS
    if(isset($_FILES['user_image'])){
        if($_FILES['user_image']['error']){
            message("Uzgunuz!", "Yuklenirken bir hata gerceklesti. <br>Once 'Resim Degistir'e tiklayarak cihazinizdan bir resim secin, <br>Resmi sectikten sonra 'RESMI KAYDET'e tiklayin. <br><a href='javascript:window.history.back();'>← Geri dön</a>");
        } else {
            $size = $_FILES['user_image']['size'];
            if($size > (1024*1024*3)){
            message("Uzgunuz!", "Dosya 3MB den buyuk olamaz. <a href='javascript:window.history.back();'← Geri dön</a>");
            } else {
                $image_type = $_FILES['user_image']['type'];
                $image_name = $_FILES['user_image']['name'];
                $image_extension = explode('.', $image_name);
                $image_extension = $image_extension[count($image_extension)-1];
                if($image_type != 'image/jpeg' || $image_extension != 'jpg') {
                message("Uzgunuz!", "Yanlizca JPG dosyalari yukleyebilirsiniz. <a href='javascript:window.history.back();'← Geri dön</a>");
                } else {
                    $image_tmp_name = $_FILES['user_image']['tmp_name'];
                    $no=$_SESSION['user_no'];
                    $img="src/user/".$no.".jpg";
                    copy($image_tmp_name, $img);
                    m_user_img_update($no, $img);
                    // header("Refresh: 1; ");
                }
            }
        }
    } //IMAGE UPDATE ENDS
}
function c_user_panel($params){
    if(isset($_GET["no"])&&!empty($_GET['no'])&&is_numeric($_GET['no'])&&$_SESSION['user_no']==$_GET["no"]){
        $no=$_GET["no"];
        model(array("file"=>"user.php"));
        view(array(
            "file"=>"panel.php",
			"title"=>"Panel",
            "article_head"=>"Hoşgeldiniz",
            "article"=>m_user_profile($no),
            "aside_head"=>"Menu",
            "aside"=>$params["aside"]));
    } else message("Biraz utanç verici, değil mi?", "Görünen o ki, aradığınız her ne ise bulamıyoruz. Belki elastik arama yapabilirsiniz.");
}
?>