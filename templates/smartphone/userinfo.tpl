<article class="post static">
  <h1 class="title">������������: {usertitle}</h1>
  ������ ���: {fullname}<br />
  ���� �����������: {registration}<br />
  ��������� ���������: {lastdate}<br />
  ������:�<font color="red">{status}</font>[time_limit] � ������ ��: {time_limit}[/time_limit]<br /><br />
  ����� ����������: {land}<br />
  ����� ICQ: {icq}<br />
  ������� � ����:<br />{info}<br /><br />
  ���������� ����������: {news-num}<br />
  [ {news} ]<br /><br />
  ���������� ������������: {comm-num}<br />
  [ {comments} ]<br /><br />
  [ {email} ]<br />
  [ {pm} ]<br />
  {edituser}
</article>
[not-logged]
<div id="options" style="display:none;">
  <div class="ux-form">
    <h3>�������������� ����������</h3>
    <ul class="ui-form">
      <li><input placeholder="E-mail" type="email" name="email" value="{editmail}" class="f_input f_wide"><div>{hidemail}</div></li>
      <li><br /></li>
      <li><input placeholder="���� ���" type="text" name="fullname" value="{fullname}" class="f_input f_wide"></li>
      <li><input placeholder="����� ����������" type="text" name="land" value="{land}" class="f_input f_wide"></li>
      <li><input placeholder="����� ICQ" type="text" name="icq" value="{icq}" class="f_input f_wide"></li>
      <li><br /></li>
      <li><input placeholder="������ ������" type="password" name="altpass" class="f_input f_wide"></li>
      <li><input placeholder="����� ������" type="password" name="password1" class="f_input f_wide"></li>
      <li><input placeholder="���������" type="password" name="password2" class="f_input f_wide"></li>
      <li><br /></li>
      <li><textarea name="allowed_ip" rows="2" class="f_textarea f_wide">{allowed-ip}</textarea><br />
        ��� ������� IP: <b>{ip}</b><br /><div style="color:red;font-size:11px;">* ��������! ������ ��������� ��� ��������� ������ ���������. ������ � ������ �������� ����� �������� ������ � ���� IP-������ ��� �������, ������� �� �������. �� ������ ������� ��������� IP �������, �� ������ ������ �� ������ �������.<br />������: 192.48.25.71 ��� 129.42.*.*</div>
      </li>
      <li><br /></li>
      <li><label for="image">������:</label><input type="file" name="image" class="f_input f_wide"><p><input type="checkbox" name="del_foto" value="yes">��������� ����������</p></li>
      <li><br /></li>
      <li><textarea placeholder="� ����" name="info" rows="2" class="f_textarea f_wide">{editinfo}</textarea></li>
      <li><textarea placeholder="�������" name="signature" rows="2" class="f_textarea f_wide">{editsignature}</textarea></li>
    </ul>
    <div class="submitline">
      <button name="submit" class="btn f_wide" type="submit">���������</button>
      <input name="submit" type="hidden" id="submit" value="submit">
    </div>
  </div>
</div>
[/not-logged]