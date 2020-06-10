<?php
function c_content_home($params){
    model(array(
        "file"=>"content.php"));
    view(array(
        "file"=>"home.php",
        "title"=>"Anasayfa",
        "article_1_head"=>"Latest information about COVID-19",
        "article_1"=>m_content_show_last5($params["typ3"], $params["status"]),
        "aside_1_head"=>"Hizli Baglantilar",
        "aside_1"=>"app/views/barpublic.php",
        "article_2_head"=>"Son 5 Duyuru",
        "article_2"=>m_content_show_last5($params["typ1"], $params["status"]),
        "aside_2_head"=>"Son 5 Odev",
        "aside_2"=>m_content_show_last5($params["typ2"], $params["status"])));
}
function c_content_new(){
    model(array(
        "file"=>"content.php"));
    if(isset($_POST['contentnew'])){
        if(isset($_POST['status'])){
            $status=$_POST['status'];
            m_content_new($_POST['deadline'], $_POST['head'], $_POST['body'], $status, "0", $_POST['typ_id_fk'], $_POST['category_id_fk'], $_SESSION['user_id']);
        } else {
            $status="unpublished";
            m_content_new($_POST['deadline'], $_POST['head'], $_POST['body'], $status, "0", $_POST['typ_id_fk'], $_POST['category_id_fk'], $_SESSION['user_id']);
        }    
    } else view(array(
        "file"=>"contentnew.php",
        "title"=>"Yeni Icerik",
        "article_1"=>m_content_typ(),
        "article_2"=>m_content_category($_SESSION['user_id'])));
}
function c_content_show($params){
    model(array("file"=>"content.php"));    
    $count=m_content_count();
    if(isset($_GET["id"])&&1<=$_GET["id"]&&$_GET["id"]<=$count){
        $content_id=$_GET["id"];
        if(isset($_POST['comment'])){
            m_child_content_new("HEAD", $_POST['body'], $params["status"], $content_id, $params["typ"], "1", $_SESSION['user_id']);
        } else view(array(
            "file"=>"content.php",
            "title"=>"Icerik",
            "article"=>m_content_show($content_id),
            "article_childs"=>m_child_contents_show($content_id)));
    } else message("Biraz utanç verici, değil mi?", "Görünen o ki, aradığınız her ne ise bulamıyoruz. Belki elastik arama yapabilirsiniz.");
}
function c_contents_show($params){
    model(array("file"=>"content.php"));
    if($params["edit_text"]=="open") $params["edit_text"]="Duzenle"; else $params["edit_text"]="";
    view(array(
        "file"=>"contents.php",
        "title"=>"Tüm Içerikler",
        "article_head"=>$params["article_head"],
        "article"=>m_contents_show($params["typ"], $params["status"]),
        "edit_text"=>$params["edit_text"],
        "aside_head"=>"Menu",
        "aside"=>$params["aside"]));
}
function c_user_changepassword($params){
    if(isset($_POST["changepassword"])){
        model(array("file"=>"user.php"));
        if($_POST['password_1']!=$_POST['password_2']){
            message("Uzgunuz!", "Sifreler uyusmuyor. <a href='javascript:window.history.back();'← Geri dön</a>"); 
        } else if(md5($_POST['password'])!=m_user_password_control($_SESSION['user_no'], md5($_POST['password']))){
            message("Uzgunuz!", "Mevcut sifreniz yanlis. <a href='javascript:window.history.back();'> ← Geri dön</a>");
        } else m_user_changepassword($_SESSION['user_no'], md5($_POST['password_1']));
    } else view(array(
        "file"=>"changepassword.php",
        "title"=>"Sifremi Degistir"));
}
function c_user_contents_show($params){
    model(array("file"=>"content.php"));
    if($params["edit_text"]=="open") $params["edit_text"]="Duzenle"; else $params["edit_text"]="";
    view(array(
        "file"=>"contents.php",
        "title"=>"Tüm Içerikler",
        "article_head"=>$params["article_head"],
        "article"=>m_user_contents_show($params["typ"], $params["status"],$_SESSION['user_no']),
        "edit_text"=>$params["edit_text"],
        "aside_head"=>"Menu",
        "aside"=>$params["aside"]));
}
function c_user_contents_fetch($params){
    if(isset($_POST["contentsfetch"])){
        model(array("file"=>"user.php"));
        if($_POST['no']!=m_user_control($_POST['no'])){
            message("Uzgunuz!", "Boyle bir kullanici kayitli degil. <a href='javascript:window.history.back();'> ← Geri dön</a>");
        } else {
            model(array("file"=>"content.php"));
            if($params["edit_text"]=="open") $params["edit_text"]="Duzenle"; else $params["edit_text"]="";
            view(array(
                "file"=>"contents.php",
                "title"=>"Tüm Içerikler",
                "article_head"=>$params["article_head"],
                "article"=>m_user_contents_show($params["typ"], $params["status"], $_POST["no"]),
                "edit_text"=>$params["edit_text"],
                "aside_head"=>"Menu",
                "aside"=>$params["aside"]));
        }
    } else view(array(
        "file"=>"contentsfetch.php",
        "title"=>"Kullanici Icerigi Getir",
        "aside_head"=>"Menu",
        "aside"=>$params["aside"]));
}
?>