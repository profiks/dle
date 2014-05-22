<link rel="stylesheet" type="text/css" href="engine/skins/chosen/chosen.css"/>
<script type="text/javascript" src="engine/skins/chosen/chosen.js"></script>
<script type="text/javascript">
$(function(){
	$('#category').chosen({allow_single_deselect:true, no_results_text: '������ �� �������'});
});
</script>
<div class="col-md-9 post">
<h2>���������� �������</h2>
	<div class="form-group">
		<input type="text" id="title" name="title" value="{title}" maxlength="150" class="form-control" placeholder="���������">
	</div>
	<div class="form-group">
	{category}
	</div>
	<button class="btn btn-warning pull-right" onclick="$('.addvote').toggle();return false;">�������� �����</button>
	<br /><br />
	<div class="addvote" style="display:none;">
		<div class="form-group">
			<input type="text" name="vote_title" value="{votetitle}" maxlength="150" class="form-control" placeholder="��������� ������">
		</div>
		<div class="form-group">
			<input type="text" name="frage" value="{frage}" maxlength="150" class="form-control" placeholder="������">
		</div> 
		<div class="form-group">
			<textarea name="vote_body" rows="3" class="form-control" placeholder="�������� �������: ������ ����� ������ �������� ����� ��������� ������">{votebody}</textarea>
			<input type="checkbox" name="allow_m_vote" value="1" {allowmvote}> ��������� ����� ���������� ���������
		</div>
	</div>
	<br>
	<h2>������� �����</h2>
	[not-wysywyg]
	<div class="bb-editor">
		{bbcode}
		<textarea name="short_story" id="short_story" onfocus="setFieldName(this.name)" rows="10" class="form-control">{short-story}</textarea>
	</div>
	[/not-wysywyg]
	{shortarea}
	<br />
	<h2>��������� ����� <small>(�� �����������)</small></h2>
	[not-wysywyg]
	<div class="bb-editor">
		{bbcode}
		<textarea name="full_story" id="full_story" onfocus="setFieldName(this.name)" rows="15" class="form-control" >{full-story}</textarea>
	</div>
	[/not-wysywyg]
	{fullarea}
	<br />
	<div class="form-group">
		<input type="text" name="tags" id="tags" value="{tags}" maxlength="150"  class="form-control" autocomplete="off" placeholder="�������� �����">
	</div>
	<br>
	<div class="form-group">{admintag}</div>
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
	<div class="pull-right">
		<button name="add" class="btn btn-success" type="submit">���������</button>
		<button name="nview" onclick="preview()" class="btn btn-warning" type="submit">��������</button>
	</div>
</div>