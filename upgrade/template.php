<?php

if( ! defined( 'DATALIFEENGINE' ) ) {
	die( "Hacking attempt!" );
}


$skin_header = <<<HTML
<!doctype html>
<html>
<head>
  <meta charset="{$config['charset']}">
  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <title>DataLife Engine - Обновление</title>
  <link href="../engine/skins/stylesheets/application.css" media="screen" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="../engine/skins/javascripts/application.js"></script>
</head>
<body>
<script language="javascript" type="text/javascript">
<!--
var dle_act_lang   = ["Да", "Нет", "Ввод", "Отмена", "Загрузка изображений и файлов на сервер"];
var cal_language   = {en:{months:['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],dayOfWeek:["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"]}};
//-->
</script>
<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <a class="navbar-brand" href=""><img src="../engine/skins/images/logo.png" />Мастер обновления</a>
  </div>
</nav>
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="padded">
	    <div style="margin-top: 80px;">
<!--MAIN area-->
HTML;

// ********************************************************************************
// Skin FOOTER
// ********************************************************************************
$skin_footer = <<<HTML
	 <!--MAIN area-->
    </div>
  </div>
</div>
</div>

</body>
</html>
HTML;

function msgbox($type, $title, $text, $back=FALSE){
global $lang, $skin_header, $skin_footer;

$_SESSION['dle_update']=intval($_SESSION['dle_update'])+1;

  echo $skin_header;

echo <<<HTML
<form action="index.php" method="get">
<div class="box">
  <div class="box-header">
    <div class="title">{$title}</div>
  </div>
  <div class="box-content">
	<div class="row box-section">
		{$text}
	</div>
	<div class="row box-section">	
		<input class="btn btn-green" type=submit value="Продолжить">
	</div>
	
  </div>
</div>
<input type="hidden" name="next" value="{$_SESSION['dle_update']}">
</form>
HTML;

  echo $skin_footer;

  exit();
}

$login_panel = <<<HTML
<!doctype html>
<html>
<head>
<title>DataLife Engine</title>
<meta content="text/html; charset={$config['charset']}" http-equiv="content-type" />
<link rel="stylesheet" type="text/css" href="../engine/skins/stylesheets/application.css">
<style type="text/css">
html,body{
	width:100%;
	margin:0px;
	padding: 0px;
	background: #F4F3EE;
	font-size: 11px;
	font-family: verdana;
}

#login-box {
	width:447px;
	height:310px;
	margin:10% auto 0 auto;
	background:#FFFFFF;
}

form {
	margin:0px;
	padding: 0px;
}

input,
button {
	color: #000000;
	outline:none;
}

input[type="text"],
input[type="password"],
select {
	width:340px;
	background-color: #FFFFFF;
	color: #000000;
	font-size: 18px;
	font-family: verdana;
	font-weight: bold;
	border: none;
	margin-top: 20px;
	margin-left: 60px;
}
input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus {
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    border: 0px solid #68A6CE !important; 
}
input[type="checkbox"] {
	padding:0px;
	margin-top: 25px;
}

.error {
	padding-top: 75px;
	padding-left: 27px;
}
.info {
	padding-top: 20px;
}
</style>
</head>
<body>
<form  name="login" action="" method="post"><input type="hidden" name="action" value="dologin">
<div id="login-box">
	<div style="width:447px;height:95px;background: url({$theme}/skins/images/loginheader2.png);"><div class="error">{result}</div></div>
	<div style="width:447px;height:66px;background: url({$theme}/skins/images/loginbox1.png);"><input type="text" name="username"></div>
	<div style="width:447px;height:67px;background: url({$theme}/skins/images/loginbox3.png);"><input type="password" name="password"></div>
	<div style="width:37px;height:82px;float:left;background: url({$theme}/skins/images/loginbox6.png);"></div>
	<div style="width:283px;height:82px;float:left;background: url({$theme}/skins/images/loginbox7.png);"><div class="info">Для обновления скрипта, вам необходимо ввести логин и пароль.</div></div>
	<div style="width:102px;height:82px;float:left;"><input type="image" src="{$theme}/skins/images/loginbox8.png"></div>
	<div style="width:25px;height:82px;float:right;background: url({$theme}/skins/images/loginbox5.png);"></div>
</div></form>
</body>
</html>
HTML;

$is_logged = false;
$result="";

if ($_SESSION['member_name'] != "") {

	$member_name = $db->safesql($_SESSION['member_name']);
	$password = $db->safesql($_SESSION['member_password']);

	if (version_compare($version_id, '4.2', ">")) $password = md5($_SESSION['member_password']);

	if (!defined('USERPREFIX')) {
		define('USERPREFIX', PREFIX);
	}

	$db->query("SELECT * FROM " . USERPREFIX . "_users WHERE name='$member_name' AND password='$password' AND user_group = '1'");

	if ($db->num_rows() > 0){
		$member_id = $db->get_row();
		$is_logged = TRUE;
	}

	$db->free();
}

if ($_POST['action'] == "dologin")
{

	$login_name = $db->safesql($_POST['username']);
	
	$login_password = md5($_POST['password']);

	if (version_compare($version_id, '4.2', ">")) $pass = md5($login_password); else $pass = $login_password;

	if (!defined('USERPREFIX')) {
		define('USERPREFIX', PREFIX);
	}

	$db->query("SELECT * FROM " . USERPREFIX . "_users where name='$login_name' and password='$pass' and user_group = '1'");

	if ($db->num_rows() > 0){
	
			$member_id = $db->get_row();
	
	        $_SESSION['member_name']        = $member_id['name'];
	        $_SESSION['member_password']    = $login_password;
	
	        $is_logged = TRUE;
	} else $result="<font color=red>Неверно введены даннные для входа!</font>";

	$db->free();
}

if(!$is_logged) {
	$login_panel = str_replace("{result}", $result, $login_panel);
	echo $login_panel;
	exit();
}


if(!is_writable(ENGINE_DIR.'/data/config.php')){
	msgbox("info","Информация", "Установите права для записи на файл 'engine/data/config.php' CHMOD 666");
}

if(!is_writable(ENGINE_DIR.'/data/dbconfig.php')){
	msgbox("info","Информация", "Установите права для записи на файл 'engine/data/dbconfig.php' CHMOD 666");
}

if(!is_writable(ENGINE_DIR.'/data/xfields.txt')){
	msgbox("info","Информация", "Установите права для записи на файл 'engine/data/xfields.txt' CHMOD 666");
}

if( !$_SESSION['dle_update'] ) {

  echo $skin_header;
  
echo <<<HTML
<form action="index.php" method="GET">
<input type="hidden" name="next" value="start">
<div class="box">
  <div class="box-header">
    <div class="title">Информация</div>
  </div>
  <div class="box-content">
	<div class="row box-section">
		<font color="red"><b>Внимание:</b></font> Прежде чем приступить к процедуре обновления скрипта и базы данных, убедитесь что вы создали и сохранили у себя полные бекапы файлов скрипта и базы данных. Процедура обновления вносит необратимые изменения в структуру базы данных, отмена которых в будущем будет невозможна, вернуть в предыдущее состояние базу данных, можно будет только путем восстановления бекапов базы данных. Также во время процедуры обновления скрипт выполняет тяжелые запросы к базе данных, выполнение которых может потребовать продолжительное время, поэтому обновление рекомендуется проводить во время минимальной нагрузки на сервер. Для больших сайтов, имеющие большое количество публикаций, рекомендуется предварительно проводить обновление на локальном компьютере.
	</div>
	<div class="row box-section">
		Текущая версия скрипта: <b>{$version_id}</b>, обновление будет пошагово произведено до версии: <b>{$dle_version}</b>
	</div>
	<div class="row box-section">	
		<input class="btn btn-green" type=submit value="Продолжить">
	</div>
	
  </div>
</div>
</form>
HTML;

	echo $skin_footer;
	
	$_SESSION['dle_update'] =1;
	exit();
}
?>