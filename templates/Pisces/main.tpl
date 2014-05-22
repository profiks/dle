<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
{headers}
<link rel="shortcut icon" href="{THEME}/images/favicon.ico" />
<link href="{THEME}/style/styles.css" type="text/css" rel="stylesheet" />
<link href="{THEME}/style/engine.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{THEME}/js/libs.js"></script>
</head>
<body>
{AJAX}
<div class="wwide pagebg">
	<div id="headbar">
		<div id="header">
			<div class="wrapper">
				<div class="container">
					<h1><a class="thide" href="/index.php" title="DataLife Engine - Softnews Media Group">DataLife Engine - Softnews Media Group</a></h1>
					<div class="loginbox">{login}</div>
					<div class="headlinks">
						<ul class="reset">
							<li><a href="/index.php">�������</a></li>
							<li><a href="/index.php?do=search">�����</a></li>
							<li><a href="/index.php?do=feedback">��������</a></li>
							<li><a href="/rss.xml">RSS</a></li>
							<li><a href="#">Twitter</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="speedbar">
			<div class="wrapper">
				<div class="container">
					{speedbar}
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div id="toolbar" class="container">
			{include file="topmenu.tpl"}
			<form method="post" action=''>
				<input type="hidden" name="do" value="search" />
				<input type="hidden" name="subaction" value="search" />
				<ul class="searchbar reset">
					<li class="lfield"><input id="story" name="story" value="�����..." onblur="if(this.value=='') this.value='�����...';" onfocus="if(this.value=='�����...') this.value='';" type="text" /></li>
					<li class="lbtn"><input title="�����" alt="�����" type="image" src="{THEME}/images/spacer.gif" /></li>
				</ul>
			</form>
		</div>
		{include file="slider.tpl"}
		<div class="shadlr"><div class="shadlr">
			<div class="container">
				<div id="vseptop" class="wsh"><div class="wsh">&nbsp;</div></div>
				<div class="vsep"><div class="vsep">
					<div id="midside" class="rcol">
						<div class="hban"><div class="hban">
							<div class="dpad">{banner_header}</div>
						</div></div>
						[sort]<div class="dpad"><div class="sortn"><div class="sortn">{sort}</div></div></div>[/sort]
						{info}
						{content}
					</div>
					<div id="sidebar" class="lcol">
						{include file="sidebar.tpl"}
					</div>
					<div class="clr"></div>
				</div></div>
				<div id="vsepfoot" class="wsh"><div class="wsh">&nbsp;</div></div>
			</div>
		</div></div>
	</div>
</div>
<div class="wwide footbg">
	<div class="wrapper">
		<div class="container">
			<div class="ftbar"><div class="ftbar">
				<ul id="fmenu" class="reset">
					<li><a href="/index.php">������� ��������</a></li>
					[group=5]<li><a href="/index.php?do=register">�����������</a></li>[/group]
					[not-group=5]<li><a href="/addnews.html">�������� �������</a></li>[/not-group]
					<li><a href="/newposts/">����� �� �����</a></li>
					<li><a href="/statistics.html">����������</a></li>
					<li><a href="http://dle-news.ru">���������</a></li>
				</ul>
				<div id="change-skin">
					<div class="change-skin">
						<div class="rcol">{changeskin}</div>
						<span class="lcol">����������:</span>
					</div>
				</div>
			</div></div>
			<div class="blocktags radial">
				{tags}
			</div>
		</div>
	</div>
</div>
<div class="wwide footer">
	<div class="wrapper">
		<div class="container">
			<h2><a class="thide" href="/index.php" title="DataLife Engine - Softnews Media Group">DataLife Engine - Softnews Media Group</a></h2>
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
		</div>
		<a href="#" onclick="scroll(0,0); return false" class="thide toptop">������</a>
	</div>
</div>
</body>
</html>