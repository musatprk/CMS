<?php
function m_user_login($no){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM user WHERE no = $no") or die (mysqli_error($conn));
    //$num_rows=mysqli_num_rows($query);
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else message("Uzgunuz!", "Boyle bir kullanici kayitli degil. <a href='javascript:window.history.back();'>← Geri dön</a>");
}
function m_user_register($no, $name, $password, $gender){
    global $conn;
    if($gender=="Beyefendi") $image="src/user/male.jpg"; else $image="src/user/female.jpg";
    $query = mysqli_query($conn, "INSERT INTO user (no, name, password, role, gender, level, image, url, bio) VALUES ('$no', '$name', '$password', 'user', '$gender', NULL, '$image', NULL, NULL)") or die(mysqli_error($conn));
    if($query){
        $id=$conn->insert_id;
        message("Tebrikler!", "Kayit oldunuz numaraniz ve sifreniz ile giris yapabiliriniz.");
    } else message("Uzgunuz!", "Kayit olusturulamadi. <a href='javascript:window.history.back();'>← Geri dön</a>");
}
function m_user_control($no){
    global $conn;
    $query = mysqli_query($conn, "SELECT no FROM user WHERE no = $no") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc[0]["no"];
    } else return array();
}
function m_user_profile($no){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM user WHERE no = $no") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else return array();
}
function m_user_password_control($no, $password){
    global $conn;
    $query = mysqli_query($conn, "SELECT password FROM user WHERE no = $no") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc[0]["password"];
    } else message("Uzgunuz!", "Mevcut sifreniz yanlis. <a href='javascript:window.history.back();'>← Geri dön</a>");
}
function m_user_changepassword($no, $password){
    global $conn;
    $query = mysqli_query($conn, "UPDATE user SET password = '$password' WHERE no = $no") or die(mysqli_error($conn));
    if($query){
        header("Refresh: 5; ?url=user/logout");
        message("Tebrikler!", "Sifreniz degistirildi. 5 saniye sonra cikisa yonlendirileceksiniz. Yeni sifrenizle yeniden giris yapiniz");
    } else message("Uzgunuz!", "Sifreniz degistirilemedi. <a href='javascript:window.history.back();'>← Geri dön</a>");
}
function m_user_img_update($no, $image=NULL){
    global $conn;
    $query=mysqli_query($conn,"UPDATE user SET  image='$image' WHERE no =$no") or die(mysqli_error($conn));
    if($query){
        // header("Refresh: 3; ");
        message("Tebrikler!", "Profil resminiz guncellendi. <a href='javascript:window.history.back();'>← Geri dön</a>"); 
    } else message("Uzgunuz!", "Profiliniz güncellenemedi. <a href='javascript:window.history.back();'>← Geri dön</a>");
}
function m_user_info_update($no, $url, $bio){
    global $conn;
    $query=mysqli_query($conn,"UPDATE user SET url='$url', bio='$bio' WHERE no =$no") or die(mysqli_error($conn));
    if($query){
        message("Tebrikler!", "Profiliniz güncellendi. <a href='javascript:window.history.back();'>← Geri dön</a>");
    } else message("Uzgunuz!", "Profiliniz güncellenemedi. <a href='javascript:window.history.back();'>← Geri dön</a>");
}
?>