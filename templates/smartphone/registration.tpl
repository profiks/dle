<article class="post static">
  <h1 class="title">
    [registration]�����������[/registration]
    [validation]����������� �����������[/validation]
  </h1>
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
</article>
<div class="ux-form">
  <ul class="ui-form">
    [registration]
      <li>
        <div class="combofield">
          <input placeholder="�����" type="text" name="name" id="name" class="f_input f_wide">
          <input class="bbcodes" title="Check" onclick="CheckLogin(); return false;" type="button" value="���������">
        </div>
        <div class="clr" id='result-registration'></div>
      </li>
      <li>
        <input placeholder="������" type="password" name="password1" id="password1" class="f_input f_wide">
      </li>
      <li>
        <input placeholder="��������� ������" type="password" name="password2" id="password2" class="f_input f_wide">
      </li>
      <li>
        <input placeholder="E-mail" type="email" name="email" id="email" class="f_input f_wide">
      </li>
      [question]
      <li>
        ������: <b>{question}</b>
        <div><input placeholder="�����" type="text" name="question_answer" id="question_answer" class="f_input f_wide" ></div>
      </li>
      [/question]
      [sec_code]
      <li>
        <div class="c-captcha-box">
          <label for="sec_code">��������� ���:</label>
          <div class="c-captcha">
            {reg_code}
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
      [/registration]
      [validation]
      <li><input placeholder="���� ���" type="text" id="fullname" name="fullname" class="f_input f_wide"></li>
      <li><input placeholder="���������������" type="text" id="land" name="land" class="f_input f_wide"></li>
      <li><input placeholder="ICQ" type="text" id="icq" name="icq" class="f_input f_wide"></li>
      <li><textarea placeholder="� ����" id="info" name="info" rows="3" class="f_textarea f_wide"></textarea></li>
      <li><label for="image">������:</label><input type="file" id="image" name="image" class="f_input f_wide"></li>
      [/validation]
  </ul>
  <div class="submitline">
    <button name="submit" class="btn f_wide" type="submit">������������������</button>
  </div>
</div>