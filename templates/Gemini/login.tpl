[not-group=5]
<ul class="reset loginbox">
	<li class="lvsep"><a id="loginlink" href="#"><i>������, {login}!</i></a></li>
	<li class="loginbtn"><a href="{logout-link}"><b>�����</b></a></li>
</ul>
<div id="logindialog" title="{login}" style="display:none;">
	<div class="userinfo">
		<div class="lcol">
			<div style="margin: 0" class="avatar"><a href="{profile-link}"><img src="{foto}" alt="{login}" /></a></div>
		</div>
		<div class="rcol">
			<ul class="reset">
[admin-link]<li><a href="{admin-link}" target="_blank"><b>�����������</b></a></li>[/admin-link]
				<li><a href="{addnews-link}"><b>�������� �������</b></a></li>
				<li><a href="{pm-link}">���������: ({new-pm} | {all-pm})</a></li>
				<li><a href="{profile-link}">��� �������</a></li>
				<li><a href="{favorites-link}">��� ��������</a></li>
				<li><a href="{stats-link}">����������</a></li>
			</ul>
		</div>
		<div class="clr"></div>
	</div>
</div>
[/not-group]
[group=5]
<ul class="reset loginbox">
	<li class="lvsep"><a href="{registration-link}"><i>�����������</i></a></li>
	<li class="loginbtn"><a id="loginlink" href="#"><b>�����</b></a></li>
</ul>
<div id="logindialog" title="�����������" style="display:none;">
	<form method="post" action="">
		<div class="logform">
			<ul class="reset">
				<li class="lfield"><label for="login_name">{login-method}</label><br /><input type="text" name="login_name" id="login_name" /></li>
				<li class="lfield lfpas"><label for="login_password">������ (<a href="{lostpassword-link}">������?</a>):</label><br /><input type="password" name="login_password" id="login_password" /></li>
				<li class="lfield lfchek"><input type="checkbox" name="login_not_save" id="login_not_save" value="1"/><label for="login_not_save">&nbsp;����� ���������</label></li>
				<li class="lbtn"><button class="fbutton" onclick="submit();" type="submit" title="�����"><span>�����</span></button></li>
			</ul>
			<input name="login" type="hidden" id="login" value="submit" />
		</div>
	</form>
</div>
[/group]