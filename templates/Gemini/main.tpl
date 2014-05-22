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
<div class="wwide topline">&nbsp;</div>
<div class="wrapper">
	<div id="header" class="container">
		<h1><a class="thide" href="/index.php" title="DataLife Engine - Softnews Media Group">DataLife Engine - Softnews Media Group</a></h1>
		<div class="rcol">
			<div class="loginbox">{login}</div>
			<span class="headsoc">
				<a class="twit thide" href="#">�� � Twitter</a>
				<a class="vkon thide" href="#">�� � vKontakte</a>
			</span>
			<div class="headlinks">
				<ul class="reset">
					<li><a href="/index.php"><i>�������</i></a></li>
					<li><a href="/index.php?do=rules"><i>�������</i></a></li>
					<li><a href="/index.php?do=feedback"><i>��������</i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="shadlr"><div class="shadlr">
		<div class="container">
			<div class="darkbg"><div id="menubar">
				<div class="lcol">
					<ul class="reset">
						<li><a href="#">� �����</a></li>
						<li><a href="#">� ����</a></li>
						<li><a href="#">���������</a></li>
						<li><a href="#">�������</a></li>
						<li><a href="#">��������</a></li>
						<li><a href="#">�����</a></li>
						<li><a href="#">��������</a></li>
						<li><a href="#">���������</a></li>
					</ul>
				</div>
				<form method="post" action=''>
					<input type="hidden" name="do" value="search" />
                    <input type="hidden" name="subaction" value="search" />
					<ul class="searchbar reset">
						<li class="lfield"><input id="story" name="story" value="�����..." onblur="if(this.value=='') this.value='�����...';" onfocus="if(this.value=='�����...') this.value='';" type="text" /></li>
						<li class="lbtn"><input title="�����" alt="�����" type="image" src="{THEME}/images/spacer.gif" /></li>
					</ul>
				</form>
			</div></div>
			<div class="body">
				{include file="slider.tpl"}
				<div class="vsep">
					<div id="midside" class="lcol">
						[aviable=showfull]{speedbar}[/aviable]
						<div align="center" class="hbanner">
							{banner_header}
						</div>
						[not-aviable=showfull][sort]<div class="sortn lines">{sort}</div>[/sort][/not-aviable]
						{info}
						{content}
					</div>
					<div id="sidebar" class="rcol">
						{include file="sidebar.tpl"}
					</div>
					<div class="clr"></div>
				</div>
			</div>
		</div>
	</div></div>
</div>
<div class="wwide footbg">
	<div class="wrapper">
		<div class="container">
			<div class="darkbg"><div id="footbox">
				<div class="fbox">
					<div class="dcont">
						<h4 class="btl"><span>���������</span></h4>
						<ul class="fmenu reset">
							<li><a href="/index.php">������� ��������</a></li>
							[group=5]<li><a href="/index.php?do=register">�����������</a></li>[/group]
							[not-group=5]<li><a href="/addnews.html">�������� �������</a></li>[/not-group]
							<li><a href="/newposts/">����� �� �����</a></li>
							<li><a href="/statistics.html">����������</a></li>
							<li><a href="http://dle-news.ru">��������� �������</a></li>
						</ul>
					</div>
				</div>
				<div class="fbox">
					<div class="dcont">
						<h4 class="btl"><span>������ �����</span></h4>
						{tags}
					</div>
				</div>
				<div class="fbox">
					<div class="dcont">
						<h4 class="btl"><span>����� ��������</span></h4>
						{archives}
					</div>
				</div>
				<div class="clr"></div>
				<span class="thide ribbon">^</span>
			</div></div>
			<div id="footer">
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
			<div class="shadow">&nbsp;</div>
		</div>
	</div>
</div>
</body>
</html>