<script type="text/javascript">//<![CDATA[
$(function(){
	$("#slidemenu").UlMenu();
});
//]]></script>
<div id="rightmenu" class="block">
	<div class="dtop"><h4 class="btl"><span>���������</span> �� �����</h4></div>
	<ul id="slidemenu" class="reset">
		<li><a href="#">� �����</a></li>
		<li><a href="#">� ����</a></li>
		<li><span class="sublnk">���������</span></li>
		<li class="submenu">
			<ul>
				<li><a href="#">�������� 3.1</a></li>
				<li><a href="#">�������� 3.2</a></li>
				<li><a href="#">�������� 3.3</a></li>
			</ul>
		</li>
		<li><span class="sublnk">�������</span></li>
		<li class="submenu">
			<ul>
				<li><a href="#">�������� 4.1</a></li>
				<li><a href="#">�������� 4.2</a></li>
				<li><a href="#">�������� 4.3</a></li>
			</ul>
		</li>
		<li><a href="#">��������</a></li>
		<li><a href="#">�����</a></li>
		<li><a href="#">��������</a></li>
		<li><a href="#">���������</a></li>
	</ul>
	<div class="linesbg">
		<ul class="reset">
			<li><a href="http://dle-news.ru">��������� �������</a></li>
			<li><a href="/index.php?do=search&amp;mode=advanced">����������� �����</a></li>
			<li><a href="/index.php?do=lastnews">��� ��������� �������</a></li>
			<li><a href="/index.php?action=mobile">��������� ������ �����</a></li>
		</ul>
	</div>
</div>

<div id="popular" class="block redb">
	<div class="dcont">
		<h4 class="btl">���������� ������</h4>
		<ul>{topnews}</ul>
	</div>
	<div class="thide dbtm">------</div>
</div>

<div id="bcalendar" class="block">
	<div class="dtop"><h4 class="btl">���������</h4></div>
	<div class="dcont">{calendar}</div>
</div>

<div id="change-skin" class="block">
	<div class="change-skin">
		<div class="rcol">{changeskin}</div>
		<h4 class="btl">����������:</h4>
	</div>
</div>

{vote}

<div id="news-partner" class="block">
	<div class="dtop"><h4 class="btl"><span>�������</span> ���������</h4></div>
	{inform_dle}
</div>