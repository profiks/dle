[pmlist]
<h2 class="heading" style="margin: 0;">������ ���������</h2>
[/pmlist]
[newpm]
<h2 class="heading" style="margin: 0;">����� ���������</h2>
[/newpm]
[readpm]
<h2 class="heading" style="margin: 0;">���� ���������</h2>
[/readpm]
<div class="basecont">
<div class="pm_status">
	<div class="pm_status_head">��������� �����</div>
	<div class="pm_status_content">����� ������������ ��������� ��������� ��:
{pm-progress-bar}
{proc-pm-limit}% �� ������ ({pm-limit} ���������)
	</div>
</div>
<div style="padding-top:10px;">[inbox]�������� ���������[/inbox]<br /><br />
[outbox]������������ ���������[/outbox]<br /><br />
[new_pm]��������� ���������[/new_pm]</div>
<br />
<div class="clr"></div>
<br />
[pmlist]
<br /><div class="basecont">{pmlist}</div>
[/pmlist]
[newpm]
<br />
<div class="brdform">
	<div class="baseform">
		<table class="tableform">
			<tr>
				<td class="label">
					����:
				</td>
				<td><input type="text" name="name" value="{author}" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">
					����:<span class="impot">*</span>
				</td>
				<td><input type="text" name="subj" value="{subj}" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">
					���������:<span class="impot">*</span>
				</td>
				<td class="editorcomm">
				{editor}<br />
				<div class="checkbox"><input type="checkbox" id="outboxcopy" name="outboxcopy" value="1" /> <label for="outboxcopy">��������� ��������� � ����� "������������"</label></div>
				</td>
			</tr>
			[sec_code]
			<tr>
				<td class="label">
					Enter code:<span class="impot">*</span>
				</td>
				<td>
					<div>{sec_code}</div>
					<div><input type="text" name="sec_code" id="sec_code" style="width:115px" class="f_input" /></div>
				</td>
			</tr>
			[/sec_code]
			[recaptcha]
			<tr>
				<td class="label">
					������� ��� �����, ���������� �� �����������: <span class="impot">*</span>
				</td>
				<td>
					<div>{recaptcha}</div>
				</td>
			</tr>
			[/recaptcha]
			[question]
				<tr>
					<td class="label">
						������:
					</td>
					<td>
						<div>{question}</div>
					</td>
				</tr>
				<tr>
					<td class="label">
						�����:<span class="impot">*</span>
					</td>
					<td>
						<div><input type="text" name="question_answer" id="question_answer" class="f_input" /></div>
					</td>
				</tr>
			[/question]
		</table>
		<div class="fieldsubmit">
			<button type="submit" name="add" class="fbutton"><span>���������</span></button>
			<input type="button" class="fbutton" onclick="dlePMPreview()" title="��������" value="��������" />
		</div>	
	</div>
</div>
[/newpm]
[readpm]
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
				$(function(){ $("#pinfb").Button("#pinfc"); });
				//]]></script>
				<div class="infbtn">
					<span id="pinfb" class="thide" title="���������� � �������">���������� � �������</span>
					<div id="pinfc" class="infcont">
						<ul>
							<li><i>������: {group-name}</i></li>
							<li><i>ICQ: {icq}</i></li>
							<li><i>�����������: {registration}</i></li>
							<li><i>����������: {news-num}</i></li>
							<li><i>������������: {comm-num}</i></li>
							<li>������: [online]<img src="{THEME}/images/online.png" style="vertical-align: middle;" title="������������ ������" alt="������������ ������" />[/online][offline]<img src="{THEME}/images/offline.png" style="vertical-align: middle;" title="������������ offline" alt="������������ offline" />[/offline]</li>
						</ul>
					</div>
				</div>
				<h3 style="margin-bottom: 0.4em;">[reply]{subj}[/reply]</h3>
				{text}
				[signature]<br clear="all" /><div class="signature">--------------------</div><div class="slink">{signature}</div><br />[/signature]
				<div class="comedit">
					<span class="argreply">[reply]<b>��������</b>[/reply]</span>
					<span class="arg">[complaint]������������[/complaint]</span>
					<span class="arg">[ignore]������������[/ignore]</span>
					<span class="arg">[del]�������[/del]</span>
					<div class="clr"></div>
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>
[/readpm]
</div>