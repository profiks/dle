<div class="profiles">
  <h1>��� {usertitle}</h1>
  <!-- profile -->
   <div class="about">
    <img class="ava" src="{foto}" alt="��� {usertitle}" />
    <ul>
     <li><i>��� �� �����:</i> {lastdate} � ������ [offline]<em style="color:red;">offline</em>[/offline][online]<em style="color:green;">online</em>[/online]</li>
     <li><i>���� �����������:</i> {registration}</li>
     <li><i>������:</i> {status} </li>
     <li><i>������ ���:</i>  {fullname} [not-fullname] - �� ������� - [/not-fullname]</li>
     <li><i>������:</i> {comm-num} [ {comments} ]</li>
     <li><i>ICQ:</i> {icq} [not-icq] �� ������� [/not-icq]  </li>
        <li><i>������������:</i> {email} | {pm} | [not-logged][ {edituser} ] [/not-logged]</li>
    </ul>
   </div>
    </div>
[not-logged]
    <div id="options" style="display:none;">
	<br /><br />
	<div class="pheading"><h2>�������������� �������</h2></div>
		<div class="form-group">
				<label for="name">���� ���:</label>
				<input type="text" name="fullname" value="{fullname}" class="form-control" />
		</div>
			<div class="form-group">
				<label for="name"><br>��� E-Mail:</label>
				<input type="text" name="email" value="{editmail}" class="form-control"  /><br />
				<div class="checkbox"><br>{hidemail}</div>
				<div class="checkbox"><input type="checkbox" id="subscribe" name="subscribe" value="1" /> <label for="subscribe">���������� �� ����������� ��������</label></div>
			</div>
			<div class="form-group">
				<label for="name"><br>����� ����������:</label>
				<input type="text" name="land" value="{land}" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>������ ������������:</label>
				{ignore-list}
			</div>
			<div class="form-group">
				<label for="name"><br>����� ICQ:</label>
				<input type="text" name="icq" value="{icq}" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>������ ������:</label>
				<input type="password" name="altpass" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>����� ������:</label>
				<input type="password" name="password1" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>���������:</label>
				<input type="password" name="password2" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>���������� �� IP:<br />��� IP: {ip}</label>
				<div><br><textarea name="allowed_ip" style="width:98%;" rows="5" class="form-control" >{allowed-ip}</textarea></div>
				<div>
					<span class="small" style="color:red;">
					<br>* ��������! ������ ��������� ��� ��������� ������ ���������.
					������ � ������ �������� ����� �������� ������ � ���� IP-������ ��� �������, ������� �� �������.
					�� ������ ������� ��������� IP �������, �� ������ ������ �� ������ �������.
					<br />
					������: 192.48.25.71 ��� 129.42.*.*</span>
				</div>
			</div>
			<div class="form-group">
				<label for="name"><br>������:</label>
				��������� � ����������: <input type="file" name="image" class="f_input" /><br /><br />
				������ <a href="http://www.gravatar.com/" target="_blank">Gravatar</a>: <input type="text" name="gravatar" value="{gravatar}" class="form-control" /> <br>(������� E-mail �� ������ �������)
				<br /><br /><div class="checkbox"><input type="checkbox" name="del_foto" id="del_foto" value="yes" />�<label for="del_foto">������� ������</label></div>
			</div>
			<div class="form-group">
				<label for="name"><br>� ����:</label>
				<textarea name="info" style="width:98%;" rows="5" class="form-control" >{editinfo}</textarea>
			</div>
			<div class="form-group">
				<label for="name"><br>�������:</label>
				<textarea name="signature" style="width:98%;" rows="5" class="form-control" >{editsignature}</textarea>
			</div>
			{xfields}
			<div class="col-md-9 post"><button class="btn btn-default" type="submit" name="submit">���������</button></div>
			<br /><br /><br />
</div>
[/not-logged]