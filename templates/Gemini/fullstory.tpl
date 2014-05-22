<div class="base fullstory">
	<script type="text/javascript">//<![CDATA[
	$(function(){ $("#infb{news-id}").Button("#infc{news-id}"); });
	//]]></script>
	<div class="infbtn">
		<span id="infb{news-id}" class="thide" title="���������� � �������">���������� � �������</span>
		<div id="infc{news-id}" class="infcont">
			<ul>
				<li><i>����������: {views}</i></li>
				<li><i>�����: {author}</i></li>
				<li><i>����: {date}</i></li>
			</ul>
			[edit-date]<div class="editdate"><i>�������: <b>{editor}</b>[edit-reason]<br />�������: {edit-reason}[/edit-reason]</i></div>[/edit-date]
			[rating]<div class="ratebox"><div class="rate">{rating}</div></div>[/rating]
		</div>
	</div>
	<span class="argbox">[day-news]<i>{date}</i>[/day-news]</span>
	<h3 class="btl"><span id="news-title">{title}</span></h3>
	<p class="argcat"><i>���������: {link-category}</i></p>
	<div class="maincont">
		{full-story}
		<div class="clr"></div>
		[tags]<p class="basetags"><i>����� � ������: {tags}</i></p>[/tags]
	</div>
	<div class="storenumber">{pages}</div>
	<div class="mlink">
		<span class="argback"><a href="javascript:history.go(-1)"><b>���������</b></a></span>
		[not-group=5]<span class="argedit">[edit]<i>�������������</i>[/edit]</span>[/not-group]
		<span class="argcoms"><i>������������: {comments-num}</i></span>
	</div>
	<div class="linesbg related">
		<h4 class="btl"><span>��� ����</span> �����������:</h4>	
		<ul class="reset">
			{related-news}
		</ul>
		<div class="frbtns">
			{favorites}
			[print-link]<img class="printlink" src="{THEME}/images/spacer.gif" alt="�����������" title="�����������" />[/print-link]
		</div>
	</div>
</div>
[group=5]
<div class="berrors"><div class="berrors">
	��������� ����������, �� ����� �� ���� ��� �������������������� ������������.<br />
	�� ����������� ��� <a href="/index.php?do=register">������������������</a> ���� ����� �� ���� ��� ����� ������.
</div></div>
[/group]
<div id="tabbs">
	<ul class="reset tabmenu">
		<li><a class="selected" href="#tabln1"><b>����������� ({comments-num})</b></a></li>
		[poll]<li><a href="#tabln2"><b>����� � ������</b></a></li>[/poll]
	</ul>
	<div class="tabcont" id="tabln1">
		{comments}
		{navigation}
		{addcomments}
	</div>
	[poll]<div class="tabcont" id="tabln2">
		{poll}
	</div>[/poll]
</div>