<article class="post static">
  <h1 class="title">������������ ���������</h1>
  [inbox]�������� ���������[/inbox] <br /> [outbox]������������ ���������[/outbox] <br /> [new_pm]��������� ���������[/new_pm]
</article>
[pmlist]
<div class="ux-form">
  <h3>������ ���������</h3>
  {pmlist}
</div>
[/pmlist]
[newpm]
<div class="ux-form">
  <h3>�������� ���������</h3>
  <ul class="ui-form">
    <li><input placeholder="����������" type="text" name="name" value="{author}" class="f_input f_wide"></li>
    <li><input placeholder="����" type="text" name="subj" value="{subj}" class="f_input f_wide"></li>
    <li><textarea placeholder="���������" name="comments" id="comments" rows="2" class="f_textarea f_wide">{text}</textarea></li>
    <li><input type="checkbox" name="outboxcopy" value="1"> ��������� ��������� � ����� "������������"</li>
    [sec_code]
    <li>
      <div class="c-captcha-box">
        <label for="sec_code">��������� ���:</label>
        <div class="c-captcha">
          {sec_code}
          <input title="������� ��� ��������� �� ��������" type="text" name="sec_code" id="sec_code" class="f_input" >
        </div>
      </div>
    </li>
    [/sec_code]
    [recaptcha]
    <li>
      <div>������� �����</div>
      {recaptcha}
    </li>
    [/recaptcha]
  </ul>
  <div class="submitline">
    <button class="btn f_wide" name="add" type="submit" name="submit">��������� ���������</button>
  </div>
</div>
[/newpm]
[readpm]
<div class="comment vcard">
  <div class="com-cont clrfix">
    <strong>{subj}</strong><br />
    {text}
  </div>
  <div class="com-inf">
    <span class="arg">��������� �� <b class="fn">{author}</b></span>
    <span class="fast">[reply]<b class="thd">��������</b>[/reply]</span>
    <span class="del">[del]<b class="thd">�������</b>[/del]</span>
  </div>
</div>
[/readpm]