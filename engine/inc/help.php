<?PHP
/*
=====================================================
 DataLife Engine - by SoftNews Media Group 
-----------------------------------------------------
 http://dle-news.ru/
-----------------------------------------------------
 Copyright (c) 2004,2014 SoftNews Media Group
=====================================================
 Данный код защищен авторскими правами
=====================================================
 Файл: help.php
-----------------------------------------------------
 Назначение: помощь
=====================================================
*/
if(!defined('DATALIFEENGINE'))
{
  die("Hacking attempt!");
}

$help_sections = array();
$section = totranslit($_REQUEST['section']);

require_once (ROOT_DIR . '/language/' . $config['langs'] . '/help.lng');


if($section){

if(!isset($help_sections["$section"])){ die("Help section <b>$section</b> not found"); }

echo"<HTML>
	<meta content=\"text/html; charset={$config['charset']}\" http-equiv=\"content-type\" />
    <style type=\"text/css\">
	<!--
	a:active,a:visited,a:link {color: #446488; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt;}
	a:hover {color: #00004F; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; }
	.code {
		font-family : Verdana, Courier;
		font-size : 11px;
		border: 1px solid #BBCDDB;
		margin:10px;
		padding:4px;
		background:#FBFFFF;
	}
    h1 {
		background-color : #C4BFB9;
		border : #000000 1px solid;

		color : #6B6256;
		font-family : Tahoma, Verdana, Arial, Helvetica, sans-serif;
		font-size : 11px;
		font-weight : bold;
		padding:4px;
		text-decoration : none;
	}
	BODY, TD, TR {text-align:justify ;padding: 0; leftMargin: 0; topMargin: 0; text-decoration: none; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; cursor: default;}
	-->
	</style>
<title>{$lang['skin_title']}</title>
<body><div style=\"padding-right:5px\">". $help_sections["$section"] ."</div></body></html>";
}
else{

if($member_id['user_group'] > 1){ msg("error", $lang['index_denied'], $lang['index_denied']); }

echoheader("", "");
echo"<style type=\"text/css\">
	<!--
	.code {
		font-family : Verdana, Courier;
		font-size : 11px;
		border: 1px solid #BBCDDB;
		margin:10px;
		padding:4px;
		background:#FBFFFF;
	}
	-->
	</style>";


echo <<<HTML
<div class="box">
  <div class="box-header">
    <div class="title">Help</div>
  </div>
  <div class="box-content">

	<div class="row box-section">
	
HTML;

foreach($help_sections as $help_section){
echo "$help_section<br /><br />";
}

echo <<<HTML
	</div>
	
   </div>
</div>
HTML;
echofooter();
}
?>