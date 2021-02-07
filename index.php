  
<!--
MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMWX000KXWMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMMMMMWNK0kdoooodxOKNWMMMMMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMMWXKOxooooooooolooxk0XWMMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMWNX0kdoooloooooooooooooodxOKNWMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMWNKOxooolooooooooooooooooooolooxk0XWMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMWNX0kdollooloooooooooooooooooooooloooodk0KNWMMMMMMMMMMMMM
MMMMMMMMMMWNKOxoollooooooloooooooooooooooooooooooooooooxOKNWMMMMMMMMMM
MMMMMMMWX0kdoooooooooooooooooooooooooooooooooooooooooooooodk0XNMMMMMMM
MMMMMMNkdoloooooooooooooooooooooooooooooooooooooooooooooooooooxOXWMMMM
MMMMMMXxooooloooooooooooooooooooooooooooooooooooooooooooooolool:oKWMMM
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooolooc;:OWMMM
MMMMMMXxooooooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM
MMMMMMXxooooooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooolooc;:OWMMM
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooolooc;:OWMMM
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM 
        _   _   _   _   _   _   _   _     _   _   _   _   _   _    
       / \ / \ / \ / \ / \ / \ / \ / \   / \ / \ / \ / \ / \ / \ 
      ( n | e | w | - | n | o | d | e ) ( s | o | c | i | a | l )
       \_/ \_/ \_/ \_/ \_/ \_/ \_/ \_/   \_/ \_/ \_/ \_/ \_/ \_/
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM
MMMMMMXdooooooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM
MMMMMMXxooooooooooooooooooooooooooooooooooooooooooooooooooooool;:OWMMM
MMMMMMXxooolooooooooooooooooooooooooooooooooooooooooooooooooooc;:OWMMM
MMMMMMW0xoloolooooooooooooooooooooooooooooooooooooooooooooollc;,c0WMMM
MMMMMMMWXkdollloooooooooooooooooooooooooooooooooooooooollc:;,;:oONMMMM
MMMMMMMMMWNKOxollloooooooooooooooooooooooooooooooooollc;,,;cdOXNWMMMMM
MMMMMMMMMMMMMWX0kdolllooooolooooooooooooooooooooolc:;,,:ok0NWMMMMMMMMM
MMMMMMMMMMMMMMMMWNKOxollloooloooooooooooooooollc:,,;cdOKNWMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMWX0kdollloooooooooooollc:;,,:lx0NWMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMWNKOxollloooooollc:;,;cdOKNWMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMMMMMWX0kdolllc:;,,:lx0XWMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMWNKOdoc:cdkKNWMMMMMMMMMMMMMMMMMMMMMMMMMM
MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMWNXK0KNWMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
-->




<!doctype html>
<?php //echo "<pre>"; print_r($aside); echo "</pre>";
$sitename = "SMYO";
$slogan = "BILGISAYAR TEKNOLOJILERI";
$servername = "localhost";
$username = "gnu";
$password = "123456";
$database = "cms";
$conn = new mysqli($servername, $username, $password, $database);
mysqli_set_charset($conn, "utf8");
if ($conn->connect_error) die("Connection Failed: " . $conn->connect_error);

function model($model){
	include_once ("app/models/".$model["file"]);
}
function view($view){
	include_once ("app/views/head.php");
	include_once ("app/views/header.php");
	include_once ("app/views/nav.php");
	include_once ("app/views/".$view["file"]);
	include_once ("app/views/footer.php");
}
function controller($controller, $params=NULL){
	include_once ("app/controllers/".$controller["file"]);
	$controller["method"]($params);
}
function message($head=NULL, $body=NULL){
	view(array(
		"file"=>"message.php",
		"title"=>"Mesaj",
		"article_head"=>$head,
		"article"=>$body,
		"aside_head"=>"Hizli Baglantilar",
		"aside"=>"app/views/barpublic.php"));
}

session_start();
if(!empty($_GET["url"])){
	$url=$_GET["url"];
	if(!isset($_SESSION["user_role"])) $_SESSION["user_role"]="public";
	switch($_SESSION["user_role"]){
		case "admin":
			switch($url){
				##################################### ALTI YAPILACAKK
				case "contents/fetch/notices":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_user_contents_fetch"),
						array(
							"typ"=>"1",
							"status"=>"published",
							"article_head"=>"Kullanici Duyurulari",
							"aside"=>"app/views/baradmin.php",
							"edit_text"=>"open"));
				break;
				case "contents/show/requests":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_contents_show"),
						array(
							"typ"=>"2",
							"status"=>"published",
							"article_head"=>"Tum Odevler",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"open"));
				break;
				######################################## USTU YAPILACAK
				case "logout": session_destroy(); header("location: index.php"); break;
				case "profile": controller("profile.php", "c_admin_profile", NULL); break;
				case "changepassword": controller("changepassword.php", "c_admin_changepassword", NULL); break;
				case "admin": controller("adminpanel.php", "c_admin_panel", NULL); break;
				default: message("Biraz utanç verici, değil mi?", "Görünen o ki, aradığınız her ne ise bulamıyoruz. Belki elastik arama yapabilirsiniz.");
			}
		break;
		case "advisor":
			switch($url){
				case "user/logout":
					session_destroy(); header("location: index.php");
				break;
				case "user/profile":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_profile"),
						array(
							"aside"=>"app/views/baradvisor.php"));
				break;
				case "user/changepassword":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_changepassword"));
				break;
				case "user/update":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_update"),
						array(
							"aside"=>"app/views/baradvisor.php"));			
				break;
				case "user/panel":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_panel"),
						array(
							"aside"=>"app/views/baradvisor.php"));
				break;
				case "contents/show/notices":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_contents_show"),
						array(
							"typ"=>"1",
							"status"=>"published",
							"article_head"=>"Tum Duyurular",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"close"));
				break;
				case "usercontents/show/notices":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_user_contents_show"),
						array(
							"typ"=>"1",
							"status"=>"published",
							"article_head"=>"Tum Duyurularım",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"open"));
				break;
				case "usercontents/show/notices/unpublished":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_user_contents_show"),
						array(
							"typ"=>"1",
							"status"=>"unpublished",
							"article_head"=>"Tum Taslak Duyurularım",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"open"));
				break;
				case "contents/fetch/requests":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_user_contents_fetch"),
						array(
							"typ"=>"2",
							"status"=>"published",
							"article_head"=>"Kullanici Duyurulari",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"open"));
				break;
				case "usercontents/show/requests":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_user_contents_show"),
						array(
							"typ"=>"2",
							"status"=>"published",
							"article_head"=>"Tum Odevlerim",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"open"));
				break;
				case "usercontents/show/requests/unpublished":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_user_contents_show"),
						array(
							"typ"=>"2",
							"status"=>"unpublished",
							"article_head"=>"Tum Taslak Odevlerim",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"open"));
				break;
				############################################################### ALT YAPILACAK
				case "contents/show/slides":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_contents_show"),
						array(
							"typ"=>"3",
							"status"=>"published",
							"article_head"=>"Tum Slaytlar",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"close"));
				break;
				case "usercontents/show/slides":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_user_contents_show"),
						array(
							"typ"=>"3",
							"status"=>"published",
							"article_head"=>"Tum Slaytlarim",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"open"));
				break;
				case "usercontents/show/slides/unpublished":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_user_contents_show"),
						array(
							"typ"=>"3",
							"status"=>"unpublished",
							"article_head"=>"Tum Taslak Slaytlarim",
							"aside"=>"app/views/baradvisor.php",
							"edit_text"=>"open"));
				break;
				#################################################### ALTI YAPILACK
				case "content/show":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_content_show"),
						array(
							"typ"=>"1",
							"status"=>"published"));
				break;
				case "content/show":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_content_show"),
						array(
							"typ"=>"2",
							"status"=>"published"));
				break;
				case "content/show":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_content_show"),
						array(
							"typ"=>"3",
							"status"=>"published"));
				break;
				#############################################################################3
				case "content/new":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_content_new"));
				break;
				default:
					message("Biraz utanç verici, değil mi?", "Görünen o ki, aradığınız her ne ise bulamıyoruz. Belki elastik arama yapabilirsiniz.");
				break;
			}
		break;
		case "user":
			switch($url){
				case "user/logout":
					session_destroy(); header("location: index.php");
				break;
				case "user/profile":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_profile"),
						array(
							"aside"=>"app/views/baruser.php"));
				break;
				case "user/changepassword":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_changepassword"));
				break;
				case "user/profileupdate":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_profileupdate"),
						array(
							"aside"=>"app/views/baruser.php"));			
				break;
				case "user/panel":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_panel"),
						array(
							"aside"=>"app/views/baruser.php"));
				break;
				case "contents/show/requests":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_contents_show"),
						array(
							"typ"=>"2",
							"status"=>"published",
							"article_head"=>"Tum Odevler",
							"aside"=>"app/views/baruser.php",
							"edit_text"=>"close"));
				break;
				case "content/show":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_content_show"),
						array(
							"typ"=>"1",
							"status"=>"published"));
				break;
				case "content/show":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_content_show"),
						array(
							"typ"=>"2",
							"status"=>"published"));
				break;
				case "content/show":
					controller(array(
						"file"=>"content.php",
						"method"=>"c_content_show"),
						array(
							"typ"=>"3",
							"status"=>"published"));
				break;
				default:
					message("Biraz utanç verici, değil mi?", "Görünen o ki, aradığınız her ne ise bulamıyoruz. Belki elastik arama yapabilirsiniz.");
				break;
			}
			
		break;
		default:
			switch($url){
				case "user/login":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_login"));
				break;
				case "user/register":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_register"));
				break;
				case "user/lostpassword":
					controller(array(
						"file"=>"user.php",
						"method"=>"c_user_lostpassword"));
				break;
				default:
					message("Biraz utanç verici, değil mi?", "Görünen o ki, aradığınız her ne ise bulamıyoruz. Belki elastik arama yapabilirsiniz.");
				break;
			}
		break;
	}
} else controller(array(
	"file"=>"content.php",
	"method"=>"c_content_home"),
	array(
		"typ1"=>"1",
		"typ2"=>"2",
		"typ3"=>"3",
		"status"=>"published"));
