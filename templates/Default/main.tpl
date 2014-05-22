<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
{headers}
<link rel="shortcut icon" href="{THEME}/images/favicon.ico" />
<link media="screen" href="{THEME}/style/styles.css" type="text/css" rel="stylesheet" />
<link media="screen" href="{THEME}/style/engine.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{THEME}/js/libs.js"></script>
</head>
<body>
{AJAX}
<div id="toolbar" class="wwide">
	<div class="wrapper"><div class="dpad">
		<span class="htmenu"><a href="#" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://dle-news.ru');">������� ��������</a><span>|</span><a href="#" rel="sidebar" onclick="window.external.AddFavorite(location.href,'dle-news.ru'); return false;">�������� � ���������</a></span>
		{login}
	</div></div>
	<div class="shadow">&nbsp;</div>
</div>
<div class="wrapper">
	<div id="header" class="dpad">
		<h1><a class="thide" href="/index.php" title="DataLife Engine - Softnews Media Group">DataLife Engine - Softnews Media Group</a></h1>
		<form action="" name="searchform" method="post">
			<input type="hidden" name="do" value="search" />
			<input type="hidden" name="subaction" value="search" />
			<ul class="searchbar reset">
				<li class="lfield"><input id="story" name="story" value="�����..." onblur="if(this.value=='') this.value='�����...';" onfocus="if(this.value=='�����...') this.value='';" type="text" /></li>
				<li class="lbtn"><input title="�����" alt="�����" type="image" src="{THEME}/images/spacer.gif" /></li>
			</ul>
		</form>
		<div class="headlinks">
			<ul class="reset">
				<li><a href="/index.php">�������</a></li>
				[group=5]<li><a href="/index.php?do=register">�����������</a></li>[/group]
				<li><a href="/index.php?do=feedback">��������</a></li>
				<li><a href="/index.php?do=rules">�������</a></li>
			</ul>
		</div>
	</div>
	<div class="himage"><div class="himage"><div class="himage dpad">
		<h2>��������������������� ��������� ������,<br />
		��������������� ��� ����������� �����������<br />
		��� � ������ � ���������.</h2>
	</div></div></div>
	<div class="mbar" id="menubar"><div class="mbar"><div class="mbar dpad">
		<div class="menubar">
			{include file="topmenu.tpl"}
		</div>
	</div></div></div>
	<div class="wtop wsh"><div class="wsh"><div class="wsh">&nbsp;</div></div></div>
	<div class="shadlr"><div class="shadlr">
		<div class="container">
			<div class="vsep">
				<div class="vsep">
					<div id="midside" class="rcol">
						{speedbar}
						<div class="hbanner">
							<div class="dpad" align="center">{banner_header}</div>
							<div class="dbtm"><span class="thide">�� ������ �������</span></div>
						</div>
						[sort]<div class="sortn dpad"><div class="sortn">{sort}</div></div>[/sort]
						{info}
						{content}
					</div>
					<div id="sidebar" class="lcol">
						{include file="sidebar.tpl"}
					</div>
					<div class="clr"></div>
				</div>
			</div>
			<div class="footbox">
				<div class="rcol">
					<div class="btags">
						{tags}
						<div class="shadow">&nbsp;</div>
					</div>
				</div>
				<div class="lcol">
					<p>��������� ����������, ��<br />
					�������������� �������� ��������<br />
					<b>DataLife Engine</b>.<br />
					������� ������ 10.2.</p>
				</div>
			</div>
		</div>
	</div></div>
	<div class="wbtm wsh"><div class="wsh"><div class="wsh">&nbsp;</div></div></div>
</div>
<div id="footmenu" class="wwide">
	<div class="wrapper"><div class="dpad">
		<ul class="reset">
			<li><a href="/index.php">������� ��������</a></li>
			[group=5]<li><a href="/index.php?do=register">�����������</a></li>[/group]
			[not-group=5]<li><a href="/addnews.html">�������� �������</a></li>[/not-group]
			<li><a href="/newposts/">����� �� �����</a></li>
			<li><a href="/statistics.html">����������</a></li>
			<li><a href="http://dle-news.ru">��������� �������</a></li>
		</ul>
	</div></div>
	<div class="shadow">&nbsp;</div>
</div>
<div id="footer" class="wwide">
	<div class="wrapper"><div class="dpad">
		<span class="copyright">
			Copyright &copy; 2004-2014 <a href="http://dle-news.ru">SoftNews Media Group</a> All Rights Reserved.<br />
			Powered by DataLife Engine &copy; 2014
		</span>
		<div class="counts">
			<ul class="reset">
				<li><img src="{THEME}/images/count.png" alt="count 88x31px" /></li>
				<li><img src="{THEME}/images/count.png" alt="count 88x31px" /></li>
				<li><img src="{THEME}/images/count.png" alt="count 88x31px" /></li>
			</ul>
		</div>
		<div class="clr"></div>
	</div></div>
</div>
</body>
</html>