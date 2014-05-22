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
Файл: links.php
-----------------------------------------------------
Назначение: Модуль перекрестных ссылок
=====================================================
*/

if( ! defined( 'DATALIFEENGINE' ) ) {
	die( "Hacking attempt!" );
}

$replace_links = array ();

//################# Определение ссылок
$links = get_vars( "links" );

if( !is_array( $links ) ) {
	$links = array ();
	
	$db->query( "SELECT * FROM " . PREFIX . "_links" );
	
	while ( $row_b = $db->get_row() ) {
		
		$links[$row_b['id']] = array ();
		
		foreach ( $row_b as $key => $value ) {
			$links[$row_b['id']][$key] = stripslashes( $value );
		}
	
	}
	set_vars( "links", $links );
	$db->free();
}

function replace_links ( $source, $links ) {

	if( count( $links['find'] ) ) {
	
		$source = preg_split( '((>)|(<))', $source, - 1, PREG_SPLIT_DELIM_CAPTURE );
		$count = count( $source );
			
		for($i = 0; $i < $count; $i ++) {

			if( $source[$i] == "<" AND substr($source[$i+1], 0, 5) == 'title')  {
				$i = $i+3;
				continue;
			}

			if( $source[$i] == "<" AND strtolower(substr($source[$i+1], 0, 2)) == 'a ')  {
				$i = $i+3;
				continue;
			}

			if( $source[$i] == "<" or $source[$i] == "[" ) {
				$i ++;
				continue;
			}
				
			if( $source[$i] != "" ) {
	
				$source[$i] = preg_replace( $links['find'], $links['replace'], $source[$i] );
	
			}
		}
				
		$source = join( "", $source );

		return $source;

	} else {

		return $source;

	}
}

if( count( $links ) ) {

	$find = "";
	$replace = "";

	if ( $config['charset'] == "utf-8" ) $register .= "u";

	$host = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	foreach ( $links as $value ) {
		$words = explode("(", $value['word']);
		$register ="";

		if ($host AND $value['link'] AND $host == $value['link']) continue;

		if ( !$value['only_one'] ) $register .="i";
		if ( $config['charset'] == "utf-8" ) $register .= "u";

		if ( !substr_count ($value['word'], "(") ) { 

			$find = "#(^|\b|\s|\<br \/\>)(" . preg_quote( $value['word'], "#" ) . ")(\b|\s|!|\?|\.|,|$)#".$register;
			$replace = "\\1<a href=\"{$value['link']}\">\\2</a>\\3";

		} else {

			$words = preg_quote( $value['word'], "#" );
			$words = str_replace( '\|', "|", $words);
			$words = str_replace( '\(', ")(", $words);
			$words = str_replace( '\)', ")(", $words);

			if (substr ( $words, - 1, 1 ) == '(') $words = substr ( $words, 0, - 1 );
			if (substr ( $words, - 1, 1 ) != ')') $words .= ')';

			$words = '('.$words;

			$scount = substr_count ($words, "(");
			$rp = "";

			for ($i = 2; $i <= $scount+1; $i++) {
			    $rp .= "\\".$i;
			}

			$find = "#(^|\b|\s|\<br \/\>){$words}(\b|\s|!|\?|\.|,|$)#".$register;
			$replace = "\\1<a href=\"{$value['link']}\">{$rp}</a>\\{$i}";

		}


		if ( $value['replacearea'] == 2 ) {
	
			$replace_links['news']['find'][] = $find;
			$replace_links['news']['replace'][] = $replace;
			$replace_links['comments']['find'][] = $find;
			$replace_links['comments']['replace'][] = $replace;
	
		} elseif( $value['replacearea'] == 3){
	
			$replace_links['news']['find'][] = $find;
			$replace_links['news']['replace'][] = $replace;
	
		} elseif( $value['replacearea'] == 4){
	
			$replace_links['comments']['find'][] = $find;
			$replace_links['comments']['replace'][] = $replace;
	
		} else {
	
			$replace_links['all']['find'][] = $find;
			$replace_links['all']['replace'][] = $replace;
	
		}
	}

	unset ($links);

}
?>