[not-group=5]
<a id="login-btn" class="logged ico">{login}</a>
<div id="lg-dialog" title="� ������������" class="wideDialog">
	<a id="lg-close" class="thd">�������</a>
	<ul id="usermenu">
		<li><a href="{profile-link}">��� �������</a></li>
		<li><a href="{pm-link}">C�������� ({new-pm} | {all-pm})</a></li>
		<li><a href="{favorites-link}">��� ��������</a></li>
		<li><a href="{stats-link}">����������</a></li>
		<li><a href="{newposts-link}">����� ��������������</a></li>
		<li><a href="{logout-link}">��������� �����!</a></li>
	</ul>
</div>
[/not-group]
[group=5]
<a id="login-btn" class="ico">�����</a>
<div id="lg-dialog" title="�����������" class="wideDialog">
	<a id="lg-close" class="thd">�������</a>
	<form class="login-form" method="post" action="">
		<ul>
			<li><label for="login_name">{login-method}</label>
			<input class="f_input" type="text" name="login_name" id="login_name" ></li>
			<li><label for="login_password">������:</label>
			<input class="f_input" type="password" name="login_password" id="login_password" ></li>
		</ul>
		<div class="submitline">
			<button onclick="submit();" type="submit" title="�����" class="btn f_wide">�����</button>
		</div>
		<div class="log-links">
			<a href="{lostpassword-link}">������ ������?</a> |
			<a href="{registration-link}">�����������</a>
		</div>
		<input name="login" type="hidden" id="login" value="submit">
	</form>
</div>
[/group]