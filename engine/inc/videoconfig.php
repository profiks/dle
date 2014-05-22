<?PHP
/*
=====================================================
 DataLife Engine - by SoftNews Media Group 
-----------------------------------------------------
 http://dle-news.ru/
-----------------------------------------------------
 Copyright (c) 2004,2014 SoftNews Media Group
=====================================================
 ������ ��� ������� ���������� �������
=====================================================
 ����: videoconfig.php
-----------------------------------------------------
 ����������: ��������� ������������
=====================================================
*/
if( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' ) ) {
	die( "Hacking attempt!" );
}

if( $member_id['user_group'] != 1 ) {
	msg( "error", $lang['index_denied'], $lang['index_denied'] );
}

require_once (ENGINE_DIR . '/data/videoconfig.php');



if( $action == "save" ) {

	if( $member_id['user_group'] != 1 ) {
		msg( "error", $lang['opt_denied'], $lang['opt_denied'] );
	}

	if( $_REQUEST['user_hash'] == "" or $_REQUEST['user_hash'] != $dle_login_hash ) {
		
		die( "Hacking attempt! User not found" );
	
	}

	$db->query( "INSERT INTO " . USERPREFIX . "_admin_logs (name, date, ip, action, extras) values ('".$db->safesql($member_id['name'])."', '{$_TIME}', '{$_IP}', '78', '')" );
	
	$save_con = $_POST['save_con'];
	$save_con['play'] = intval($save_con['play']);
	$save_con['flv_watermark'] = intval($save_con['flv_watermark']);
	$save_con['tube_related'] = intval($save_con['tube_related']);
	$save_con['tube_dle'] = intval($save_con['tube_dle']);
	$save_con['use_html5'] = intval($save_con['use_html5']);
	$save_con['startframe'] = intval($save_con['startframe']);
	$save_con['preview'] = intval($save_con['preview']);
	$save_con['autohide'] = intval($save_con['autohide']);
	
	$find = array();
	$replace = array();
	
	$find[] = "'\r'";
	$replace[] = "";
	$find[] = "'\n'";
	$replace[] = "";
	
	$save_con = $save_con + $video_config;
	
	$handler = fopen( ENGINE_DIR . '/data/videoconfig.php', "w" );
	
	fwrite( $handler, "<?PHP \n\n//Videoplayers Configurations\n\n\$video_config = array (\n\n" );
	foreach ( $save_con as $name => $value ) {
		
		$value = trim(strip_tags(stripslashes( $value )));
		$value = htmlspecialchars( $value, ENT_QUOTES, $config['charset']);
		$value = preg_replace( $find, $replace, $value );
			
		$name = trim(strip_tags(stripslashes( $name )));
		$name = htmlspecialchars( $name, ENT_QUOTES, $config['charset'] );
		$name = preg_replace( $find, $replace, $name );
		
		$value = str_replace( "$", "&#036;", $value );
		$value = str_replace( "{", "&#123;", $value );
		$value = str_replace( "}", "&#125;", $value );
		$value = str_replace( ".", "", $value );
		$value = str_replace( '/', "", $value );
		$value = str_replace( chr(92), "", $value );
		$value = str_replace( chr(0), "", $value );
		$value = str_replace( '(', "", $value );
		$value = str_replace( ')', "", $value );
		$value = str_ireplace( "base64_decode", "base64_dec&#111;de", $value );
		
		$name = str_replace( "$", "&#036;", $name );
		$name = str_replace( "{", "&#123;", $name );
		$name = str_replace( "}", "&#125;", $name );
		$name = str_replace( ".", "", $name );
		$name = str_replace( '/', "", $name );
		$name = str_replace( chr(92), "", $name );
		$name = str_replace( chr(0), "", $name );
		$name = str_replace( '(', "", $name );
		$name = str_replace( ')', "", $name );
		$name = str_ireplace( "base64_decode", "base64_dec&#111;de", $name );
		
		fwrite( $handler, "'{$name}' => '{$value}',\n\n" );
	
	}
	fwrite( $handler, ");\n\n?>" );
	fclose( $handler );
	
	clear_cache();
	msg( "info", $lang['opt_sysok'], $lang['opt_sysok_1'], "$PHP_SELF?mod=videoconfig" );
}



	echoheader( "<i class=\"icon-play\"></i>".$lang['header_me_1'], $lang['opt_vconf'] );

function showRow($title = "", $description = "", $field = "") {
	echo "<tr>
       <td class=\"col-xs-10 col-sm-6 col-md-7\"><h6>{$title}</h6><span class=\"note large\">{$description}</span></td>
       <td class=\"col-xs-2 col-md-5 settingstd\">{$field}</td>
       </tr>";
}
	
function makeDropDown($options, $name, $selected) {
	$output = "<select class=\"uniform\" style=\"min-width:100px;\" name=\"$name\">\r\n";
	foreach ( $options as $value => $description ) {
		$output .= "<option value=\"$value\"";
		if( $selected == $value ) {
			$output .= " selected ";
		}
		$output .= ">$description</option>\n";
	}
	$output .= "</select>";
	return $output;
}

function makeCheckBox($name, $selected) {
	$selected = $selected ? "checked" : "";
	
	return "<input class=\"iButton-icons-tab\" type=\"checkbox\" name=\"$name\" value=\"1\" {$selected}>";
}


echo <<<HTML
<form action="$PHP_SELF?mod=videoconfig&action=save" name="conf" id="conf" method="post">
<div class="box">
  <div class="box-header">
    <div class="title">{$lang['vconf_title']}</div>
  </div>
  <div class="box-content">
  <table class="table table-normal">
HTML;

	showRow( $lang['vconf_widht'], $lang['vconf_widhtd'], "<input type=text style=\"text-align: center;\" name=\"save_con[width]\" value=\"{$video_config['width']}\" size=20>" );
	showRow( $lang['vconf_height'], $lang['vconf_heightd'], "<input type=text style=\"text-align: center;\" name=\"save_con[height]\" value=\"{$video_config['height']}\" size=20>" );
	showRow( $lang['vconf_awidht'], $lang['vconf_awidhtd'], "<input type=text style=\"text-align: center;\" name=\"save_con[audio_width]\" value=\"{$video_config['audio_width']}\" size=20>" );

	showRow( $lang['vconf_play'], $lang['vconf_playd'], makeCheckBox( "save_con[play]", "{$video_config['play']}" ) );
	showRow( $lang['opt_sys_flvw'], $lang['opt_sys_flvwd'], makeCheckBox( "save_con[flv_watermark]", "{$video_config['flv_watermark']}" ) );
	showRow( $lang['vconf_flvpos'], $lang['vconf_flvposd'], makeDropDown( array ("left" => $lang['opt_sys_left'], "center" => $lang['opt_sys_center'], "right" => $lang['opt_sys_right'] ), "save_con[flv_watermark_pos]", "{$video_config['flv_watermark_pos']}" ) );
	showRow( $lang['vconf_flval'], $lang['vconf_flvald'], "<input type=text style=\"text-align: center;\" name=\"save_con[flv_watermark_al]\" value=\"{$video_config['flv_watermark_al']}\" size=20>" );

	showRow( $lang['opt_sys_turel'], $lang['opt_sys_tureld'], makeCheckBox( "save_con[tube_related]", "{$video_config['tube_related']}" ) );
	showRow( $lang['opt_sys_tudle'], $lang['opt_sys_tudled'], makeCheckBox( "save_con[tube_dle]", "{$video_config['tube_dle']}" ) );
	showRow( $lang['opt_sys_html5'], $lang['opt_sys_html5d'], makeCheckBox( "save_con[use_html5]", "{$video_config['use_html5']}" ) );


echo <<<HTML
</table></div></div>
<form action="$PHP_SELF?mod=videoconfig&action=save" name="conf" id="conf" method="post">
<div class="box">
  <div class="box-header">
    <div class="title">{$lang['vconf_flv_title']}</div>
  </div>
  <div class="box-content">
  <table class="table table-normal">
HTML;
	showRow( $lang['vconf_youtube_q'], $lang['vconf_youtube_qd'], makeDropDown( array ("default" => $lang['vconf_youtube_d'], "small" => $lang['vconf_youtube_s'], "medium" => $lang['vconf_youtube_m'], "large" => $lang['vconf_youtube_l'], "hd720" => "HD 720p" ), "save_con[youtube_q]", "{$video_config['youtube_q']}" ) );

	showRow( $lang['vconf_startframe'], $lang['vconf_startframed'], makeCheckBox( "save_con[startframe]", "{$video_config['startframe']}" ) );
	showRow( $lang['vconf_preview'], $lang['vconf_previewd'], makeCheckBox( "save_con[preview]", "{$video_config['preview']}" ) );
	showRow( $lang['vconf_autohide'], $lang['vconf_autohided'], makeCheckBox( "save_con[autohide]", "{$video_config['autohide']}" ) );
	showRow( $lang['opt_sys_fsv'], $lang['opt_sys_fsvd'], makeDropDown( array ("1" => $lang['opt_sys_fsv_1'], "2" => $lang['opt_sys_fsv_2'], "3" => $lang['opt_sys_fsv_3'] ), "save_con[fullsizeview]", "{$video_config['fullsizeview']}" ) );
	showRow( $lang['vconf_buffer'], $lang['vconf_bufferd'], "<input type=text style=\"text-align: center;\" name=\"save_con[buffer]\" value=\"{$video_config['buffer']}\" size=20>" );

	showRow( $lang['vconf_prbarbolor'], $lang['vconf_prbarbolord'], "<input type=text style=\"text-align: center;\" name=\"save_con[progressBarColor]\" value=\"{$video_config['progressBarColor']}\" size=20>" );

echo <<<HTML
</table></div></div>
<div style="margin-bottom:30px;">
<input type="hidden" name="user_hash" value="{$dle_login_hash}" />
<input type="submit" class="btn btn-green" value="{$lang['user_save']}">
</div>

</form>
HTML;

	if(!is_writable(ENGINE_DIR . '/data/videoconfig.php')) {

		$lang['stat_system'] = str_replace ("{file}", "engine/data/videoconfig.php", $lang['stat_system']);

		$fail = "<div class=\"alert alert-error\">{$lang['stat_system']}</div>";

	} else $fail = "";

echofooter();
?>