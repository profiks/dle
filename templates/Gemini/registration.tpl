<h2 class="heading">
	[registration]����������� ������ ������������[/registration]
	[validation]���������� ������� ������������[/validation]
</h2>
<div class="brdform">
	<div class="baseform">
		<table class="tableform">
			<tr>
				<td colspan="2">
		[registration]
				<b>������������, ��������� ���������� ������ �����!</b><br />
				����������� �� ����� ����� �������� ��� ���� ��� ����������� ����������.
				�� ������� ��������� ������� �� ����, ��������� ���� �����������, ������������� ������� ����� � ������ ������.
				<br />� ������ ������������� ������� � ������������, ���������� � <a href="/index.php?do=feedback">��������������</a> �����.
		[/registration]
		[validation]
				<b>��������� ����������,</b><br />
				��� ������� ��� ��������������� �� ����� �����,
				������ ���������� � ��� �������� ��������, ������� ��������� �������������� ���� � ����� �������.
		[/validation]
				</td>
			</tr>
		[registration]
			<tr>
				<td class="label">
					�����:<span class="impot">*</span>
				</td>
				<td>
					<input style="float: left;" type="text" name="name" id='name' style="width:175px; margin-right: 6px;" class="f_input" /><input class="bbcodes" style="font-size: 11px; float: left;" title="��������� ����������� ������ ��� �����������" onclick="CheckLogin(); return false;" type="button" value="��������� ���" />
					<br /><br /><div id='result-registration'></div>
				</td>
			</tr>
			<tr>
				<td class="label">
					������:<span class="impot">*</span>
				</td>
				<td><input type="password" name="password1" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">
					��������� ������:<span class="impot">*</span>
				</td>
				<td><input type="password" name="password2" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">��� E-Mail:<span class="impot">*</span></td>
				<td><input type="text" name="email" class="f_input" /></td>
			</tr>
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
				<div><input type="text" name="question_answer" class="f_input" /></div>
			</td>
		</tr>
		[/question]
			[sec_code]
			<tr>
				<td class="label">
					������� ���<br />� ��������:<span class="impot">*</span>
				</td>
				<td>
					<div>{reg_code}</div>
					<div><input type="text" name="sec_code" style="width:115px" class="f_input" /></div>
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
		[/registration]
		[validation]
			<tr>
				<td class="label">���� ���:</td>
				<td><input type="text" name="fullname" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">����� ����������:</td>
				<td><input type="text" name="land" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">����� ICQ:</td>
				<td><input type="text" name="icq" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">����:</td>
				<td><input type="file" name="image" style="width:304px; height:18px" class="f_input" /></td>
			</tr>
			<tr>
				<td class="label">� ����:</td>
				<td><textarea name="info" style="width: 98%;" rows="8" class="f_textarea" /></textarea></td>
			</tr>
			{xfields}
		[/validation]
		</table>
		<div class="fieldsubmit">
			<button name="submit" class="fbutton" type="submit"><span>���������</span></button>
		</div>
	</div>
</div>