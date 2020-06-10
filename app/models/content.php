<?php
function m_content_count(){
    global $conn;
    $rows=mysqli_query($conn, "SELECT id FROM content") or die(mysqli_error($conn));
    return $rows->num_rows;
}
function m_content_typ(){
    global $conn;
    $query = mysqli_query($conn, "SELECT id, name, child_status FROM typ") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else return array();
}
function m_content_category($id){
    global $conn;
    $query = mysqli_query($conn, "SELECT id, name FROM category WHERE user_id_fk=$id") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else return array();
}
function m_content_new($deadline, $head, $body, $status, $parent_id, $typ_id_fk, $category_id_fk, $user_id){
    global $conn;
    $query = mysqli_query($conn, "INSERT INTO `content` (`starting`, `deadline`, `head`, `body`, `status`, `parent_id`, `typ_id_fk`, `category_id_fk`, `user_id_fk`)
    VALUES (now(), '$deadline', UPPER('$head'), '$body', '$status', '$parent_id', '$typ_id_fk', '$category_id_fk', '$user_id')") or die(mysqli_error($conn));
    if($query){
        $id=$conn->insert_id;
        message("Basarili", "Tebrikler! Iceriginiz olusturuldu. <a href='?url=content/show&id=$id'>Icerigi goruntule</a>");
    } else message("Basarisiz", "Uzgunuz! Icerik olusturulamadi");
}
function m_child_content_new($head, $body, $status, $parent_id, $typ_id_fk, $category_id_fk, $user_id){
    global $conn;
    $query = mysqli_query($conn, "INSERT INTO `content` (`starting`, `deadline`, `head`, `body`, `status`, `parent_id`, `typ_id_fk`, `category_id_fk`, `user_id_fk`)
    VALUES (now(), NULL, UPPER('$head'), '$body', '$status', '$parent_id', '$typ_id_fk', '$category_id_fk', '$user_id')") or die(mysqli_error($conn));
    if($query){
        header("location: ?url=content/show&id=$parent_id");
        //message("Basarili", "Tebrikler! Icerik gonderildi. <a href='javascript:window.history.back();'>Geri donmek icin tiklayin</a>");
    } else message("Basarisiz", "Uzgunuz! Icerik gonderilemedi");
}
function m_content_show($id){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM content INNER JOIN user ON content.user_id_fk=user.id WHERE content.id = $id") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else return array();
}
function m_child_contents_show($id){
    global $conn;
    $query = mysqli_query($conn, "SELECT content.id, content.starting, content.head, content.body, user.no, user.name, user.image  FROM content INNER JOIN user ON content.user_id_fk=user.id  WHERE parent_id = $id") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else return array();
}
function m_contents_show($typ_id, $status){
    global $conn;
    $query = mysqli_query($conn, "SELECT DISTINCT content.id, content.starting, content.deadline, content.head, content.body, file.href FROM content LEFT JOIN file ON content.id = file.content_id_fk WHERE typ_id_fk='$typ_id' and status='$status' ORDER BY id DESC") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else return array();
}
function m_user_contents_show($typ_id, $status, $no){
    global $conn;
    $query = mysqli_query($conn, "SELECT DISTINCT content.id, content.starting, content.deadline, content.head, content.body, file.href FROM content LEFT JOIN file ON content.id = file.content_id_fk join user on user.id=content.user_id_fk  WHERE typ_id_fk='$typ_id' and status='$status' and no='$no' ORDER BY id DESC") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else return array();
}
function m_content_show_rand5($typ_id, $status){
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM content WHERE typ_id_fk='$typ_id' and status='$status' ORDER BY RAND() LIMIT 5") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else return array();
}
function m_content_show_last5($typ_id, $status){
    global $conn;
    $query = mysqli_query($conn, "SELECT DISTINCT content.id, content.starting, content.head, content.body, file.href FROM content LEFT JOIN file ON content.id = file.content_id_fk WHERE typ_id_fk='$typ_id' and status='$status' ORDER BY id DESC LIMIT 5") or die(mysqli_error($conn));
    if (mysqli_affected_rows($conn)) {
        $fetch_assoc = $query->fetch_all(1);
        return $fetch_assoc;
    } else return array();
}

