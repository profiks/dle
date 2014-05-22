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
 Файл: default.skin.php
-----------------------------------------------------
 Назначение: макет админпанели
=====================================================
*/

if ($is_loged_in) {

	if ( count(explode("@", $member_id['foto'])) == 2 ) {
		$avatar = 'http://www.gravatar.com/avatar/' . md5(trim($member_id['foto'])) . '?s=' . intval($user_group[$member_id['user_group']]['max_foto']);			
	} else {
		if( $member_id['foto'] and (file_exists( ROOT_DIR . "/uploads/fotos/" . $member_id['foto'] )) ) $avatar = $config['http_home_url'] . "uploads/fotos/" . $member_id['foto'];
		else $avatar = "engine/skins/images/noavatar.png";
	}
	if ( $member_id['pm_unread'] ) {
		$pop_notice = "<span class=\"badge badge-dark-red\">{$member_id['pm_unread']}</span>";
	} else $pop_notice = "";

	if ( $member_id['pm_all'] ) {
		$message_notice = "<span class=\"label label-dark-red pull-right\">{$member_id['pm_all']}</span>";
	} else $message_notice = "";
	
	$profile_link = $config['http_home_url'] . "user/" . urlencode ( $member_id['name'] ) . "/";
	
	$options = array ();
	
	$options['config'] = array (
								
								array (
											'name' => $lang['opt_all'], 
											'url' => "$PHP_SELF?mod=options&action=syscon", 
											'mod' => "options", 
											'access' => "admin" 
								), 
								
								array (
											'name' => $lang['opt_cat'], 
											'url' => "$PHP_SELF?mod=categories", 
											'mod' => "categories", 
											'access' => $user_group[$member_id['user_group']]['admin_categories'] 
								), 
								
								array (
											'name' => $lang['opt_db'], 
											'url' => "$PHP_SELF?mod=dboption", 
											'mod' => "dboption", 
											'access' => "admin" 
								), 

								array (
											'name' => $lang['opt_vconf'], 
											'url' => "$PHP_SELF?mod=videoconfig", 
											'mod' => "videoconfig", 
											'access' => "admin" 
								),
								
								array (
											'name' => $lang['opt_xfil'], 
											'url' => "$PHP_SELF?mod=xfields&xfieldsaction=configure", 
											'mod' => "xfields", 
											'access' => $user_group[$member_id['user_group']]['admin_xfields'] 
								),

								array (
											'name' => $lang['opt_question'], 
											'url' => "$PHP_SELF?mod=question", 
											'mod' => "question", 
											'access' => "admin" 
								)
	);
	
	$options['user'] = array (
							
							array (
										'name' => $lang['opt_user'], 
										'url' => "$PHP_SELF?mod=editusers&action=list", 
										'mod' => "editusers", 
										'access' => $user_group[$member_id['user_group']]['admin_editusers'] 
							), 
							
							array (
										'name' => $lang['opt_xprof'], 
										'url' => "$PHP_SELF?mod=userfields&xfieldsaction=configure", 
										'mod' => "userfields", 
										'access' => $user_group[$member_id['user_group']]['admin_userfields'] 
							), 
							
							array (
										'name' => $lang['opt_group'], 
										'url' => "$PHP_SELF?mod=usergroup", 
										'mod' => "usergroup", 
										'access' => "admin" 
							) 
	);
	
	$options['templates'] = array (
									
									array (
											'name' => $lang['opt_t'], 
											'url' => "$PHP_SELF?mod=templates&user_hash=" . $dle_login_hash, 
											'mod' => "templates", 
											'access' => "admin" 
									), 
									
									array (
											'name' => $lang['opt_email'], 
											'url' => "$PHP_SELF?mod=email", 
											'mod' => "email", 
											'access' => "admin" 
									) 
	);

	
	
	$options['filter'] = array (
								
								array (
											'name' => $lang['opt_fil'], 
											'url' => "$PHP_SELF?mod=wordfilter", 
											'mod' => "wordfilter", 
											'access' => $user_group[$member_id['user_group']]['admin_wordfilter'] 
								), 
								
								array (
											'name' => $lang['opt_ipban'], 
											'url' => "$PHP_SELF?mod=blockip", 
											'mod' => "blockip", 
											'access' => $user_group[$member_id['user_group']]['admin_blockip'] 
								), 
								
								array (
											'name' => $lang['opt_iptools'], 
											'url' => "$PHP_SELF?mod=iptools", 
											'mod' => "iptools", 
											'access' => $user_group[$member_id['user_group']]['admin_iptools'] 
								), 
								array (
											'name' => $lang['opt_sfind'], 
											'url' => "$PHP_SELF?mod=search", 
											'mod' => "search", 
											'access' => "admin" 
								),
								array (
											'name' => $lang['opt_srebuild'], 
											'url' => "$PHP_SELF?mod=rebuild", 
											'mod' => "rebuild", 
											'access' => "admin" 
								),
								array (
											'name' => $lang['opt_complaint'], 
											'url' => "$PHP_SELF?mod=complaint", 
											'mod' => "complaint",  
											'access' => $user_group[$member_id['user_group']]['admin_complaint'] 
								),
								array (
											'name' => $lang['opt_check'], 
											'url' => "$PHP_SELF?mod=check", 
											'mod' => "check",
											'access' => "admin" 
								),
								array (
											'name' => $lang['opt_links'], 
											'url' => "$PHP_SELF?mod=links", 
											'mod' => "links",
											'access' => "admin" 
								)
	);

	
	
	$options['others'] = array (
								array (
											'name' => $lang['opt_rules'], 
											'url' => "$PHP_SELF?mod=static&action=doedit&page=rules", 
											'mod' => "rules",
											'access' => $user_group[$member_id['user_group']]['admin_static'] 
								), 
								
								array (
											'name' => $lang['opt_static'], 
											'url' => "$PHP_SELF?mod=static", 
											'mod' => "static",
											'access' => $user_group[$member_id['user_group']]['admin_static'] 
								), 
								
								array (
											'name' => $lang['opt_clean'], 
											'url' => "$PHP_SELF?mod=clean", 
											'mod' => "clean",
											'access' => "admin" 
								), 								
								
								array (
											'name' => $lang['main_newsl'], 
											'url' => "$PHP_SELF?mod=newsletter", 
											'mod' => "newsletter",
											'access' => $user_group[$member_id['user_group']]['admin_newsletter'] 
								), 
								array (
											'name' => $lang['opt_vote'], 
											'url' => "$PHP_SELF?mod=editvote", 
											'mod' => "editvote",
											'access' => $user_group[$member_id['user_group']]['admin_editvote'] 
								), 
								
								array (
											'name' => $lang['opt_img'], 
											'url' => "$PHP_SELF?mod=files", 
											'mod' => "files",
											'access' => "admin" 
								), 
								
								array (
											'name' => $lang['opt_banner'], 
											'url' => "$PHP_SELF?mod=banners&action=list", 
											'mod' => "banners",
											'access' => $user_group[$member_id['user_group']]['admin_banners'] 
								), 
								array (
											'name' => $lang['opt_google'], 
											'url' => "$PHP_SELF?mod=googlemap", 
											'mod' => "googlemap",
											'access' => $user_group[$member_id['user_group']]['admin_googlemap'] 
								),
								array (
											'name' => $lang['opt_rss'], 
											'url' => "$PHP_SELF?mod=rss", 
											'mod' => "rss",
											'access' => $user_group[$member_id['user_group']]['admin_rss'] 
								), 
								array (
											'name' => $lang['opt_rssinform'], 
											'url' => "$PHP_SELF?mod=rssinform", 
											'mod' => "rssinform",
											'access' => $user_group[$member_id['user_group']]['admin_rssinform'] 
								),
								array (
											'name' => $lang['opt_tagscloud'], 
											'url' => "$PHP_SELF?mod=tagscloud", 
											'mod' => "tagscloud",
											'access' => $user_group[$member_id['user_group']]['admin_tagscloud'] 
								),

								array (
											'name' => $lang['opt_logs'], 
											'url' => "$PHP_SELF?mod=logs", 
											'mod' => "logs",
											'access' => "admin" 
								),
	);

	foreach ( $options as $sub_options => $value ) {
		$count_options = count( $value );
		
		for($i = 0; $i < $count_options; $i ++) {

			if ($member_id['user_group'] == 1 ) continue;

			if ($member_id['user_group'] != 1 AND  $value[$i]['access'] == "admin") unset( $options[$sub_options][$i] );

			if ( !$value[$i]['access'] ) unset( $options[$sub_options][$i] );
		}
	}
	
	$subs = 0;
	$sidebar= "";
	$menu_item = array();
		
	foreach ( $options as $sub_options ) {
	
		$menu_item_header = $lang['opt_hopt'];
		$icon= "wrench";
		if( $subs == 1 ) { $menu_item_header = $lang['opt_s_acc']; $icon= "user";}
		if( $subs == 2 ) { $menu_item_header = $lang['opt_s_tem']; $icon= "laptop";}
		if( $subs == 3 ) { $menu_item_header = $lang['opt_s_fil']; $icon= "leaf";}
		if( $subs == 4 ) { $menu_item_header = $lang['opt_s_oth']; $icon= "link";}
		
		$subs ++;
		
		if( !count( $sub_options ) ) continue;
		
		$submenu_item = array();
		$active_menu = "";
		$collapsed = "";
		foreach ( $sub_options as $option ) {
		
			if ($mod == $option['mod']) {
				$active_submenu = "active";
				$active_menu = " active";
				$collapsed = " in";
			} else $active_submenu = "";
		
			if ($mod == "options" AND $action != "syscon") {
				$active_submenu = "";
				$active_menu = "";
				$collapsed = "";
			}
			if ($mod == "static" AND $_GET['page'] == "rules") {
				$active_submenu = "";
				$active_menu = "";
				$collapsed = "";
			}			
			$submenu_item[] = "<li class=\"{$active_submenu}\"><a href=\"{$option['url']}\">{$option['name']}</a></li>";
		}
		
		$submenu_item = implode("", $submenu_item);
	
		$menu_item[] = "<li class=\"dark-nav{$active_menu}\"><span class=\"glow\"></span><a class=\"accordion-toggle\" data-toggle=\"collapse\" href=\"#submenu{$subs}\"><i class=\"icon-{$icon} icon-2x\"></i><span>{$menu_item_header} <i class=\"icon-caret-down\"></i></span></a><ul id=\"submenu{$subs}\" class=\"collapse{$collapsed}\">".$submenu_item."</ul></li>";	
	}
	
	if( count( $menu_item ) ) $sidebar= "<ul class=\"nav navbar-collapse collapse navbar-collapse-primary\"><li><span class=\"glow\"></span><a href=\"?mod=options&action=options\"><i class=\"icon-globe icon-2x\"></i><span>{$lang['header_all']}</span></a></li>".implode("", $menu_item)."</ul>";
	
} else $sidebar= "";

$skin_header = <<<HTML
<!doctype html>
<html>
<head>
  <meta charset="{$config['charset']}">
  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <title>DataLife Engine - {$lang['skin_title']}</title>
  <link href="engine/skins/stylesheets/application.css" media="screen" rel="stylesheet" type="text/css" />
  {js_files}
</head>
<body>
<script language="javascript" type="text/javascript">
<!--
var dle_act_lang   = ["{$lang['p_yes']}", "{$lang['p_no']}", "{$lang['p_enter']}", "{$lang['p_cancel']}", "{$lang['media_upload']}"];
var cal_language   = {en:{months:['{$lang['January']}','{$lang['February']}','{$lang['March']}','{$lang['April']}','{$lang['May']}','{$lang['June']}','{$lang['July']}','{$lang['August']}','{$lang['September']}','{$lang['October']}','{$lang['November']}','{$lang['December']}'],dayOfWeek:["{$langdate['Sun']}", "{$langdate['Mon']}", "{$langdate['Tue']}", "{$langdate['Wed']}", "{$langdate['Thu']}", "{$langdate['Fri']}", "{$langdate['Sat']}"]}};
//-->
</script>
<div id="loading-layer">{$lang['ajax_info']}</div>
<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
  <div class="navbar-header">
    <a class="navbar-brand" href="{$PHP_SELF}"><img src="engine/skins/images/logo.png" /></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-primary">
          <span class="sr-only">Side Navigation</span>
          <i class="icon-th-list"></i>
        </button>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
          <span class="sr-only">Top Navigation</span>
          <i class="icon-align-justify"></i>
        </button>	
  </div>
      <div class="collapse navbar-collapse navbar-collapse-top">
        <div class="navbar-right">

          <ul class="nav navbar-nav navbar-left">
            <li class="cdrop"><a href="{$config['http_home_url']}" target="_blank">{$lang['skin_view']}</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle dropdown-avatar" data-toggle="dropdown">
              <span>
                <img class="menu-avatar" src="{$avatar}" /> <span>{$member_id['name']} <i class="icon-caret-down"></i></span>
                {$pop_notice}
              </span>
              </a>
              <ul class="dropdown-menu">
                <li class="with-image">
                  <div class="avatar">
                    <img src="{$avatar}" />
                  </div>
                  <span>{$member_id['name']}<br />({$user_group[$member_id['user_group']]['group_name']})</span>
                </li>
                <li class="divider"></li>
                <li><a href="{$profile_link}" target="_blank"><i class="icon-user"></i> <span>{$lang['header_profile']}</span></a></li>
                <li><a href="{$PHP_SELF}?mod=options&action=personal"><i class="icon-cog"></i> <span>{$lang['header_settings']}</span></a></li>
                <li><a href="{$config['http_home_url']}index.php?do=pm" target="_blank"><i class="icon-envelope"></i> <span>{$lang['header_messages']}</span> {$message_notice}</a></li>
                <li><a href="$PHP_SELF?action=logout"><i class="icon-off"></i> <span>{$lang['skin_logout']}</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
</nav>
<div class="sidebar-background">
  <div class="primary-sidebar-background"></div>
</div>
<div class="primary-sidebar">
{$sidebar}
</div>
<div class="main-content">
  <div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            {$header_title}
          </h3>
          <h5>
            <span>
              {$header_subtitle}
            </span>
          </h5>
        </div>
        <div class="pull-right padding-right newsbutton">
			<div class="action-nav-normal action-nav-line" style="display: inline-block;">
				<div class="action-nav-button nav-small" style="width:180px;">
				  <a href="{$PHP_SELF}?mod=addnews&amp;action=addnews" class="tip" title="{$lang['add_news']}">
					<i class="icon-file-alt"></i>
					<span>{$lang['add_news']}</span>
				  </a>
				  <span class="triangle-button red"><i class="icon-plus"></i></span>
				</div>
			</div>
			<div class="action-nav-normal action-nav-line" style="display: inline-block;">
				<div class="action-nav-button nav-small" style="width:180px;">
				  <a href="{$PHP_SELF}?mod=editnews&amp;action=list" class="tip" title="{$lang['edit_news']}">
					<i class="icon-edit"></i>
					<span>{$lang['edit_news']}</span>
				  </a>
				  <span class="triangle-button blue"><i class="icon-pencil"></i></span>
				</div>
			</div>
</div>
      </div>
    </div>
  </div>
  <div class="container padded-right">
	<!-- maincontent beginn -->
HTML;

$skin_footer = <<<HTML
<!-- maincontent end -->
</div>

</body>
</html>
HTML;

$skin_login = <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DataLife Engine - $lang[skin_title]</title>
<meta content="text/html; charset={$config['charset']}" http-equiv="content-type" />
<link rel="stylesheet" type="text/css" href="engine/skins/stylesheets/application.css">
<style type="text/css">
html,body{
	width:100%;
	margin:0px;
	padding: 0px;
	background: #F4F3EE;
}

#login-box {
	width:447px;
	height:377px;
	margin:10% auto 0 auto;
	background:#FFFFFF;
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
</style>
</head>
<body>
<form  name="login" action="" method="post"><input type="hidden" name="subaction" value="dologin">
<div id="login-box">
	<div style="width:447px;height:95px;background: url(engine/skins/images/loginheader.png);"><a href="http://dle-news.ru/" style="display:block; float:right;width:90px;height:90px;" target="_blank"></a><div class="error">{result}</div></div>
	<div style="width:447px;height:66px;background: url(engine/skins/images/{mauth}.png);"><input type="text" name="username"></div>
	<div style="width:447px;height:67px;background: url(engine/skins/images/loginbox3.png);"><input type="password" name="password"></div>
	<div style="width:447px;height:67px;background: url(engine/skins/images/loginbox4.png);">{select}</div>
	<div style="width:37px;height:82px;float:left;background: url(engine/skins/images/loginbox6.png);"></div>
	<div style="width:283px;height:82px;float:left;background: url(engine/skins/images/loginbox7.png);"><input type="checkbox" name="login_not_save" id="login_not_save" value="1"/><label for="login_not_save">&nbsp;{$lang['m_not_save']}</label></div>
	<div style="width:102px;height:82px;float:left;"><input type="image" src="engine/skins/images/loginbox8.png"></div>
	<div style="width:25px;height:82px;float:right;background: url(engine/skins/images/loginbox5.png);"></div>
</div></form>
</body>
</html>
HTML;

?>