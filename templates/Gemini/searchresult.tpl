[searchposts]
[fullresult]
<div class="base shortstory">
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

	<h3 class="btl">[full-link]{title}[/full-link]</h3>
	<p class="argcat"><i>���������: {link-category}</i></p>
	<div class="maincont">
		{short-story}
		<div class="clr"></div>
		[tags]<p class="basetags"><i>����� � ������: {tags}</i></p>[/tags]
	</div>
	<div class="mlink">
		<span class="argmore">[full-link]<b>���������</b>[/full-link]</span>
		[not-group=5]<span class="argedit">[edit]<i>�������������</i>[/edit]</span>[/not-group]
		<span class="argcoms"><i>������������: [com-link]{comments-num}[/com-link]</i></span>
	</div>
</div>
[/fullresult]
[shortresult]
<div class="searchitem">
	<h3>[full-link]{title}[/full-link]</h3>
	<b>[day-news]{date}[/day-news]</b> | {link-category} | �����: {author}
</div>
[/shortresult]
[/searchposts]
[searchcomments]
[fullresult]
<div class="basecont">
	<div class="bcomment">
		<div class="lcol">
			<span class="thide arcom">&lt;</span>
			<div class="avatar"><img src="{foto}" alt=""/></div>
			<h5>{author}</h5>
			<p>{date}</p>
		</div>
		<div class="rcol">
			<div class="combox">
				<script type="text/javascript">//<![CDATA[
				$(function(){ $("#cinfb{comment-id}").Button("#cinfc{comment-id}"); });
				//]]></script>
				<div class="infbtn">
					<span id="cinfb{comment-id}" class="thide" title="���������� � �����������">���������� � �����������</span>
					<div id="cinfc{comment-id}" class="infcont">
						<ul>
							<li><i>������: {group-name}</i></li>
							<li><i>ICQ: {icq}</i></li>
							[group=1]<li><i>{ip}</i></li>[/group]
							<li><i>�����������: {registration}</i></li>
							<li><i>������: [online]<img src="{THEME}/images/online.png" style="vertical-align: middle;" title="������������ ������" alt="������������ ������" />[/online][offline]<img src="{THEME}/images/offline.png" style="vertical-align: middle;" title="������������ offline" alt="������������ offline" />[/offline]</i></li>
							<li><i>����������: {news-num}</i></li>
							<li><i>������������: {comm-num}</i></li>
						</ul>
					</div>
				</div>
				[aviable=lastcomments]<h3 style="margin-bottom: 0.4em;">{news_title}</h3>[/aviable]
				{comment}
				[signature]<br clear="all" /><div class="signature">--------------------</div><div class="slink">{signature}</div><br />[/signature]
				<div class="comedit">
					[not-group=5]
					<span class="argreply">[fast]<b>����������</b>[/fast]</span>
					<span class="arg">[com-del]�������[/com-del]</span>
					<span class="arg">[com-edit]��������[/com-edit]</span>
					<span class="arg">[complaint]������[/complaint]</span>
					<span class="arg">[spam]����[/spam]</span>
					[group=1]<div class="selectmass">{mass-action}</div>[/group]
					[/not-group]
					<div class="clr"></div>
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>
[/fullresult]
[shortresult]
<div class="searchitem">
	<h3 style="margin-bottom: 0.4em;">{news_title}</h3>
	<b>{date}</b> | �����: {author}
</div>
[/shortresult]
[/searchcomments]