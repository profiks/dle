<?php
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
 Файл: preview.php
-----------------------------------------------------
 Назначение: Предосмотр новостей в админпанели
=====================================================
*/

if( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' ) ) {
	die( "Hacking attempt!" );
}

require_once ROOT_DIR.'/engine/classes/templates.class.php';

$tpl = new dle_template;
$tpl->allow_php_include = false;
$dle_module = "main";

 if ($_POST['preview_mode'] == "static" AND $_POST['skin_name'])
 {

	$_POST['skin_name']  = trim( totranslit($_POST['skin_name'], false, false) );

	if ($_POST['skin_name'] != '' AND @is_dir(ROOT_DIR.'/templates/'.$_POST['skin_name']))
		{
			$config['skin'] = $_POST['skin_name'];
		}

 }

$tpl->dir = ROOT_DIR.'/templates/'.$config['skin'];
$css = file_get_contents( $tpl->dir."/".'preview.css' );


echo <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset={$config['charset']}" http-equiv=Content-Type>
<style type="text/css">
{$css}
</style>
<link media="screen" href="{$config['http_home_url']}engine/editor/css/default.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{$config['http_home_url']}engine/editor/scripts/common/jquery-1.7.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/editor/scripts/webfont.js"></script>
</head>
<body>
<script type="text/javascript" src="{$config['http_home_url']}engine/classes/highslide/highslide.js"></script>
<script type="text/javascript" src="{$config['http_home_url']}engine/classes/highlight/highlight.code.js"></script>
<script type="text/javascript">
	hljs.initHighlightingOnLoad();

    hs.graphicsDir = '{$config['http_home_url']}engine/classes/highslide/graphics/';
    hs.outlineType = 'rounded-white';
    hs.numberOfImagesToPreload = 0;
    hs.showCredits = false;
</script>
HTML;

$tpl->clear();

echo <<<HTML
<script language="javascript" type="text/javascript">
<!--
function ShowOrHide(d1) {
	  if (d1 != '') DoDiv(d1);
};

function DoDiv(id) {
	  var item = null;
	  if (document.getElementById) {
		item = document.getElementById(id);
	  } else if (document.all){
		item = document.all[id];
	  } else if (document.layers){
		item = document.layers[id];
	  }
	  if (!item) {
	  }
	  else if (item.style) {
		if (item.style.display == "none"){ item.style.display = ""; }
		else {item.style.display = "none"; }
	  }else{ item.visibility = "show"; }
};
//-->
</script>
HTML;

include_once ENGINE_DIR.'/classes/parse.class.php';

$parse = new ParseFilter(Array(), Array(), 1, 1);
$allow_br = intval( $_POST['allow_br'] );

if ($_POST['preview_mode'] == "static" ) {

	if ($member_id['user_group'] != 1 AND $allow_br > 1 ) $allow_br = 1;

	if ($allow_br == 2) {

		if( function_exists( "get_magic_quotes_gpc" ) && get_magic_quotes_gpc() ) $_POST['template'] = stripslashes( $_POST['template'] );  

		$template = trim( addslashes( $_POST['template'] ) );

	} else {

		if ( $config['allow_static_wysiwyg'] ) $parse->allow_code = false;

		$template = $parse->process( $_POST['template'] );
	
		if( $config['allow_static_wysiwyg'] OR $allow_br != '1' ) {
			$template = $parse->BB_Parse( $template );
		} else {
			$template = $parse->BB_Parse( $template, false );
		}

	}

	$descr = trim(htmlspecialchars(stripslashes($_POST['description']), ENT_QUOTES, $config['charset']));

	if ($_GET['page'] == "rules" ) $descr = $lang['rules_edit'];

	if ($_POST['allow_template']) {

		$dle_module = "static";

		if ($_POST['static_tpl'] == "" ) {

			if ( @is_file($tpl->dir."/preview.tpl") ) $tpl->load_template('preview.tpl');
	    	else $tpl->load_template('static.tpl');

		} else
	    	$tpl->load_template($_POST['static_tpl'].'.tpl');

	    $tpl->set('[static-preview]', "");
	    $tpl->set('[/static-preview]', "");
		$tpl->set_block("'\\[full-preview\\](.*?)\\[/full-preview\\]'si","");
		$tpl->set_block("'\\[short-preview\\](.*?)\\[/short-preview\\]'si","");

	    $tpl->set('{static}', stripslashes( $template ) );
	    $tpl->set('{description}', $descr);
	   	$tpl->set('{views}', "0");
		$tpl->set('{pages}', "");
		$tpl->set('{date}', "--");
		$tpl->copy_template = preg_replace ( "#\{date=(.+?)\}#i", "", $tpl->copy_template );


	    $tpl->set('[print-link]',"<a href=#>");
	    $tpl->set('[/print-link]',"</a>");


		$tpl->copy_template = "<fieldset style=\"border-style:solid; border-width:1; border-color:black;\"><legend> <span style=\"font-size: 10px; font-family: Verdana\">{$lang['preview_static']}</span> </legend>".$tpl->copy_template."</fieldset>";
		$tpl->compile('template');
		$tpl->result['template'] = str_replace( "[hide]", "", str_replace( "[/hide]", "", $tpl->result['template']) );
		$tpl->result['template'] = str_replace ( '{THEME}', $config['http_home_url'] . 'templates/' . $config['skin'], $tpl->result['template'] );

		echo $tpl->result['template'];

	} else {

		echo "<fieldset style=\"border-style:solid; border-width:1; border-color:black;\"><legend> <span style=\"font-size: 10px; font-family: Verdana\">{$lang['preview_static']}</span> </legend>".$template."</fieldset>";

	}


} else {

$title = stripslashes($parse->process($_POST['title']));

if ( $config['allow_admin_wysiwyg'] ) $parse->allow_code = false;

$full_story = $parse->process($_POST['full_story']);
$short_story = $parse->process($_POST['short_story']);

if ($config['allow_admin_wysiwyg'] OR $allow_br != '1'){

	$full_story = $parse->BB_Parse($full_story);
	$short_story = $parse->BB_Parse($short_story);

} else {

	$full_story = $parse->BB_Parse($full_story, false);
	$short_story = $parse->BB_Parse($short_story, false);

}

		if( is_array( $_POST['category'] ) ) $category = $_POST['category'];
		else {$category = array (); $_POST['category'] = array (); }

		if (!count($category)) { $my_cat = "---"; $my_cat_link = "---";} else {

		$my_cat = array (); $my_cat_link = array ();
	
			foreach ($category as $element) {
				if ($element) { $my_cat[] = $cat[$element];
								$my_cat_link[] = "<a href=\"#\">{$cat[$element]}</a>";
				}
			}
		$my_cat = stripslashes(implode (', ', $my_cat));
		$my_cat_link = stripslashes(implode (', ', $my_cat_link));
		}

	$dle_module = "main";

	if ( @is_file($tpl->dir."/preview.tpl") ) $tpl->load_template('preview.tpl');
    else $tpl->load_template('shortstory.tpl');

	if ( $parse->not_allowed_text ) $tpl->copy_template = $lang['news_err_39'];

    $tpl->set('[short-preview]', "");
    $tpl->set('[/short-preview]', "");
	$tpl->set_block("'\\[full-preview\\](.*?)\\[/full-preview\\]'si","");
	$tpl->set_block("'\\[static-preview\\](.*?)\\[/static-preview\\]'si","");

    $tpl->set('{title}', $title);

	if ( preg_match( "#\\{title limit=['\"](.+?)['\"]\\}#i", $tpl->copy_template, $matches ) ) {
		$count= intval($matches[1]);
		$title = strip_tags( $title );

		if( $count AND dle_strlen( $title, $config['charset'] ) > $count ) {
						
			$title = dle_substr( $title, 0, $count, $config['charset'] );
						
			if( ($temp_dmax = dle_strrpos( $title, ' ', $config['charset'] )) ) $title = dle_substr( $title, 0, $temp_dmax, $config['charset'] );
					
		}

		$tpl->set( $matches[0], $title );

		
	}

	function check_category( $matches=array() ) {
		global $category_id;
	
		$cats = $matches[2];
		$block = $matches[3];
		$category = $category_id;
	
		if ($matches[1] == "catlist" ) $action = true; else $action = false;
	
		$cats = str_replace(" ", "", $cats );	
		$cats = explode( ',', $cats );
		$category = explode( ',', $category );
		$found = false;
		
		foreach ( $category as $element ) {
			
			if( $action ) {
				
				if( in_array( $element, $cats ) ) {
					
					return $block;
				}
			
			} else {
				
				if( in_array( $element, $cats ) ) {
					$found = true;
				}
			
			}
		
		}
	
		if ( !$action AND !$found ) {	
	
			return $block;
		}
	
		return "";
	
	}

	function declination( $matches=array() ) {
	
		$matches[1] = intval($matches[1]);
		$words = explode('|', trim($matches[2]));
		$parts_word = array();
	
	    switch ( count($words) ) {
			case 1:
				$parts_word[0] .= $words[0];
				$parts_word[1] .= $words[0];
				$parts_word[2] .= $words[0];
				break;
			case 2:
				$parts_word[0] .= $words[0];
				$parts_word[1] .= $words[0].$words[1];
				$parts_word[2] .= $words[0].$words[1];
				break;
			case 3: 
				$parts_word[0] .= $words[0];
				$parts_word[1] .= $words[0].$words[1];
				$parts_word[2] .= $words[0].$words[2];
				break;
			case 4: 
				$parts_word[0] .= $words[0].$words[1];
				$parts_word[1] .= $words[0].$words[2];
				$parts_word[2] .= $words[0].$words[3];
				break;
			}
	
		$word = $matches[1]%10==1&&$matches[1]%100!=11?$parts_word[0]:($matches[1]%10>=2&&$matches[1]%10<=4&&($matches[1]%100<10||$matches[1]%100>=20)?$parts_word[1]:$parts_word[2]);
	
		return $matches[1]." ".$word;
	}

	function formdate( $matches=array() ) {
		global $news_date;
		return langdate($matches[1], $news_date);
	
	}

	if( !count( $_REQUEST['category'] ) ) {
		$_REQUEST['category'] = array ();
		$_REQUEST['category'][] = '0';
	}

	$c_list = array();

	foreach ( $_REQUEST['category'] as $value ) {
		$c_list[] = intval($value);
	}
	$category_id = implode (',', $c_list);

	if( strpos( $tpl->copy_template, "[catlist=" ) !== false ) {
		$tpl->copy_template = preg_replace_callback ( "#\\[(catlist)=(.+?)\\](.*?)\\[/catlist\\]#is", "check_category", $tpl->copy_template );
	}
		
	if( strpos( $tpl->copy_template, "[not-catlist=" ) !== false ) {
		$tpl->copy_template = preg_replace_callback ( "#\\[(not-catlist)=(.+?)\\](.*?)\\[/not-catlist\\]#is", "check_category", $tpl->copy_template );
	}

    $tpl->set('{views}', 0);
	$date = time () + ($config['date_adjust'] * 60);
	$tpl->set( '{date}', langdate( $config['timestamp_active'], $date ) );
	$news_date = $date;
	$tpl->copy_template = preg_replace_callback ( "#\{date=(.+?)\}#i", "formdate", $tpl->copy_template );
    $tpl->set('[link]',"<a href=#>");
    $tpl->set('[/link]',"</a>");
    $tpl->set('{comments-num}', 0);
    $tpl->set('[full-link]', "<a href=#>");
    $tpl->set('[/full-link]', "</a>");
    $tpl->set('[day-news]', "<a href=#>");
    $tpl->set('[/day-news]', "</a>");
    $tpl->set('[com-link]', "<a href=#>");
    $tpl->set('[/com-link]', "</a>");
	$tpl->set('{rating}', "");
	$tpl->set( '[rating]', "" );
	$tpl->set( '[/rating]', "" );
	$tpl->set('{approve}', "");
	$tpl->set('{author}', "--");
    $tpl->set('{category}', $my_cat);
    $tpl->set('{favorites}', '');
    $tpl->set('{link-category}', $my_cat_link);
    if($cat_icon[$category[0]] != ""){ $tpl->set('{category-icon}', $cat_icon[$category[0]]); }
    else{ $tpl->set('{category-icon}', "{THEME}/dleimages/no_icon.gif"); }
	$tpl->set_block("'\\[tags\\](.*?)\\[/tags\\]'si","");
	$tpl->set('{tags}',  "");

	$tpl->set_block( "'\\[complaint\\](.*?)\\[/complaint\\]'si", "" );

	if ( $_POST['news_fixed'] ) {

		$tpl->set( '[fixed]', "" );
		$tpl->set( '[/fixed]', "" );
		$tpl->set_block( "'\\[not-fixed\\](.*?)\\[/not-fixed\\]'si", "" );

	} else {

		$tpl->set( '[not-fixed]', "" );
		$tpl->set( '[/not-fixed]', "" );
		$tpl->set_block( "'\\[fixed\\](.*?)\\[/fixed\\]'si", "" );
	}

	$tpl->set('{edit-date}',  "");
	$tpl->set('{editor}',  "");
	$tpl->set('{edit-reason}',  "");
	$tpl->set_block("'\\[edit-date\\](.*?)\\[/edit-date\\]'si","");
	$tpl->set_block("'\\[edit-reason\\](.*?)\\[/edit-reason\\]'si","");

    $tpl->set('[mail]',"");
    $tpl->set('[/mail]',"");
    $tpl->set('{news-id}', "ID Unknown");
    $tpl->set('{php-self}', $PHP_SELF);

	$tpl->copy_template = preg_replace( "#\\[category=(.+?)\\](.*?)\\[/category\\]#is","\\2", $tpl->copy_template);

	$tpl->set_block("'\\[edit\\].*?\\[/edit\\]'si","");

    $xfieldsaction = "templatereplacepreview";
    $xfieldsinput = $tpl->copy_template;
    include(ENGINE_DIR.'/inc/xfields.php');
    $tpl->copy_template = $xfieldsoutput;

    $tpl->set('{short-story}', stripslashes($short_story));
    $tpl->set('{full-story}', stripslashes($full_story));


	$tpl->copy_template = "<fieldset style=\"border-style:solid; border-width:1; border-color:black;\"><legend> <span style=\"font-size: 10px; font-family: Verdana\">{$lang['preview_short']}</span> </legend>".$tpl->copy_template."</fieldset>";
	$tpl->compile('shortstory');
	
	$tpl->result['shortstory'] = str_replace( "[hide]", "", str_replace( "[/hide]", "", $tpl->result['shortstory']) );
	$tpl->result['shortstory'] = str_replace ( '{THEME}', $config['http_home_url'] . 'templates/' . $config['skin'], $tpl->result['shortstory'] );
	$tpl->result['shortstory'] = preg_replace_callback ( "#\\[declination=(.+?)\\](.+?)\\[/declination\\]#is", "declination", $tpl->result['shortstory'] );
	
	echo $tpl->result['shortstory'];

	$dle_module = "showfull";

	if ( @is_file($tpl->dir."/preview.tpl") ) $tpl->load_template('preview.tpl');
    else $tpl->load_template('fullstory.tpl');

	if ( $parse->not_allowed_text ) $tpl->copy_template = $lang['news_err_39'];

	$tpl->copy_template = str_replace('[full-preview]', "", $tpl->copy_template);
	$tpl->copy_template = str_replace('[/full-preview]', "", $tpl->copy_template);
	$tpl->copy_template = preg_replace("'\\[short-preview\\](.*?)\\[/short-preview\\]'si","", $tpl->copy_template);
	$tpl->copy_template = preg_replace("'\\[static-preview\\](.*?)\\[/static-preview\\]'si","", $tpl->copy_template);


	if( strlen( $full_story ) < 10 AND strpos( $tpl->copy_template, "{short-story}" ) === false ) { $full_story = $short_story; }

    $tpl->set('{title}', $title);

	if ( preg_match( "#\\{title limit=['\"](.+?)['\"]\\}#i", $tpl->copy_template, $matches ) ) {
		$count= intval($matches[1]);
		$title = strip_tags( $title );

		if( $count AND dle_strlen( $title, $config['charset'] ) > $count ) {
						
			$title = dle_substr( $title, 0, $count, $config['charset'] );
						
			if( ($temp_dmax = dle_strrpos( $title, ' ', $config['charset'] )) ) $title = dle_substr( $title, 0, $temp_dmax, $config['charset'] );
					
		}

		$tpl->set( $matches[0], $title );

		
	}

	if( !count( $_REQUEST['category'] ) ) {
		$_REQUEST['category'] = array ();
		$_REQUEST['category'][] = '0';
	}

	$c_list = array();

	foreach ( $_REQUEST['category'] as $value ) {
		$c_list[] = intval($value);
	}
	$category_id = implode (',', $c_list);

	if( strpos( $tpl->copy_template, "[catlist=" ) !== false ) {
		$tpl->copy_template = preg_replace_callback ( "#\\[(catlist)=(.+?)\\](.*?)\\[/catlist\\]#is", "check_category", $tpl->copy_template );
	}
		
	if( strpos( $tpl->copy_template, "[not-catlist=" ) !== false ) {
		$tpl->copy_template = preg_replace_callback ( "#\\[(not-catlist)=(.+?)\\](.*?)\\[/not-catlist\\]#is", "check_category", $tpl->copy_template );
	}


    $tpl->set('{views}', 0);
	$tpl->set( '{date}', langdate( $config['timestamp_active'], $date ) );
	$news_date = $date;
	$tpl->copy_template = preg_replace_callback ( "#\{date=(.+?)\}#i", "formdate", $tpl->copy_template );
    $tpl->set('[link]',"<a href=#>");
    $tpl->set('[/link]',"</a>");
    $tpl->set('{comments-num}', 0);
    $tpl->set('[full-link]', "<a href=#>");
    $tpl->set('[/full-link]', "</a>");
    $tpl->set('[com-link]', "<a href=#>");
    $tpl->set('[/com-link]', "</a>");
    $tpl->set('[day-news]', "<a href=#>");
    $tpl->set('[/day-news]', "</a>");
	$tpl->set('{rating}', "");
	$tpl->set( '[rating]', "" );
	$tpl->set( '[/rating]', "" );
	$tpl->set('{author}', "--");
    $tpl->set('{category}', $my_cat);
    $tpl->set('{link-category}', $my_cat_link);
    $tpl->set('{related-news}', "");
    $tpl->set('{vote-num}', "0");
	$tpl->set_block( "'\\[complaint\\](.*?)\\[/complaint\\]'si", "" );

    if($cat_icon[$category[0]] != ""){ $tpl->set('{category-icon}', $cat_icon[$category[0]]); }
    else{ $tpl->set('{category-icon}', "{THEME}/dleimages/no_icon.gif"); }

	if ( $_POST['news_fixed'] ) {

		$tpl->set( '[fixed]', "" );
		$tpl->set( '[/fixed]', "" );
		$tpl->set_block( "'\\[not-fixed\\](.*?)\\[/not-fixed\\]'si", "" );

	} else {

		$tpl->set( '[not-fixed]', "" );
		$tpl->set( '[/not-fixed]', "" );
		$tpl->set_block( "'\\[fixed\\](.*?)\\[/fixed\\]'si", "" );
	}

    $tpl->set('{pages}', '');
    $tpl->set('{favorites}', '');
    $tpl->set('[mail]',"");
    $tpl->set('[/mail]',"");
    $tpl->set('{poll}', '');
    $tpl->set('{news-id}', "ID Unknown");
    $tpl->set('{php-self}', $PHP_SELF);

	$tpl->copy_template = preg_replace( "#\\[category=(.+?)\\](.*?)\\[/category\\]#is","\\2", $tpl->copy_template);

	$tpl->set_block("'\\[edit\\].*?\\[/edit\\]'si","");
	$tpl->set_block("'{banner_(.*?)}'si","");
	$tpl->set('{edit-date}',  "");
	$tpl->set('{editor}',  "");
	$tpl->set('{edit-reason}',  "");
	$tpl->set_block("'\\[edit-date\\](.*?)\\[/edit-date\\]'si","");
	$tpl->set_block("'\\[edit-reason\\](.*?)\\[/edit-reason\\]'si","");
	$tpl->set_block("'\\[tags\\](.*?)\\[/tags\\]'si","");
	$tpl->set('{tags}',  "");

    $tpl->set('[print-link]',"<a href=#>");
    $tpl->set('[/print-link]',"</a>");

    $xfieldsaction = "templatereplacepreview";
    $xfieldsinput = $tpl->copy_template;
    include(ENGINE_DIR.'/inc/xfields.php');
    $tpl->copy_template = $xfieldsoutput;

    $tpl->set('{short-story}', stripslashes($short_story));
    $tpl->set('{full-story}', stripslashes($full_story));

	$tpl->copy_template = "<fieldset style=\"border-style:solid; border-width:1; border-color:black;\"><legend> <span style=\"font-size: 10px; font-family: Verdana\">{$lang['preview_full']}</span> </legend>".$tpl->copy_template."</fieldset>";
	$tpl->compile('fullstory');
	$tpl->result['fullstory'] = str_replace( "[hide]", "", str_replace( "[/hide]", "", $tpl->result['fullstory']) );
	$tpl->result['fullstory'] = str_replace ( '{THEME}', $config['http_home_url'] . 'templates/' . $config['skin'], $tpl->result['fullstory'] );
	$tpl->result['fullstory'] = preg_replace_callback ( "#\\[declination=(.+?)\\](.+?)\\[/declination\\]#is", "declination", $tpl->result['fullstory'] );
	
	echo $tpl->result['fullstory'];

}

?>
</body></html>