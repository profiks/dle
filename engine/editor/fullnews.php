<?php
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
 ����: fullnews.php
-----------------------------------------------------
 ����������: WYSIWYG ��� �����������
=====================================================
*/

if(!defined('DATALIFEENGINE'))
{
  die("Hacking attempt!");
}

if ($mod != "editnews") {
$row['id'] = "";
$row['autor'] = $member_id['name'];
}

if (!isset ($row['full_story'])) $row['full_story'] = "";

echo <<<HTML
<div class="editor-panel"><textarea id="full_story" name="full_story" class="wysiwygeditor" style="width:98%;height:300px;">{$row['full_story']}</textarea></div>
HTML;

?>