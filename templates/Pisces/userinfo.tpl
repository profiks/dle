<div class="dpad">
	<h2 class="heading">������������: {usertitle}</h2>
	<div class="basecont">
		<div class="userinfo">
			<div class="lcol">
				<div class="avatar"><img src="{foto}" alt=""/><div class="rateui">{rate}</div></div>
				<ul class="reset small">
					<li class="clr">{email}</li>
					[not-group=5]<li>{pm}</li>[/not-group]
				</ul>
			</div>
			<div class="rcol">
				<ul>
					<li><span class="grey">������ ���:</span> <b>{fullname}</b></li>
					<li><span class="grey">������:</span> {status} [time_limit]&nbsp;� ������ ��: {time_limit}[/time_limit]</li>
					<li><span class="grey">ICQ:</span> <b>{icq}</b></li>
				</ul>
				<ul class="ussep">
					<li><span class="grey">���������� ����������:</span> <b>{news-num}</b> [{news}][rss]<img src="{THEME}/images/rss.png" alt="rss" style="vertical-align: middle; margin-left: 5px;" />[/rss]</li>
					<li><span class="grey">���������� ������������:</span> <b>{comm-num}</b> [{comments}]</li>
					<li><span class="grey">���� �����������:</span> <b>{registration}</b></li>
					<li><span class="grey">��������� ���������:</span> <b>{lastdate}</b></li>
					<li><span class="grey">������:</span> [online]<img src="{THEME}/images/online.png" style="vertical-align: middle;" title="������������ ������" alt="������������ ������" />[/online][offline]<img src="{THEME}/images/offline.png" style="vertical-align: middle;" title="������������ offline" alt="������������ offline" />[/offline]</li>
				</ul>
				<ul class="ussep">
					<li><span class="grey">����� ����������:</span> {land}</li>
					<li><span class="grey">������� � ����:</span> {info}</li>
				</ul>
				<span class="small">[not-logged] [ {edituser} ] [/not-logged]</span>
			</div>
			<div class="clr"></div>
		</div>
	</div>
</div>
<br />
[not-logged]
<div id="options" style="display:none;">
	<br />
		<div class="baseform">
			<div class="dcont"><h2 class="heading">�������������� �������</h2></div>
			<table class="tableform">
				<tr>
					<td class="label">���� ���:</td>
					<td><input type="text" name="fullname" value="{fullname}" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">��� E-Mail:</td>
					<td><input type="text" name="email" value="{editmail}" class="f_input" /><br />
					<div class="checkbox">{hidemail}</div>
					<div class="checkbox"><input type="checkbox" id="subscribe" name="subscribe" value="1" /> <label for="subscribe">���������� �� ����������� ��������</label></div></td>
				</tr>
				<tr>
					<td class="label">����� ����������:</td>
					<td><input type="text" name="land" value="{land}" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">������ ������������ �������������:</td>
					<td>{ignore-list}</td>
				</tr>
				<tr>
					<td class="label">����� ICQ:</td>
					<td><input type="text" name="icq" value="{icq}" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">������ ������:</td>
					<td><input type="password" name="altpass" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">����� ������:</td>
					<td><input type="password" name="password1" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label">���������:</td>
					<td><input type="password" name="password2" class="f_input" /></td>
				</tr>
				<tr>
					<td class="label" valign="top">���������� �� IP:<br />��� IP: {ip}</td>
					<td>
					<div><textarea name="allowed_ip" style="width:98%;" rows="5" class="f_textarea">{allowed-ip}</textarea></div>
					<div>
						<span class="small" style="color: #cb1919;">
						* ��������! ������ ��������� ��� ��������� ������ ���������.
						������ � ������ �������� ����� �������� ������ � ���� IP-������ ��� �������, ������� �� �������.
						�� ������ ������� ��������� IP �������, �� ������ ������ �� ������ �������.
						<br />
						������: 192.48.25.71 ��� 129.42.*.*</span>
					</div>
					</td>
				</tr>
				<tr>
					<td class="label">������:</td>
					<td>��������� � ���������: <input type="file" name="image" class="f_input" /><br /><br />
					������ <a href="http://www.gravatar.com/" target="_blank">Gravatar</a>: <input type="text" name="gravatar" value="{gravatar}" class="f_input" /> (������� E-mail �� ������ �������)
					<br /><br /><div class="checkbox"><input type="checkbox" name="del_foto" id="del_foto" value="yes" /> <label for="del_foto">������� ������</label></div>
					</td>
				</tr>
				<tr>
					<td class="label">� ����:</td>
					<td><textarea name="info" style="width:98%;" rows="5" class="f_textarea">{editinfo}</textarea></td>
				</tr>
				<tr>
					<td class="label">�������:</td>
					<td><textarea name="signature" style="width:98%;" rows="5" class="f_textarea">{editsignature}</textarea></td>
				</tr>
				{xfields}
			</table>
			<div class="fieldsubmit">
				<input class="fbutton" type="submit" name="submit" value="���������" />
				<input name="submit" type="hidden" id="submit" value="submit" />
			</div>
		</div>
</div>
[/not-logged]