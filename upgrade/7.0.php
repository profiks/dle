<?php

if( ! defined( 'DATALIFEENGINE' ) ) {
	die( "Hacking attempt!" );
}

$config['version_id'] = "7.2";
$config['allow_quick_wysiwyg'] = "0";
$config['sec_addnews'] = "1";
$config['mail_pm'] = "0";
$config['allow_change_sort'] = "0";
$config['registration_rules'] = "0";
$config['allow_tags'] = "0";


$tableSchema = array();

$tableSchema[] = "DROP TABLE IF EXISTS " . PREFIX . "_tags";
$tableSchema[] = "CREATE TABLE " . PREFIX . "_tags (
  `id` INT(11) NOT NULL auto_increment,
  `news_id` INT(11) NOT NULL default '0',
  `tag` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `news_id` (`news_id`),
  KEY `tag` (`tag`)
) ENGINE=MyISAM /*!40101 DEFAULT CHARACTER SET " . COLLATE . " COLLATE " . COLLATE . "_general_ci */";

$tableSchema[] = "ALTER TABLE `" . PREFIX . "_rssinform` ADD `rss_date_format` VARCHAR( 20 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_files` CHANGE `date` `date` VARCHAR( 15 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_images` CHANGE `date` `date` VARCHAR( 15 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_banned` CHANGE `date` `date` VARCHAR( 15 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_post` ADD `editdate` VARCHAR( 15 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_post` ADD `editor` VARCHAR( 40 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_post` ADD `reason` VARCHAR( 255 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_post` ADD `view_edit` TINYINT( 1 ) NOT NULL DEFAULT '0'";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_post` ADD `tags` VARCHAR( 255 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_banned` CHANGE `ip` `ip` VARCHAR( 50 ) NOT NULL";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_usergroups` ADD `allow_image` TINYINT( 1 ) NOT NULL DEFAULT '0'";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_usergroups` ADD `news_sec_code` TINYINT( 1 ) NOT NULL DEFAULT '1'";

$tableSchema[] = "ALTER TABLE `" . PREFIX . "_users` ADD `restricted` TINYINT( 1 ) NOT NULL DEFAULT '0'";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_users` ADD `restricted_days` SMALLINT( 4 ) NOT NULL DEFAULT '0'";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_users` ADD `restricted_date` VARCHAR( 20 ) NOT NULL DEFAULT ''";

$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (6, 'pm', '��������� {%username%},\r\n\r\n���������� ��� � ���, ��� �� �����  $url ��� ���� ���������� ������������ ���������.\r\n\r\n------------------------------------------------\r\n������� ���������� � ���������\r\n------------------------------------------------\r\n\r\n�����������: {%fromusername%}\r\n����  ���������: {%date%}\r\n���������: {%title%}\r\n\r\n------------------------------------------------\r\n����� ���������\r\n------------------------------------------------\r\n\r\n{%text%}\r\n\r\n� ���������,\r\n\r\n������������� $url')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_static (`name`, `descr`, `template`, `allow_br`, `allow_template`, `grouplevel`, `tpl`, `metadescr`, `metakeys`, `views`, `template_folder`) VALUES ('dle-rules-page', '����� ������� �� �����', '<b>����� ������� ��������� �� �����:</b><br /><br />������ � ����, ��� �� ����� �������� ����� �����, ������ ������� � ��������, � ��� ��� �������� ������������� ������������ ������ �����, ������� ���� �� ����� ����� ��� ���������� ����� ��������������� ��� � ���������� �������. �� ������������ ����������� ��������� ��������� �������, ��� ������ � ��� ����� ����� ����, �� �������� ��� � ��� ����� � ������� ������� ���� ����� ���������� � ��������������.<br /><br />������ � ����, ��� �� ����� ����� ����� ����� ���� ����������� �� ���� ����������� �����. �� ���� ����������� �� ��������� � ����������, ��� ������ ������. ���� ���� ��������� - ����������� � ������� ��� ����������� (�������������� ������� �����������). ����������� ������ ����������� ��������� � ��� ����� �� ����� ������ ��������� � ������ ������������ ��������������. <b>� ��� ������ �������� ������, ����������� � ������������ ������������.</b> ������� ���������� ��� �� ��������� � �� ������� ������� ��� ���� ����� �������� � �����������.<br /><br /><b>�� ����� ������ ���������:</b> <br /><br />- ���������, �� ����������� � ���������� ������ ��� � ��������� ����������<br />- ����������� � ������ � ����� ����������� �����<br />- � ������������ ����������� ���������, ���������� ������������� �������, ��������� ������������ �����������, ����������� ��������������� �����<br />- ����, � ����� ������� ����� ������� � �����, ���� ��������, ��� ��� �������, �� ����������� � ��������� ���������� ������<br /><br />������� ����� ������� ���� ����� � ����, �� ������� �� � ������ �������� �������� ���������� � ��������� ���� �����. ������������� ����� ��������� �� ����� ����� ������� ����������� ��� ����� ������������, ���� ��� �� ������������� ������ �����������.<br /><br />��� ��������� ������ ��� ����� ���� ���� <b>��������������</b>. � ��������� ������� ����� ���� ��� ��� <b>��� ��������������</b>. �� �������� ������ ���� ������ ��������������.<br /><br /><b>�����������</b> ��������������� ��� ����������� ����� �������� <b>�����</b> - �������� ����� ����.<br /><br /><div align=\"center\">{ACCEPT-DECLINE}</div>', 1, 1, 'all', '', '����� �������', '����� �������', 0, '')";
$tableSchema[] = "UPDATE " . PREFIX . "_rssinform SET rss_date_format='j F Y H:i'";

if (!$config['news_captcha']) {

	$tableSchema[] = "UPDATE " . PREFIX . "_usergroups SET news_sec_code='0'";

}

$tableSchema[] = "ALTER TABLE `" . PREFIX . "_post` ADD INDEX ( `comm_num` )";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_post`  ADD INDEX ( `tags` )";


  foreach($tableSchema as $table) {
     $db->query ($table);
   }


$handler = fopen(ENGINE_DIR.'/data/config.php', "w") or die("��������, �� ���������� �������� ���������� � ���� <b>.engine/data/config.php</b>.<br />��������� ������������ �������������� CHMOD!");
fwrite($handler, "<?PHP \n\n//System Configurations\n\n\$config = array (\n\n");
foreach($config as $name => $value)
{
	fwrite($handler, "'{$name}' => \"{$value}\",\n\n");
}
fwrite($handler, ");\n\n?>");
fclose($handler);

@unlink(ENGINE_DIR.'/cache/system/usergroup.php');
@unlink(ENGINE_DIR.'/cache/system/vote.php');
@unlink(ENGINE_DIR.'/cache/system/banners.php');
@unlink(ENGINE_DIR.'/cache/system/category.php');
@unlink(ENGINE_DIR.'/cache/system/banned.php');
@unlink(ENGINE_DIR.'/cache/system/cron.php');
@unlink(ENGINE_DIR.'/data/snap.db');

clear_cache();

if ($db->error_count) $error_info = "����� ������������� ��������: <b>".$db->query_num."</b> ��������� ��������� ��������: <b>".$db->error_count."</b>. �������� ��� ��� ��������� �����."; else $error_info = "";

msgbox("info","����������", "���������� ���� ������ � ������ <b>7.0</b> �� ������ <b>7.2</b> ������� ���������.<br /><br />{$error_info}<br />������� ����� ��� ����������� �������a ���������� �������.");
?>