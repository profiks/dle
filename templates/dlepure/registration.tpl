<div class="col-md-9 post">
	<h2>[registration]����������� ������ ������������[/registration]</h2>
	<h2>[validation]���������� ������� ������������[/validation]</h2>
<div class="other-block">
	[registration]
	<div class="alert alert-success">
		������������, ��������� ���������� ������ �����!<br>
		����������� �� ����� ����� �������� ��� ���� ��� ����������� ����������.
		�� ������� ��������� ������� �� ����, ��������� ���� �����������, ������������� ������� ����� � ������ ������.
		<br>� ������ ������������� ������� � ������������, ���������� � <a href="/index.php?do=feedback">��������������</a> �����.
	</div>
	[/registration]
	[validation]
	<div class="alert alert-warning">
		��������� ����������,<br>
		��� ������� ��� ��������������� �� ����� �����,
		������ ���������� � ��� �������� ��������, ������� ��������� �������������� ���� � ����� �������.
	</div>
	[/validation]

	[registration]
			<div class="form-group">
				<label for="name">������� �����: *</label>
				<input type="text" id="name" name="name" class="form-control" placeholder="�����" autocomplete="off" required>
				<br />
				<button class="btn" onclick="CheckLogin(); return false;">��������� ���</button>
			</div>	
			<div id="result-registration"></div>
		<div class="form-group">
		<label for="name">������� ������: *</label>
			<input type="password" name="password1" class="form-control" placeholder="������" autocomplete="off" required>
		</div>
		<div class="form-group">
		<label for="name">��������� ������: *</label>
			<input type="password" name="password2" class="form-control" placeholder="������ ��� ���" autocomplete="off" required>
		</div>
		<div class="form-group">
		<label for="name">������� ���� E-mail: *</label>
			<input type="email" name="email" class="form-control" placeholder="��� E-Mail" autocomplete="off" required>
		</div>
[question]
                            <!--question/answer-->
                            	<div class="form-group"><label for="name">������ : <span>{question}</span></label>
                            	<label for="name">�������� �� ������ *:</label>
                                <input type="text" class="form-control" name="question_answer" autocomplete="off" required />
								</div>
                        	<!--/question/answer-->
[/question]
[sec_code]
                            <!--security code-->
                            	<div class="form-group">
                                	<label for="name">������������� ���� ������������ :</label>
                                    <br><br>{reg_code}<br><br>
									<label for="name">������� ��� *:</label>
                                <input type="text" class="form-control" name="sec_code" autocomplete="off" required>
                                </div>
                            <!--/security code-->
[/sec_code]
		[recaptcha]
		<div class="form-group">
		<label for="name">������� ��� �����, ���������� �� ����������� *:</label>
			<br><br>{recaptcha}<br><br>
		</div>
		[/recaptcha]
	[/registration]
	[validation]
		<div class="form-group">
		<label for="name">������� ���� ���:</label>
			<input type="text" name="fullname" class="form-control" placeholder="���� ���">
		</div>
		<div class="form-group">
		<label for="name">������� ����� ����������:</label>
			<input type="text" name="land" class="form-control" placeholder="����� ����������">
		</div>
		<div class="form-group">
		<label for="name">������� icq:</label>
			<input type="text" name="icq" class="form-control" placeholder="����� ICQ">
		</div>
		<div class="form-group">
		<label for="name">��������� ����:</label>
			<input type="file" name="image" placeholder="����">
		</div>
		<div class="form-group">
		<label for="name">�������� � ����:</label>
		<textarea name="info" rows="3" class="form-control" placeholder="� ����"></textarea>
		</div>
	[/validation]
	<button name="submit" class="btn btn-success pull-right" type="submit">���������</button>
</div></div>