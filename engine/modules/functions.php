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
 Файл: functions.php
-----------------------------------------------------
 Назначение: Основные функции
=====================================================
*/
if( ! defined( 'DATALIFEENGINE' ) ) {
	die( "Hacking attempt!" );
}

if ( $config['auth_domain'] ) {

	$domain_cookie = explode (".", clean_url( $_SERVER['HTTP_HOST'] ));
	$domain_cookie_count = count($domain_cookie);
	$domain_allow_count = -2;
	
	if ( $domain_cookie_count > 2 ) {
	
		if ( in_array($domain_cookie[$domain_cookie_count-2], array('com', 'net', 'org') )) $domain_allow_count = -3;
		if ( $domain_cookie[$domain_cookie_count-1] == 'ua' ) $domain_allow_count = -3;
		$domain_cookie = array_slice($domain_cookie, $domain_allow_count);
	}
	
	$domain_cookie = "." . implode (".", $domain_cookie);
	
	if( (ip2long($_SERVER['HTTP_HOST']) == -1 OR ip2long($_SERVER['HTTP_HOST']) === FALSE) AND strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN' ) define( 'DOMAIN', $domain_cookie );
	else define( 'DOMAIN', null );

} else define( 'DOMAIN', null );

$mcache = false;

if ( $config['cache_type'] ) {

	if ( function_exists('memcache_connect') ) {

		$memcache_server = explode(":", $config['memcache_server']);

		$mcache = @memcache_connect( $memcache_server[0], $memcache_server[1] );

		if( $mcache AND function_exists('memcache_set_compress_threshold') )
		{
			memcache_set_compress_threshold( $mcache, 20000, 0.2 );
		}

	}

}

function dle_session( $sid = false ) {

	$params = session_get_cookie_params();

	if ( DOMAIN ) $params['domain'] = DOMAIN;

	if( version_compare(PHP_VERSION, '5.2', '<') ) {
		
		session_set_cookie_params($params['lifetime'], "/", $params['domain']."; HttpOnly", $params['secure']);
	
	} else {
		
		session_set_cookie_params($params['lifetime'], "/", $params['domain'], $params['secure'], true);
	
	}

	if ( $sid ) @session_id( $sid );

	@session_start();

}

function formatsize($file_size) {
	if( $file_size >= 1073741824 ) {
		$file_size = round( $file_size / 1073741824 * 100 ) / 100 . " Gb";
	} elseif( $file_size >= 1048576 ) {
		$file_size = round( $file_size / 1048576 * 100 ) / 100 . " Mb";
	} elseif( $file_size >= 1024 ) {
		$file_size = round( $file_size / 1024 * 100 ) / 100 . " Kb";
	} else {
		$file_size = $file_size . " b";
	}
	return $file_size;
}

class microTimer {
	var $time;

	function __construct() {
		$this->time = $this->get_real_time();
	}
	function get() {
		return round( ($this->get_real_time() - $this->time), 5 );
	}

	function get_real_time() {
		list ( $seconds, $microSeconds ) = explode( ' ', microtime() );
		return (( float ) $seconds + ( float ) $microSeconds);
	}
}

function flooder($ip, $news_time = false) {
	global $config, $db;
	
	if ( $news_time ) {

		$this_time = time() + ($config['date_adjust'] * 60) - $news_time;
		$db->query( "DELETE FROM " . PREFIX . "_flood where id < '$this_time' AND flag='1' " );
		
		$row = $db->super_query("SELECT COUNT(*) as count FROM " . PREFIX . "_flood WHERE ip = '$ip' AND flag='1'");
		
		if( $row['count'] ) return TRUE;
		else return FALSE;

	} else {

		$this_time = time() + ($config['date_adjust'] * 60) - $config['flood_time'];
		$db->query( "DELETE FROM " . PREFIX . "_flood where id < '$this_time' AND flag='0' " );
		
		$row = $db->super_query("SELECT COUNT(*) as count FROM " . PREFIX . "_flood WHERE ip = '$ip' AND flag='0'");
		
		if( $row['count'] ) return TRUE;
		else return FALSE;

	}

}

function totranslit($var, $lower = true, $punkt = true) {
	global $langtranslit;
	
	if ( is_array($var) ) return "";

	$var = str_replace(chr(0), '', $var);

	if (!is_array ( $langtranslit ) OR !count( $langtranslit ) ) {
		$var = trim( strip_tags( $var ) );

		if ( $punkt ) $var = preg_replace( "/[^a-z0-9\_\-.]+/mi", "", $var );
		else $var = preg_replace( "/[^a-z0-9\_\-]+/mi", "", $var );

		$var = preg_replace( '#[.]+#i', '.', $var );
		$var = str_ireplace( ".php", ".ppp", $var );

		if ( $lower ) $var = strtolower( $var );

		return $var;
	}
	
	$var = trim( strip_tags( $var ) );
	$var = preg_replace( "/\s+/ms", "-", $var );
	$var = str_replace( "/", "-", $var );

	$var = strtr($var, $langtranslit);
	
	if ( $punkt ) $var = preg_replace( "/[^a-z0-9\_\-.]+/mi", "", $var );
	else $var = preg_replace( "/[^a-z0-9\_\-]+/mi", "", $var );

	$var = preg_replace( '#[\-]+#i', '-', $var );
	$var = preg_replace( '#[.]+#i', '.', $var );

	if ( $lower ) $var = strtolower( $var );

	$var = str_ireplace( ".php", "", $var );
	$var = str_ireplace( ".php", ".ppp", $var );

	if( strlen( $var ) > 200 ) {
		
		$var = substr( $var, 0, 200 );
		
		if( ($temp_max = strrpos( $var, '-' )) ) $var = substr( $var, 0, $temp_max );
	
	}
	
	return $var;
}

function langdate($format, $stamp) {
	global $langdate;
	
	return strtr( @date( $format, $stamp ), $langdate );

}

function formdate( $matches=array() ) {
	global $news_date;
	return langdate($matches[1], $news_date);

}

function check_newscount( $matches=array() ) {
	global $global_news_count;

	$block = $matches[3];

	$counts = explode( ',', $matches[2] );
	
    if( $matches[1] == "newscount" ) {

        if( !in_array($global_news_count, $counts) ) return "";

    } else {

        if( in_array($global_news_count, $counts) ) return "";

    }

	return $block;
	
}

function msgbox($title, $text) {
	global $tpl;

	if (!class_exists('dle_template')) {
	    return;
	}
	
	$tpl_2 = new dle_template( );
	$tpl_2->dir = TEMPLATE_DIR;
	
	$tpl_2->load_template( 'info.tpl' );
	
	$tpl_2->set( '{error}', $text );
	$tpl_2->set( '{title}', $title );
	
	$tpl_2->compile( 'info' );
	$tpl_2->clear();
	
	$tpl->result['info'] .= $tpl_2->result['info'];
}

function ShowRating($id, $rating, $vote_num, $allow = true) {
	global $lang;
	
	if( $rating AND $vote_num ) $rating = round( ($rating / $vote_num), 0 );
	else $rating = 0;
	$rating = $rating * 20;
	
	if( !$allow ) {
		
		$rated = <<<HTML
<div class="rating">
		<ul class="unit-rating">
		<li class="current-rating" style="width:{$rating}%;">{$rating}</li>
		</ul>
</div>
HTML;
		
		return $rated;
	}
	
	$rated = <<<HTML
<div id='ratig-layer-{$id}'><div class="rating">
		<ul class="unit-rating">
		<li class="current-rating" style="width:{$rating}%;">{$rating}</li>
		<li><a href="#" title="{$lang['useless']}" class="r1-unit" onclick="doRate('1', '{$id}'); return false;">1</a></li>
		<li><a href="#" title="{$lang['poor']}" class="r2-unit" onclick="doRate('2', '{$id}'); return false;">2</a></li>
		<li><a href="#" title="{$lang['fair']}" class="r3-unit" onclick="doRate('3', '{$id}'); return false;">3</a></li>
		<li><a href="#" title="{$lang['good']}" class="r4-unit" onclick="doRate('4', '{$id}'); return false;">4</a></li>
		<li><a href="#" title="{$lang['excellent']}" class="r5-unit" onclick="doRate('5', '{$id}'); return false;">5</a></li>
		</ul>
</div></div>
HTML;
	
	return $rated;
}

function userrating($id) {
	global $db;
	
	$row = $db->super_query( "SELECT SUM(rating) as rating, SUM(vote_num) as num FROM " . PREFIX . "_post_extras WHERE user_id ='{$id}'" );
	
	if( $row['num'] ) $rating = round( ($row['rating'] / $row['num']), 0 );
	else $rating = 0;

	$rating = $rating * 20;
	
	$rated = <<<HTML
<div class="rating" style="display:inline;">
		<ul class="unit-rating">
		<li class="current-rating" style="width:{$rating}%;">{$rating}</li>
		</ul>
		</div>
HTML;
	
	return $rated;
}

function CategoryNewsSelection($categoryid = 0, $parentid = 0, $nocat = TRUE, $sublevelmarker = '', $returnstring = '') {
	global $cat_info, $user_group, $member_id, $dle_module;

	if ($dle_module == 'addnews') $allow_list = explode( ',', $user_group[$member_id['user_group']]['cat_allow_addnews'] );
	else $allow_list = explode( ',', $user_group[$member_id['user_group']]['allow_cats'] );

	$spec_list = explode( ',', $user_group[$member_id['user_group']]['cat_add'] );

	$root_category = array ();
	
	if( $parentid == 0 ) {
		if( $nocat ) $returnstring .= '<option value="0"></option>';
	} else {
		$sublevelmarker .= '&nbsp;&nbsp;&nbsp;';
	}
	
	if( count( $cat_info ) ) {
		
		foreach ( $cat_info as $cats ) {
			if( $cats['parentid'] == $parentid ) $root_category[] = $cats['id'];
		}
		
		if( count( $root_category ) ) {
			foreach ( $root_category as $id ) {
				
				if( $allow_list[0] == "all" OR in_array( $id, $allow_list ) ) {
					
					if( $spec_list[0] == "all" or in_array( $id, $spec_list ) ) $color = "black";
					else $color = "red";
					
					$returnstring .= "<option style=\"color: {$color}\" value=\"" . $id . '" ';
					
					if( is_array( $categoryid ) ) {
						foreach ( $categoryid as $element ) {
							if( $element == $id ) $returnstring .= 'SELECTED';
						}
					} elseif( $categoryid == $id ) $returnstring .= 'SELECTED';
					
					$returnstring .= '>' . $sublevelmarker . $cat_info[$id]['name'] . '</option>';
				}
				$returnstring = CategoryNewsSelection( $categoryid, $id, $nocat, $sublevelmarker, $returnstring );
			}
		}
	}
	return $returnstring;
}

function get_ID($cat_info, $category) {
	foreach ( $cat_info as $cats ) {
		if( $cats['alt_name'] == $category ) return $cats['id'];
	}
	return false;
}

function set_vars($file, $data) {
	$file = totranslit($file, true, false);	
	$fp = fopen( ENGINE_DIR . '/cache/system/' . $file . '.php', 'wb+' );
	fwrite( $fp, serialize( $data ) );
	fclose( $fp );
	
	@chmod( ENGINE_DIR . '/cache/system/' . $file . '.php', 0666 );
}

function get_vars($file) {
	$file = totranslit($file, true, false);

	$data = @file_get_contents( ENGINE_DIR . '/cache/system/' . $file . '.php' );

	if ( $data !== false ) {

		$data = unserialize( $data );
		if ( is_array($data) OR is_int($data) ) return $data;

	} 

	return false;	
}

function filesize_url($url) {
	return ($data = @file_get_contents( $url )) ? strlen( $data ) : false;
}

function dle_cache($prefix, $cache_id = false, $member_prefix = false) {
	global $config, $is_logged, $member_id, $mcache;
	
	if( !$config['allow_cache'] ) return false;

	$config['clear_cache'] = (intval($config['clear_cache']) > 1) ? intval($config['clear_cache']) : 0;

	if( $is_logged ) $end_file = $member_id['user_group'];
	else $end_file = "0";
	
	if( ! $cache_id ) {
		
		$key = $prefix;
	
	} else {
		
		$cache_id = md5( $cache_id );
		
		if( $member_prefix ) $key = $prefix . "_" . $cache_id . "_" . $end_file;
		else $key = $prefix . "_" . $cache_id;
	
	}

	if ( $mcache ) {

		return memcache_get( $mcache, md5( DBNAME . PREFIX . md5(DBUSER) .$key ) );

	} else {

		$buffer = @file_get_contents( ENGINE_DIR . "/cache/" . $key . ".tmp" );

		if ( $buffer !== false AND $config['clear_cache'] ) {

			$file_date = @filemtime( ENGINE_DIR . "/cache/" . $key . ".tmp" );
			$file_date = time()-$file_date;

			if ( $file_date > ( $config['clear_cache'] * 60 ) ) {
				$buffer = false;
				@unlink( ENGINE_DIR . "/cache/" . $key . ".tmp" );
			}

			return $buffer;

		} else return $buffer;

	}
}

function create_cache($prefix, $cache_text, $cache_id = false, $member_prefix = false) {
	global $config, $is_logged, $member_id, $mcache;
	
	if( !$config['allow_cache'] ) return false;
	
	if( $is_logged ) $end_file = $member_id['user_group'];
	else $end_file = "0";
	
	if( ! $cache_id ) {
		$key = $prefix;
	} else {
		$cache_id = md5( $cache_id );
		
		if( $member_prefix ) $key = $prefix . "_" . $cache_id . "_" . $end_file;
		else $key = $prefix . "_" . $cache_id;
	
	}
	

	if ( $mcache ) {

		$config['clear_cache'] = (intval($config['clear_cache']) > 1) ? intval($config['clear_cache']) : 0;

		if ( $config['clear_cache'] ) $set_time = $config['clear_cache'] * 60; else $set_time = 86400;

		memcache_set( $mcache, md5( DBNAME . PREFIX . md5(DBUSER) .$key ), $cache_text, MEMCACHE_COMPRESSED, $set_time );

	} else {

		file_put_contents (ENGINE_DIR . "/cache/" . $key . ".tmp", $cache_text, LOCK_EX);
		
		@chmod( ENGINE_DIR . "/cache/" . $key . ".tmp", 0666 );
	}
}

function clear_cache($cache_areas = false) {
	global $mcache;

	if ( $mcache ) {

		memcache_flush($mcache);

	}

	if ( $cache_areas ) {
		if(!is_array($cache_areas)) {
			$cache_areas = array($cache_areas);
		}
	}
		
	$fdir = opendir( ENGINE_DIR . '/cache' );
		
	while ( $file = readdir( $fdir ) ) {
		if( $file != '.' and $file != '..' and $file != '.htaccess' and $file != 'system' ) {
			
			if( $cache_areas ) {
				
				foreach($cache_areas as $cache_area) if( strpos( $file, $cache_area ) !== false ) @unlink( ENGINE_DIR . '/cache/' . $file );
			
			} else {
				
				@unlink( ENGINE_DIR . '/cache/' . $file );
			
			}
		}
	}

}

function ChangeSkin($dir, $skin) {
	
	$templates_list = array ();
	
	$handle = opendir( $dir );
	
	while ( false !== ($file = readdir( $handle )) ) {
		if( @is_dir( "./templates/$file" ) and ($file != "." AND $file != ".." AND $file != "smartphone") ) {
			$templates_list[] = $file;
		}
	}
	
	closedir( $handle );
	sort($templates_list);
	
	$skin_list = "<form method=\"post\" action=\"\"><select onchange=\"submit()\" name=\"skin_name\">";
	
	foreach ( $templates_list as $single_template ) {
		if( $single_template == $skin ) $selected = " selected=\"selected\"";
		else $selected = "";
		$skin_list .= "<option value=\"$single_template\"" . $selected . ">$single_template</option>";
	}
	
	$skin_list .= '</select><input type="hidden" name="action_skin_change" value="yes" /></form>';
	
	return $skin_list;
}

function get_mass_cats($id) {
	global $cat_info;

	$id = explode ('-', $id);
	$temp_array = array();

	foreach ( $cat_info as $cats ) {

		if ($cats['id'] >= $id[0] AND $cats['id'] <= $id[1] ) $temp_array[] = $cats['id'];

	}

	if ( count($temp_array) ) { sort($temp_array); return implode(',', $temp_array); }
	else return 0;

}

function custom_print( $matches=array() ) {
	global $db, $is_logged, $member_id, $xf_inited, $cat_info, $config, $user_group, $category_id, $_TIME, $lang, $smartphone_detected, $dle_module, $allow_comments_ajax, $PHP_SELF, $news_date, $banners, $banner_in_news, $url_page, $user_query, $custom_news;

	if ( !count($matches) ) return "";
	$param_str = trim($matches[1]);

	$aviable = array();
	$thisdate = date( "Y-m-d H:i:s", $_TIME );
	$sql_select = "SELECT p.id, p.autor, p.date, p.short_story, CHAR_LENGTH(p.full_story) as full_story, p.xfields, p.title, p.category, p.alt_name, p.comm_num, p.allow_comm, p.fixed, p.tags, e.news_read, e.allow_rate, e.rating, e.vote_num, e.votes, e.view_edit, e.editdate, e.editor, e.reason FROM " . PREFIX . "_post p LEFT JOIN " . PREFIX . "_post_extras e ON (p.id=e.news_id)";
	$where = array();
	$allow_cache = $config['allow_cache'];

	if( preg_match( "#aviable=['\"](.+?)['\"]#i", $param_str, $match ) ) {
		$aviable = explode( '|', $match[1] );
	} else $aviable[] = "global";

	$do = $dle_module ? $dle_module : "main";

	if( ! (in_array( $do, $aviable )) and ($aviable[0] != "global") ) return "";

	if( preg_match( "#id=['\"](.+?)['\"]#i", $param_str, $match ) ) {

		$temp_array = array();
		$where_id = array();
		$match[1] = explode (',', trim($match[1]));

		foreach ($match[1] as $value) {

			if( count(explode('-', $value)) == 2 ) {
				$value = explode('-', $value);
				$where_id[] = "id >= '" . intval($value[0]) . "' AND id <= '".intval($value[1])."'";

			} else $temp_array[] = intval($value);

		}

		if ( count($temp_array) ) {

			$where_id[] = "id IN ('" . implode("','", $temp_array) . "')";
		}

		if ( count($where_id) ) { 
			$custom_id = implode(' OR ', $where_id);
			$where[] = $custom_id;

		}
	}

	$allow_list = explode( ',', $user_group[$member_id['user_group']]['allow_cats'] );
	
	if( $allow_list[0] != "all" AND !$user_group[$member_id['user_group']]['allow_short'] ) {

		if( $config['allow_multi_category'] ) {
				
			$where[] = "category regexp '[[:<:]](" . implode( '|', $allow_list ) . ")[[:>:]]'";
			
		} else {
				
			$where[] = "category IN ('" . implode( "','", $allow_list ) . "')";
			
		}
	
	}

	if( preg_match( "#category=['\"](.+?)['\"]#i", $param_str, $match ) ) {

		$temp_array = array();

		$match[1] = explode (',', $match[1]);

		foreach ($match[1] as $value) {

			if( count(explode('-', $value)) == 2 ) $temp_array[] = get_mass_cats($value);
			else $temp_array[] = intval($value);

		}


		$temp_array = implode(',', $temp_array);

		$custom_category = $db->safesql( trim(str_replace( ',', '|', $temp_array )) );

		if( $config['allow_multi_category'] ) {
			
			$where[] = "category regexp '[[:<:]](" . $custom_category . ")[[:>:]]'";
		
		} else {
			
			$custom_category = str_replace( "|", "','", $custom_category );
			$where[] = "category IN ('" . $custom_category . "')";
		
		}
	}

	if( preg_match( "#days=['\"](.+?)['\"]#i", $param_str, $match ) ) {
		$days = intval(trim($match[1]));
		$where[] = "p.date >= '{$thisdate}' - INTERVAL {$days} DAY AND p.date < '{$thisdate}'";
	} else $days = 0;

	if( preg_match( "#author=['\"](.+?)['\"]#i", $param_str, $match ) ) {
		$author = $db->safesql(trim($match[1]));
		$where[] = "p.autor like '{$author}'";
	} else $author = "";

	$where[] = "approve=1";

	if( $config['no_date'] AND !$config['news_future'] AND !$days) $where[] = "date < '" . $thisdate . "'";

	if( preg_match( "#template=['\"](.+?)['\"]#i", $param_str, $match ) ) {
		$custom_template = trim($match[1]);
	} else $custom_template = "shortstory";

	if( preg_match( "#from=['\"](.+?)['\"]#i", $param_str, $match ) ) {
		$custom_from = intval($match[1]);
		$custom_all = $custom_from;
	} else { $custom_from = 0; $custom_all = 0;}

	if( preg_match( "#limit=['\"](.+?)['\"]#i", $param_str, $match ) ) {
		$custom_limit = intval($match[1]);
	} else $custom_limit = $config['news_number'];

	if( preg_match( "#cache=['\"](.+?)['\"]#i", $param_str, $match ) ) {
		if( $match[1] == "yes" ) $config['allow_cache'] = 1;
		else $config['allow_cache'] = false;
	}

	if( preg_match( "#fixed=['\"](.+?)['\"]#i", $param_str, $match ) ) {

		$fixed = "";
		$fixedcache = "fixed yes";

		if( $match[1] == "yes" ) $fixed = "fixed DESC, ";
		elseif( $match[1] == "only" ) { $where[] = "fixed='1'"; $fixedcache = "fixed only"; }
		elseif( $match[1] == "without" ) { $where[] = "fixed='0'"; $fixedcache = "without fixed"; }

	} else { $fixed = ""; $fixedcache = ""; }

	if( $is_logged and ($user_group[$member_id['user_group']]['allow_edit'] and ! $user_group[$member_id['user_group']]['allow_all_edit']) ) $config['allow_cache'] = false;

	if( $cat_info[$custom_category]['news_sort'] != "" ) $news_sort = $cat_info[$custom_category]['news_sort']; else $news_sort = $config['news_sort'];
	if( $cat_info[$custom_category]['news_msort'] != "" ) $news_msort = $cat_info[$custom_category]['news_msort']; else $news_msort = $config['news_msort'];

	if( preg_match( "#order=['\"](.+?)['\"]#i", $param_str, $match ) ) {
		$allowed_sort = array ('date' => 'date', 'rating' => 'rating', 'reads' => 'news_read', 'comments' => 'comm_num','title' => 'title', 'rand' => 'RAND()' );

		if ( $allowed_sort[$match[1]] ) $news_sort = $allowed_sort[$match[1]];

		if ($match[1] == "rand" ) { $fixed = ""; $news_msort = ""; } else $news_msort = "DESC";
		if ($match[1] == "title" ) $news_msort = "ASC";
	}

	if( preg_match( "#navigation=['\"](.+?)['\"]#i", $param_str, $match ) ) {

		if( $match[1] == "yes" AND $url_page !== false ) {

			$build_navigation = true;
			if (isset ( $_GET['cstart'] )) $cstart = intval ( $_GET['cstart'] ); else $cstart = 0;

			if ($cstart > 10) $config['allow_cache'] = false;

			if ($cstart) {
				$cstart = $cstart - 1;
				$cstart = ($cstart * $custom_limit) + $custom_from;
				$custom_from = $cstart;
			}

		} else $build_navigation = false;

	} else $build_navigation = false;

	$custom_cache_id = $custom_id.$custom_category.$user_group[$member_id['user_group']]['allow_cats'].$custom_from.$custom_limit.$news_sort.$news_msort.$custom_template.$days.$author.$fixedcache;

	$content = dle_cache( "news", $custom_cache_id, true );
	
	if( $content !== false ) {
		$config['allow_cache'] = $allow_cache;
		$custom_news = true;
		return $content;
	} else {

		if ( $build_navigation ) {

			$count_all = $db->super_query( "SELECT COUNT(*) as count FROM " . PREFIX . "_post WHERE ".implode(' AND ', $where) );
			$count_all = $count_all['count'] - $custom_all;

		}

		$tpl = new dle_template();
		$tpl->dir = TEMPLATE_DIR;				

		$tpl->load_template( $custom_template . '.tpl' );

		$sql_select .= " WHERE ".implode(' AND ', $where)." ORDER BY " . $fixed . $news_sort . " " . $news_msort . " LIMIT " . $custom_from . "," . $custom_limit;
		$sql_result = $db->query( $sql_select );
		
		include (ENGINE_DIR . '/modules/show.custom.php');
		
		if( $config['files_allow'] ) if( strpos( $tpl->result['content'], "[attachment=" ) !== false ) {
			$tpl->result['content'] = show_attach( $tpl->result['content'], $attachments );
		}
		
		if ( $custom_news ) create_cache( "news", $tpl->result['content'], $custom_cache_id, true );
		$config['allow_cache'] = $allow_cache;
		return $tpl->result['content'];
	
	}

}

function check_ip($ips) {
	
	$_IP = $_SERVER['REMOTE_ADDR'];
	
	$blockip = FALSE;
	
	if( is_array( $ips ) ) {
		foreach ( $ips as $ip_line ) {
			
			$ip_arr = rtrim( $ip_line['ip'] );
			
			$ip_check_matches = 0;
			$db_ip_split = explode( ".", $ip_arr );
			$this_ip_split = explode( ".", $_IP );
			
			for($i_i = 0; $i_i < 4; $i_i ++) {
				if( $this_ip_split[$i_i] == $db_ip_split[$i_i] or $db_ip_split[$i_i] == '*' ) {
					$ip_check_matches += 1;
				}
			
			}
			
			if( $ip_check_matches == 4 ) {
				$blockip = $ip_line['ip'];
				break;
			}
		
		}
	}
	
	return $blockip;
}

function check_netz($ip1, $ip2) {
	
	$ip1 = explode( ".", $ip1 );
	$ip2 = explode( ".", $ip2 );
	
	if( $ip1[0] != $ip2[0] ) return false;
	if( $ip1[1] != $ip2[1] ) return false;
	
	return true;

}

function show_attach($story, $id, $static = false) {
	global $db, $config, $lang, $user_group, $member_id;

	$find_1 = array();
	$find_2 = array();
	$replace_1 = array();
	$replace_2 = array();
	
	if( $static ) {
		
		if( is_array( $id ) and count( $id ) ) $where = "static_id IN (" . implode( ",", $id ) . ")";
		else $where = "static_id = '".intval($id)."'";
		
		$db->query( "SELECT id, name, onserver, dcount FROM " . PREFIX . "_static_files WHERE $where" );
		
		$area = "&amp;area=static";
	
	} else {
		
		if( is_array( $id ) and count( $id ) ) $where = "news_id IN (" . implode( ",", $id ) . ")";
		else $where = "news_id = '".intval($id)."'";
		
		$db->query( "SELECT id, name, onserver, dcount FROM " . PREFIX . "_files WHERE $where" );
		
		$area = "";
	
	}
	
	while ( $row = $db->get_row() ) {
		
		$size = formatsize( @filesize( ROOT_DIR . '/uploads/files/' . $row['onserver'] ) );
		$row['name'] = explode( "/", $row['name'] );
		$row['name'] = end( $row['name'] );

		$find_1[] = '[attachment=' . $row['id'] . ']';
		$find_2[] = "#\[attachment={$row['id']}:(.+?)\]#i";

		if ( ! $user_group[$member_id['user_group']]['allow_files'] ) {

			$replace_1[] = "<span class=\"attachment\">{$lang['att_denied']}</span>";
			$replace_2[] = "<span class=\"attachment\">{$lang['att_denied']}</span>";

		} elseif( $config['files_count'] ) {

			$replace_1[] = "<span class=\"attachment\"><a href=\"{$config['http_home_url']}engine/download.php?id={$row['id']}{$area}\" >{$row['name']}</a> [{$size}] ({$lang['att_dcount']} {$row['dcount']})</span>";
			$replace_2[] = "<span class=\"attachment\"><a href=\"{$config['http_home_url']}engine/download.php?id={$row['id']}{$area}\" >\\1</a> [{$size}] ({$lang['att_dcount']} {$row['dcount']})</span>";

		} else {

			$replace_1[] = "<span class=\"attachment\"><a href=\"{$config['http_home_url']}engine/download.php?id={$row['id']}{$area}\" >{$row['name']}</a> [{$size}]</span>";
			$replace_2[] = "<span class=\"attachment\"><a href=\"{$config['http_home_url']}engine/download.php?id={$row['id']}{$area}\" >\\1</a> [{$size}]</span>";

		}

	}

	$db->free();

	$story = str_replace ( $find_1, $replace_1, $story );
	$story = preg_replace( $find_2, $replace_2, $story );
	
	return $story;

}

function xfieldsload($profile = false) {
	global $lang;
	
	if( $profile ) $path = ENGINE_DIR . '/data/xprofile.txt';
	else $path = ENGINE_DIR . '/data/xfields.txt';
	
	$filecontents = file( $path );
	
	if( !is_array( $filecontents ) ) msgbox( "System error", "File <b>{$path}</b> not found" );
	else {
		foreach ( $filecontents as $name => $value ) {
			$filecontents[$name] = explode( "|", trim( $value ) );
			foreach ( $filecontents[$name] as $name2 => $value2 ) {
				$value2 = str_replace( "&#124;", "|", $value2 );
				$value2 = str_replace( "__NEWL__", "\r\n", $value2 );
				$filecontents[$name][$name2] = $value2;
			}
		}
	}
	return $filecontents;
}

function xfieldsdataload($id) {
	
	if( $id == "" ) return;
	
	$xfieldsdata = explode( "||", $id );
	foreach ( $xfieldsdata as $xfielddata ) {
		list ( $xfielddataname, $xfielddatavalue ) = explode( "|", $xfielddata );
		$xfielddataname = str_replace( "&#124;", "|", $xfielddataname );
		$xfielddataname = str_replace( "__NEWL__", "\r\n", $xfielddataname );
		$xfielddatavalue = str_replace( "&#124;", "|", $xfielddatavalue );
		$xfielddatavalue = str_replace( "__NEWL__", "\r\n", $xfielddatavalue );
		$data[$xfielddataname] = $xfielddatavalue;
	}
	return $data;
}

function create_keywords($story) {
	global $metatags, $config;
	
	$keyword_count = 20;
	$newarr = array ();
	
	$quotes = array ("\x22", "\x60", "\t", "\n", "\r", ",", ".", "/", "¬", "#", ";", ":", "@", "~", "[", "]", "{", "}", "=", "-", "+", ")", "(", "*", "^", "%", "$", "<", ">", "?", "!", '"');
	$fastquotes = array ("\x22", "\x60", "\t", "\n", "\r", '"', "\\", '\r', '\n', "/", "{", "}", "[", "]" );
	
	$story = preg_replace( "#\[hide\](.+?)\[/hide\]#is", "", $story );
	$story = preg_replace( "'\[attachment=(.*?)\]'si", "", $story );
	$story = preg_replace( "'\[page=(.*?)\](.*?)\[/page\]'si", "", $story );
	$story = str_replace( "{PAGEBREAK}", "", $story );
	$story = str_replace( "&nbsp;", " ", $story );
	$story = str_replace( '<br />', ' ', $story );
	$story = strip_tags( $story );
	$story = preg_replace( "#&(.+?);#", "", $story );
	$story = trim(str_replace( " ,", "", stripslashes( $story )));
	
	$story = str_replace( $fastquotes, '', $story );
	
	$metatags['description'] = dle_substr( $story, 0, 190, $config['charset'] );
	
	$story = str_replace( $quotes, ' ', $story );
	
	$arr = explode( " ", $story );
	
	foreach ( $arr as $word ) {
		if( dle_strlen( $word, $config['charset'] ) > 4 ) $newarr[] = $word;
	}
	
	$arr = array_count_values( $newarr );
	arsort( $arr );
	
	$arr = array_keys( $arr );
	
	$total = count( $arr );
	
	$offset = 0;
	
	$arr = array_slice( $arr, $offset, $keyword_count );
	
	$metatags['keywords'] = implode( ", ", $arr );
}

function allowed_ip($ip_array) {
	
	$ip_array = trim( $ip_array );
	
	if( $ip_array == "" ) {
		return true;
	}
	
	$ip_array = explode( "|", $ip_array );
	
	$db_ip_split = explode( ".", $_SERVER['REMOTE_ADDR'] );
	
	foreach ( $ip_array as $ip ) {
		
		$ip_check_matches = 0;
		$this_ip_split = explode( ".", trim( $ip ) );
		
		for($i_i = 0; $i_i < 4; $i_i ++) {
			if( $this_ip_split[$i_i] == $db_ip_split[$i_i] or $this_ip_split[$i_i] == '*' ) {
				$ip_check_matches += 1;
			}
		
		}
		
		if( $ip_check_matches == 4 ) return true;
	
	}
	
	return FALSE;
}

function news_permission($id) {
	
	if( $id == "" ) return;
	
	$data = array ();
	$groups = explode( "||", $id );
	foreach ( $groups as $group ) {
		list ( $groupid, $groupvalue ) = explode( ":", $group );
		$data[$groupid] = $groupvalue;
	}
	return $data;
}

function bannermass($fest, $massiv) {
	return $fest . $massiv[@array_rand( $massiv )]['text'];
}

function get_sub_cats($id, $subcategory = '') {
	
	global $cat_info;
	$subfound = array ();
	
	if( $subcategory == '' ) $subcategory = $id;
	
	foreach ( $cat_info as $cats ) {
		if( $cats['parentid'] == $id ) {
			$subfound[] = $cats['id'];
		}
	}
	
	foreach ( $subfound as $parentid ) {
		$subcategory .= "|" . $parentid;
		$subcategory = get_sub_cats( $parentid, $subcategory );
	}
	
	return $subcategory;

}

function check_xss() {

	$url = html_entity_decode( urldecode( $_SERVER['QUERY_STRING'] ), ENT_QUOTES, 'ISO-8859-1' );
	$url = str_replace( "\\", "/", $url );

	if ($_GET['do'] == "xfsearch") {

		$f = html_entity_decode( urldecode( $_GET['xf'] ), ENT_QUOTES, 'ISO-8859-1' );

		$count1 = substr_count ($f, "'");
		$count2 = substr_count ($url, "'");

		if ( $count1 == $count2 AND (strpos( $url, '<' ) === false) AND (strpos( $url, '>' ) === false) AND (strpos( $url, './' ) === false) AND (strpos( $url, '../' ) === false) AND (strpos( $url, '.php' ) === false) ) return;

	}

	if ($_GET['do'] == "tags") {

		$f = html_entity_decode( urldecode( $_GET['tag'] ), ENT_QUOTES, 'ISO-8859-1' );

		$count1 = substr_count ($f, "'");
		$count2 = substr_count ($url, "'");

		if ( $count1 == $count2 AND (strpos( $url, '<' ) === false) AND (strpos( $url, '>' ) === false) AND (strpos( $url, './' ) === false) AND (strpos( $url, '../' ) === false) AND (strpos( $url, '.php' ) === false) ) return;

	}
	
	if( $url ) {
		
		if( (strpos( $url, '<' ) !== false) || (strpos( $url, '>' ) !== false) || (strpos( $url, './' ) !== false) || (strpos( $url, '../' ) !== false) || (strpos( $url, '\'' ) !== false) || (strpos( $url, '.php' ) !== false) ) {
			if( $_GET['do'] != "search" OR $_GET['subaction'] != "search" ) die( "Hacking attempt!" );
		}
	
	}
	
	$url = html_entity_decode( urldecode( $_SERVER['REQUEST_URI'] ), ENT_QUOTES, 'ISO-8859-1' );
	$url = str_replace( "\\", "/", $url );
	
	if( $url ) {
		
		if( (strpos( $url, '<' ) !== false) || (strpos( $url, '>' ) !== false) || (strpos( $url, '\'' ) !== false) ) {
			if( $_GET['do'] != "search" OR $_GET['subaction'] != "search" ) die( "Hacking attempt!" );
		
		}
	
	}

}

function check_category( $matches=array() ) {
	global $category_id;

	$cats = $matches[2];
	$block = $matches[3];
	$category = $category_id;

	if ($matches[1] == "category" OR $matches[1] == "catlist") $action = true; else $action = false;

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

function clean_url($url) {
	
	if( $url == '' ) return;
	
	$url = str_replace( "http://", "", strtolower( $url ) );
	$url = str_replace( "https://", "", $url );
	if( substr( $url, 0, 4 ) == 'www.' ) $url = substr( $url, 4 );
	$url = explode( '/', $url );
	$url = reset( $url );
	$url = explode( ':', $url );
	$url = reset( $url );
	
	return $url;
}

function get_url($id) {
	
	global $cat_info;
	
	if( ! $id ) return;
	
	$parent_id = $cat_info[$id]['parentid'];
	
	$url = $cat_info[$id]['alt_name'];
	
	while ( $parent_id ) {
		
		$url = $cat_info[$parent_id]['alt_name'] . "/" . $url;
		
		$parent_id = $cat_info[$parent_id]['parentid'];
		
		if( $cat_info[$parent_id]['parentid'] == $cat_info[$parent_id]['id'] ) break;
	
	}
	
	return $url;
}

function get_categories($id) {
	
	global $cat_info, $config, $PHP_SELF;
	
	if( ! $id ) return;
	
	$parent_id = $cat_info[$id]['parentid'];
	
	if( $config['allow_alt_url'] ) $list = "<a href=\"" . $config['http_home_url'] . get_url( $id ) . "/\">{$cat_info[$id]['name']}</a>";
	else $list = "<a href=\"$PHP_SELF?do=cat&amp;category={$cat_info[$id]['alt_name']}\">{$cat_info[$id]['name']}</a>";
	
	while ( $parent_id ) {
		
		if( $config['allow_alt_url'] ) $list = "<a href=\"" . $config['http_home_url'] . get_url( $parent_id ) . "/\">{$cat_info[$parent_id]['name']}</a>" . " &raquo; " . $list;
		else $list = "<a href=\"$PHP_SELF?do=cat&amp;category={$cat_info[$parent_id]['alt_name']}\">{$cat_info[$parent_id]['name']}</a>" . " &raquo; " . $list;
		
		$parent_id = $cat_info[$parent_id]['parentid'];
		
		if( $cat_info[$parent_id]['parentid'] == $cat_info[$parent_id]['id'] ) break;
	
	}
	
	return $list;
}

function get_breadcrumbcategories($id) {
	
	global $cat_info, $config, $PHP_SELF;
	
	if( ! $id ) return;
	
	$parent_id = $cat_info[$id]['parentid'];
	
	if( $config['allow_alt_url'] ) $list = "<span itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"" . $config['http_home_url'] . get_url( $id ) . "/\" itemprop=\"url\"><span itemprop=\"title\">{$cat_info[$id]['name']}</span></a></span>";
	else $list = "<span itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"$PHP_SELF?do=cat&amp;category={$cat_info[$id]['alt_name']}\" itemprop=\"url\"><span itemprop=\"title\">{$cat_info[$id]['name']}</span></a></span>";
	
	while ( $parent_id ) {
		
		if( $config['allow_alt_url'] ) $list = "<span itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"" . $config['http_home_url'] . get_url( $parent_id ) . "/\" itemprop=\"url\"><span itemprop=\"title\">{$cat_info[$parent_id]['name']}</span></a></span>" . " &raquo; " . $list;
		else $list = "<span itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\"><a href=\"$PHP_SELF?do=cat&amp;category={$cat_info[$parent_id]['alt_name']}\" itemprop=\"url\"><span itemprop=\"title\">{$cat_info[$parent_id]['name']}</span></a></span>" . " &raquo; " . $list;
		
		$parent_id = $cat_info[$parent_id]['parentid'];
		
		if( $cat_info[$parent_id]['parentid'] == $cat_info[$parent_id]['id'] ) break;
	
	}
	
	return $list;
}

function set_cookie($name, $value, $expires) {
	
	if( $expires ) {
		
		$expires = time() + ($expires * 86400);
	
	} else {
		
		$expires = FALSE;
	
	}
	
	if( PHP_VERSION < 5.2 ) {

		if ( DOMAIN ) setcookie( $name, $value, $expires, "/", "; HttpOnly" );
		else setcookie( $name, $value, $expires, "/", DOMAIN . "; HttpOnly" );
	
	} else {
		
		setcookie( $name, $value, $expires, "/", DOMAIN, NULL, TRUE );
	
	}
}

function news_sort($do) {
	
	global $config, $lang;
	
	if( ! $do ) $do = "main";
	
	$find_sort = "dle_sort_" . $do;
	$direction_sort = "dle_direction_" . $do;
	
	$find_sort = str_replace( ".", "", $find_sort );
	$direction_sort = str_replace( ".", "", $direction_sort );
	
	$sort = array ();
	$allowed_sort = array ('date', 'rating', 'news_read', 'comm_num', 'title' );
	
	$soft_by_array = array (

	'date' => array (

	'name' => $lang['sort_by_date'], 'value' => "date", 'direction' => "desc", 'image' => "" ), 

	'rating' => array (

	'name' => $lang['sort_by_rating'], 'value' => "rating", 'direction' => "desc", 'image' => "" ), 

	'news_read' => array (

	'name' => $lang['sort_by_read'], 'value' => "news_read", 'direction' => "desc", 'image' => "" ), 

	'comm_num' => array (

	'name' => $lang['sort_by_comm'], 'value' => "comm_num", 'direction' => "desc", 'image' => "" ), 

	'title' => array (

	'name' => $lang['sort_by_title'], 'value' => "title", 'direction' => "desc", 'image' => "" )

	 );
	
	if( isset( $_SESSION[$direction_sort] ) AND ($_SESSION[$direction_sort] == "desc" OR $_SESSION[$direction_sort] == "asc") ) $direction = $_SESSION[$direction_sort];
	else $direction = $config['news_msort'];

	if( isset( $_SESSION[$find_sort] ) AND $_SESSION[$find_sort] AND in_array( $_SESSION[$find_sort], $allowed_sort ) ) $soft_by = $_SESSION[$find_sort];
	else $soft_by = $config['news_sort'];
	
	if( strtolower( $direction ) == "asc" ) {
		
		$soft_by_array[$soft_by]['image'] = "<img src=\"{THEME}/dleimages/asc.gif\" alt=\"\" />";
		$soft_by_array[$soft_by]['direction'] = "desc";
	
	} else {
		
		$soft_by_array[$soft_by]['image'] = "<img src=\"{THEME}/dleimages/desc.gif\" alt=\"\" />";
		$soft_by_array[$soft_by]['direction'] = "asc";
	}
	
	foreach ( $soft_by_array as $value ) {
		
		$sort[] = $value['image'] . "<a href=\"#\" onclick=\"dle_change_sort('{$value['value']}','{$value['direction']}'); return false;\">" . $value['name'] . "</a>";
	}
	
	$sort = "<form name=\"news_set_sort\" id=\"news_set_sort\" method=\"post\" action=\"\" >" . $lang['sort_main'] . "&nbsp;" . implode( " | ", $sort );
	
	$sort .= <<<HTML
<input type="hidden" name="dlenewssortby" id="dlenewssortby" value="{$config['news_sort']}" />
<input type="hidden" name="dledirection" id="dledirection" value="{$config['news_msort']}" />
<input type="hidden" name="set_new_sort" id="set_new_sort" value="{$find_sort}" />
<input type="hidden" name="set_direction_sort" id="set_direction_sort" value="{$direction_sort}" />
<script type="text/javascript">
<!-- begin

function dle_change_sort(sort, direction){

  var frm = document.getElementById('news_set_sort');

  frm.dlenewssortby.value=sort;
  frm.dledirection.value=direction;

  frm.submit();
  return false;
};

// end -->
</script></form>
HTML;
	
	return $sort;
}

function compare_tags($a, $b) {
	
	if( $a['tag'] == $b['tag'] ) return 0;
	
	return strcasecmp( $a['tag'], $b['tag'] );

}

function convert_unicode($t, $to = 'windows-1251') {

	$to = strtolower( $to );

	if( $to == 'utf-8' ) {
		
		return $t;
	
	} else {

		if( function_exists( 'mb_convert_encoding' ) ) {

			$t = mb_convert_encoding( $t, $to, "UTF-8" );

		} elseif( function_exists( 'iconv' ) ) {

			$t = iconv( "UTF-8", $to . "//IGNORE", $t );

		} else $t = "The library iconv AND mbstring is not supported by your server";
	
	}

	return $t;
}

function check_smartphone() {

	if ( $_SESSION['mobile_enable'] ) return true;

	$phone_array = array('iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'mobile windows', 'cellphone', 'opera mobi', 'operamobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'symbos', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'windows phone');
	$agent = strtolower( $_SERVER['HTTP_USER_AGENT'] );

	foreach ($phone_array as $value) {

		if ( strpos($agent, $value) !== false ) return true;

	}

	return false;

}

function build_js($js, $config) {

	$js_array = array();

	if ($config['js_min'] AND version_compare(PHP_VERSION, '5.1.0', '>') ) {

		$js_array[] = "<script type=\"text/javascript\" src=\"{$config['http_home_url']}engine/classes/min/index.php?charset={$config['charset']}&amp;g=general&amp;12\"></script>";

		if ( count($js) ) $js_array[] = "<script type=\"text/javascript\" src=\"{$config['http_home_url']}engine/classes/min/index.php?charset={$config['charset']}&amp;f=".implode(",", $js)."&amp;12\"></script>";

		return implode("\n", $js_array);

	} else {

		$default_array = array (
			'engine/classes/js/jquery.js',
			'engine/classes/js/jqueryui.js',
			'engine/classes/js/dle_js.js',
		);

		$js = array_merge($default_array, $js);

		foreach ($js as $value) {
		
			$js_array[] = "<script type=\"text/javascript\" src=\"{$config['http_home_url']}{$value}\"></script>";
		
		}

		return implode("\n", $js_array);
	}
}

function check_static($matches=array()) {
	global $dle_module;

	$names = $matches[2];
	$block = $matches[3];

	if ($matches[1] == "static") $action = true; else $action = false;

	$names = str_replace(" ", "", $names );
	$names = explode( ',', $names );

	if ( isset($_GET['page']) ) $page = trim($_GET['page']); else $page = "";
	
	if( $action ) {
			
		if( in_array( $page, $names ) AND $dle_module == "static" ) {
				
			return $block;
		}
		
	} else {
			
		if( !in_array( $page, $names ) OR $dle_module != "static") {
				
			return $block;
		}
		
	}
	
	return "";
}


function dle_strlen($value, $charset ) {

	if ( strtolower($charset) == "utf-8") return iconv_strlen($value, "utf-8");
	else return strlen($value);

}

function dle_substr($str, $start, $length, $charset ) {

	if ( strtolower($charset) == "utf-8") return iconv_substr($str, $start, $length, "utf-8");
	else return substr($str, $start, $length);

}

function dle_strrpos($str, $needle, $charset ) {

	if ( strtolower($charset) == "utf-8") return iconv_strrpos($str, $needle, "utf-8");
	else return strrpos($str, $needle);

}

function check_allow_login($ip, $max ) {
	global $db;

	$block_date = time()-1200;

	$row = $db->super_query( "SELECT * FROM " . PREFIX . "_login_log WHERE ip='{$ip}'" );

	if ( $row['count'] AND $row['date'] < $block_date ) $db->query( "DELETE FROM " . PREFIX . "_login_log WHERE ip = '{$ip}'" );

	if ($row['count'] >= $max AND $row['date'] > $block_date ) return false;
	else return true;

} 

function detect_encoding($string) {  
  static $list = array('utf-8', 'windows-1251');
   
  foreach ($list as $item) {
     $sample = iconv($item, $item, $string);
     if (md5($sample) == md5($string))
       return $item;
   }
   return null;
}
 
function get_ip() {

	$ip_split = explode( ".", $_SERVER['REMOTE_ADDR'] );
	$_IP = array();
	
	for($i = 0; $i < 4; $i++) {
		$_IP[] = intval($ip_split[$i]);
	}
	
	return implode(".", $_IP);
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

?>