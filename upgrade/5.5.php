<?php

if( ! defined( 'DATALIFEENGINE' ) ) {
	die( "Hacking attempt!" );
}


$config['version_id'] = "5.7";
$config['mail_news'] = "0";
$config['mail_comments'] = "0";
$config['key'] = "";

$handler = fopen(ENGINE_DIR.'/data/config.php', "w") or die("��������, �� ���������� �������� ���������� � ���� <b>.engine/data/config.php</b>.<br />��������� ������������ �������������� CHMOD!");
fwrite($handler, "<?PHP \n\n//System Configurations\n\n\$config = array (\n\n");
foreach($config as $name => $value)
{
	fwrite($handler, "'{$name}' => \"{$value}\",\n\n");
}
fwrite($handler, ");\n\n?>");
fclose($handler);

$config_dbhost = DBHOST;
$config_dbname = DBNAME;
$config_dbuser = DBUSER;
$config_dbpasswd = DBPASS;
$config_dbprefix = PREFIX;

$dbconfig = <<<HTML
<?PHP

define ("DBHOST", "{$config_dbhost}"); 

define ("DBNAME", "{$config_dbname}");

define ("DBUSER", "{$config_dbuser}");

define ("DBPASS", "{$config_dbpasswd}");  

define ("PREFIX", "{$config_dbprefix}"); 

define ("USERPREFIX", "{$config_dbprefix}"); 

\$db = new db;

?>
HTML;

$con_file = fopen(ENGINE_DIR.'/data/dbconfig.php', "w") or die("��������, �� ���������� �������� ���������� � ���� <b>.engine/data/dbconfig.php</b>.<br />��������� ������������ �������������� CHMOD!");
fwrite($con_file, $dbconfig);
fclose($con_file);

$tableSchema = array();

$tableSchema[] = "ALTER TABLE `" . PREFIX . "_vote` CHANGE `category` `category` VARCHAR( 200 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_pm` ADD `reply` TINYINT( 1 ) NOT NULL DEFAULT '0'";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_static` ADD `metadescr` VARCHAR( 200 ) NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_static` ADD `metakeys` TEXT NOT NULL DEFAULT ''";
$tableSchema[] = "ALTER TABLE `" . PREFIX . "_usergroups` ADD `icon` VARCHAR( 200 ) NOT NULL DEFAULT ''";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (4, 'new_news', '��������� �������������,\r\n\r\n���������� ��� � ���, ��� �� ����  {$config['http_home_url']} ���� ��������� �������, ������� � ������ ������ ������� ���������.\r\n\r\n------------------------------------------------\r\n������� ���������� � �������\r\n------------------------------------------------\r\n\r\n�����: {%username%}\r\n��������� �������: {%title%}\r\n���������: {%category%}\r\n���� ����������: {%date%}\r\n\r\n� ���������,\r\n\r\n������������� {$config['http_home_url']}')";
$tableSchema[] = "INSERT INTO " . PREFIX . "_email values (5, 'comments', '��������� �������������,\r\n\r\n���������� ��� � ���, ��� �� ����  {$config['http_home_url']} ��� �������� �����������.\r\n\r\n------------------------------------------------\r\n������� ���������� � �����������\r\n------------------------------------------------\r\n\r\n�����: {%username%}\r\n���� ����������: {%date%}\r\n������ �� �������: {%link%}\r\nIP �����: {%ip%}\r\n\r\n------------------------------------------------\r\n����� �����������\r\n------------------------------------------------\r\n\r\n{%text%}\r\n\r\n� ���������,\r\n\r\n������������� {$config['http_home_url']}')";

  foreach($tableSchema as $table) {
     $db->query ($table);
   }

@unlink(ENGINE_DIR.'/cache/system/category.php');
@unlink(ENGINE_DIR.'/cache/system/cron.php');

clear_cache();

msgbox("info","����������", "���������� ���� ������ � ������ <b>5.5</b> �� ������ <b>5.7</b> ������� ���������.<br />������� ����� ��� ����������� �������a ���������� �������.");
?>