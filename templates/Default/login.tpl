[not-group=5]
	<ul class="reset loginbox">
		<li class="loginava">
			<a href="{profile-link}">
				<img src="{foto}" alt="{login}" />
				<b>&nbsp;</b>
			</a>
		</li>
		<li class="loginbtn">
			<a class="lbn" id="logbtn" href="#"><b>{login}</b></a>
			<a class="thide lexit" href="{logout-link}">�����</a>
				<div id="logform" class="radial">
					<ul class="reset loginenter">
		[admin-link]<li><a href="{admin-link}" target="_blank"><b>�����������</b></a></li>[/admin-link]
					<li><a href="{profile-link}">��� �������</a></li>
					<li><a href="{favorites-link}">��� �������� ({favorite-count})</a></li>
					<li><a href="{newposts-link}">�������������</a></li>
					<li><a href="/?do=lastcomments">��������� �����������</a></li>
					<li><a href="{stats-link}">����������</a></li>
				</ul>
			</div>
		</li>
		<li class="lvsep"><a href="{addnews-link}">�������� �������</a></li>
		<li class="lvsep"><a class="radial" href="{pm-link}">{new-pm}</a><a href="{pm-link}">���������</a></li>
	</ul>
[/not-group]
[group=5]
	<ul class="reset loginbox">
		<li class="loginbtn">
			<a class="lbn" id="logbtn" href="#"><b>�����</b></a>
			<form method="post" action="">
				<div id="logform" class="radial">
					<ul class="reset">
						<li class="lfield"><label for="login_name">{login-method}</label><input type="text" name="login_name" id="login_name" /></li>
						<li class="lfield lfpas"><label for="login_password">������ (<a href="{lostpassword-link}">������?</a>):</label><input type="password" name="login_password" id="login_password" /></li>
						<li class="lfield lfchek"><input type="checkbox" name="login_not_save" id="login_not_save" value="1"/><label for="login_not_save">&nbsp;����� ���������</label></li>
						<li class="lbtn"><button class="fbutton" onclick="submit();" type="submit" title="�����"><span>�����</span></button></li>
					</ul>
					<input name="login" type="hidden" id="login" value="submit" />
				</div>
			</form>
		</li>
		<li class="lvsep"><a href="{registration-link}">�����������</a></li>
	</ul>
[/group]