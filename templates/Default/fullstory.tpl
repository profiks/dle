{poll}
<div class="base fullstory">
	<div class="dpad">
		<h3 class="btl"><span id="news-title">{title}</span></h3>
		<div class="bhinfo">
		[not-group=5]
			<ul class="isicons reset">
				<li>[edit]<img src="{THEME}/dleimages/editstore.png" title="�������������" alt="�������������" />[/edit]</li>
				<li>{favorites}</li>
				<li>[complaint]<img src="{THEME}/images/complaint.png" title="�������� �� ������" alt="�������� �� ������" />[/complaint]</li>
			</ul>
		[/not-group]
			<span class="baseinfo radial">
				�����: {author} �� [day-news]{date}[/day-news]
			</span>
			[rating]<div class="ratebox"><div class="rate">{rating}</div></div>[/rating]
		</div>
		<div class="maincont">
			{full-story}
			<div class="clr"></div>
			[edit-date]<p class="editdate"><br /><i>������� ��������������: <b>{editor}</b> - {edit-date}
			<br />[edit-reason]�������: {edit-reason}[/edit-reason]</i></p>[/edit-date]
			[tags]<br /><p class="basetags"><i>����: {tags}</i></p>[/tags]
		</div>
		[pages]<div class="storenumber">{pages}</div>[/pages]
	</div>
	[related-news]<div class="related">
		<div class="dtop"><span><b>������ ������� �� ����:</b></span></div>	
		<ul class="reset">
			{related-news}
		</ul>
		<br />
	</div>[/related-news]
	<div class="mlink">
		<span class="argback"><a href="javascript:history.go(-1)"><b>���������</b></a></span>
		<span class="argviews"><span title="����������: {views}"><b>{views}</b></span></span>
		<span class="argcoms">[com-link]<span title="������������: {comments-num}"><b>{comments-num}</b></span>[/com-link]</span>
		<div class="mlarrow">&nbsp;</div>
		<p class="lcol argcat">���������: {link-category}</p>
	</div>
	[group=5]
	<div class="clr berrors" style="margin: 0;">
		��������� ����������, �� ����� �� ���� ��� �������������������� ������������.<br />
		�� ����������� ��� <a href="/index.php?do=register">������������������</a> ���� ����� �� ���� ��� ����� ������.
	</div>
	[/group]
</div>
<div class="pheading">
	<h2 class="lcol">�����������:</h2>
	<a class="addcombtn" href="#" onclick="$('#addcform').toggle();return false;"><b>�������� �����������</b></a>
	<div class="clr"></div>
</div>
{addcomments}
{comments}
{navigation}