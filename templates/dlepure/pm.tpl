<div class="col-md-9 post">
<h2>
	[pmlist]������ ���������[/pmlist]
	[newpm]����� ���������[/newpm]
	[readpm]���� ���������[/readpm]
</h2>
<div class="other-block">
<div class="form-group" align="center">
	[inbox]<div class="btn btn-default btn-pm">�������� ���������</div>[/inbox]
	[outbox]<div class="btn btn-default btn-pm">������������ ���������</div>[/outbox]
	[new_pm]<div class="btn btn-warning btn-pm">��������� ���������</div>[/new_pm]
</div>
<div class="form-group" align="center">
	[pmlist]{pmlist}[/pmlist]
	</div>
	[readpm]
	<div class="comment"><ul>
							<li>
							<div class="avatar"><img src="{foto}" widht="70" height="70" alt=""></div>
							<p><strong>{author}</strong>| {date}</p>
							{text}
							<div class="meta">[reply]<button class="btn btn-default btn-sm">��������</button>[/reply]
							[complaint]<button class="btn btn-default btn-sm">������������</button>[/complaint] 
		[ignore]<button class="btn btn-default btn-sm">������������</button>[/ignore] 
		[del]<button class="btn btn-danger btn-sm">�������</button>[/del]
							</div>
							</li>
						</ul></div>
	[/readpm]
	[newpm]

<div class="form-group">
<input type="text" name="name" value="{author}" class="form-control" placeholder="����">
</div>
<div class="form-group">
<input type="text" name="subj" value="{subj}" class="form-control" placeholder="����">
</div>
						<div class="form-group message">
						<label for="message">���������: </label>
						<div class="editoring">{editor}</div>
						<input type="checkbox" id="outboxcopy" name="outboxcopy" value="1" /> <label class="pm-lab" for="outboxcopy">��������� ��������� � ����� "������������"</label>
						</div>
						<button type="submit" name="add" class="btn btn-success pull-right">���������</button>
						<div class="clearfix"></div>
	[/newpm]
</div></div>