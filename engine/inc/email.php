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
 Файл: email.php
-----------------------------------------------------
 Назначение: шаблоны писем
=====================================================
*/
if( !defined( 'DATALIFEENGINE' ) OR !defined( 'LOGGED_IN' ) ) {
	die( "Hacking attempt!" );
}

if( $member_id['user_group'] != 1 ) {
	msg( "error", $lang['addnews_denied'], $lang['db_denied'] );
}

if( $action == "save" ) {
	
	if( $_REQUEST['user_hash'] == "" or $_REQUEST['user_hash'] != $dle_login_hash ) {
		
		die( "Hacking attempt! User not found" );
	
	}
	
	$find = array ("<", ">");
	$replace = array ("&lt;", "&gt;");
	
	$reg_mail_text = $db->safesql(str_replace( $find, $replace, $_POST['reg_mail_text'] ) );
	$feed_mail_text = $db->safesql(str_replace( $find, $replace, $_POST['feed_mail_text'] ) );
	$lost_mail_text = $db->safesql(str_replace( $find, $replace, $_POST['lost_mail_text'] ) );
	$new_news_text = $db->safesql(str_replace( $find, $replace, $_POST['new_news_text'] ) );
	$new_comments_text = $db->safesql(str_replace( $find, $replace, $_POST['new_comments_text'] ) );
	$new_pm_text = $db->safesql(str_replace( $find, $replace, $_POST['new_pm_text'] ) );
	
	$db->query( "UPDATE " . PREFIX . "_email set template='$reg_mail_text' where name='reg_mail'" );
	$db->query( "UPDATE " . PREFIX . "_email set template='$feed_mail_text' where name='feed_mail'" );
	$db->query( "UPDATE " . PREFIX . "_email set template='$lost_mail_text' where name='lost_mail'" );
	$db->query( "UPDATE " . PREFIX . "_email set template='$new_news_text' where name='new_news'" );
	$db->query( "UPDATE " . PREFIX . "_email set template='$new_comments_text' where name='comments'" );
	$db->query( "UPDATE " . PREFIX . "_email set template='$new_pm_text' where name='pm'" );
	$db->query( "INSERT INTO " . USERPREFIX . "_admin_logs (name, date, ip, action, extras) values ('".$db->safesql($member_id['name'])."', '{$_TIME}', '{$_IP}', '31', '')" );
	
	msg( "info", $lang['mail_addok'], $lang['mail_addok_1'], "?mod=email" );

} else {
	
	echoheader( "<i class=\"icon-envelope\"></i>".$lang['opt_email'], $lang['header_m_1'] );
	
	$db->query( "SELECT name, template FROM " . PREFIX . "_email" );
	
	while ( $row = $db->get_row() ) {
		$$row['name'] = stripslashes( $row['template'] );
	}
	$db->free();
	
	echo <<<HTML
<form action="$PHP_SELF?mod=email&action=save" method="post">
<input type="hidden" name="user_hash" value="$dle_login_hash" />
<div class="box">
  <div class="box-header">
    <div class="title">{$lang['opt_email']}</div>
  </div>
  <div class="box-content">

	<div class="row box-section">
	

<div class="accordion" id="accordion">

  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
        {$lang['mail_info']}
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner padded">
        {$lang['mail_reg_info']}<br /><br />
		<textarea rows="15" style="width:100%;" name="reg_mail_text">{$reg_mail}</textarea>
      </div>
    </div>
  </div>
  
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        {$lang['mail_info_1']}
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner padded">
        {$lang['mail_feed_info']}<br /><br />
		<textarea rows="15" style="width:100%;" name="feed_mail_text">{$feed_mail}</textarea>
      </div>
    </div>
  </div>

  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
        {$lang['mail_info_2']}
      </a>
    </div>
    <div id="collapseThree" class="accordion-body collapse">
      <div class="accordion-inner padded">
        {$lang['mail_lost_info']}<br /><br />
		<textarea rows="15" style="width:100%;" name="lost_mail_text">{$lost_mail}</textarea>
      </div>
    </div>
  </div>

  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        {$lang['mail_info_3']}
      </a>
    </div>
    <div id="collapse4" class="accordion-body collapse">
      <div class="accordion-inner padded">
        {$lang['mail_news_info']}<br /><br />
		<textarea rows="15" style="width:100%;" name="new_news_text">{$new_news}</textarea>
      </div>
    </div>
  </div>
  
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        {$lang['mail_info_4']}
      </a>
    </div>
    <div id="collapse5" class="accordion-body collapse">
      <div class="accordion-inner padded">
        {$lang['mail_comm_info']}<br /><br />
		<textarea rows="15" style="width:100%;" name="new_comments_text">{$comments}</textarea>
      </div>
    </div>
  </div>
  
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
        {$lang['mail_info_6']}
      </a>
    </div>
    <div id="collapse6" class="accordion-body collapse">
      <div class="accordion-inner padded">
        {$lang['mail_pm_info']}<br /><br />
		<textarea rows="15" style="width:100%;" name="new_pm_text">{$pm}</textarea>
      </div>
    </div>
  </div>

 </div>

	  
	</div>
	<div class="row box-section">
	<input type="submit" value="{$lang['user_save']}" class="btn btn-green">
	</div>
   </div>
</div>

</form>
HTML;
	
	echofooter();
}
?>