<div class="col-md-9 post">
		<h2>�������� �����</h2>
		<p>�������� �����, � ������������ �������� � ��� ��� ��� ..</p>
	[not-logged]
			<div class="form-group">
				<label for="name">������� ���� ���: *</label>
				<input type="text" maxlength="35" name="name" class="form-control" placeholder="���� ���">
			</div>
			<div class="form-group">
				<label for="email">������� ���� E-mail: *</label>
				<input type="email" maxlength="35" name="email" class="form-control" placeholder="��� E-Mail">
			</div>
	[/not-logged]
			<div class="form-group">
				<label for="mobile">������� ����: *</label>
				<input type="text" maxlength="45" name="subject" class="form-control" placeholder="����">
			</div>		
			<div class="form-group">
				<label for="subject">�������� ����������: *</label>
				{recipient}
			</div>
			<div class="form-group message">
				<label for="message">����� ������: *</label>
				<textarea name="message" rows="10" class="form-control" placeholder="���������"></textarea>
			</div>

			<button type="submit" name="send_btn" class="btn btn-default">���������</button>
			<div class="clearfix"></div>
</div>