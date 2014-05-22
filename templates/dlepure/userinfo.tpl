<div class="profiles">
  <h1>Это {usertitle}</h1>
  <!-- profile -->
   <div class="about">
    <img class="ava" src="{foto}" alt="Это {usertitle}" />
    <ul>
     <li><i>Был на сайте:</i> {lastdate} — сейчас [offline]<em style="color:red;">offline</em>[/offline][online]<em style="color:green;">online</em>[/online]</li>
     <li><i>Дата регистрации:</i> {registration}</li>
     <li><i>Группа:</i> {status} </li>
     <li><i>Полное имя:</i>  {fullname} [not-fullname] - не указано - [/not-fullname]</li>
     <li><i>Мнений:</i> {comm-num} [ {comments} ]</li>
     <li><i>ICQ:</i> {icq} [not-icq] не указано [/not-icq]  </li>
        <li><i>Коммуникации:</i> {email} | {pm} | [not-logged][ {edituser} ] [/not-logged]</li>
    </ul>
   </div>
    </div>
[not-logged]
    <div id="options" style="display:none;">
	<br /><br />
	<div class="pheading"><h2>Редактирование профиля</h2></div>
		<div class="form-group">
				<label for="name">Ваше Имя:</label>
				<input type="text" name="fullname" value="{fullname}" class="form-control" />
		</div>
			<div class="form-group">
				<label for="name"><br>Ваш E-Mail:</label>
				<input type="text" name="email" value="{editmail}" class="form-control"  /><br />
				<div class="checkbox"><br>{hidemail}</div>
				<div class="checkbox"><input type="checkbox" id="subscribe" name="subscribe" value="1" /> <label for="subscribe">Отписаться от подписанных новостей</label></div>
			</div>
			<div class="form-group">
				<label for="name"><br>Место жительства:</label>
				<input type="text" name="land" value="{land}" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>Список игнорируемых:</label>
				{ignore-list}
			</div>
			<div class="form-group">
				<label for="name"><br>Номер ICQ:</label>
				<input type="text" name="icq" value="{icq}" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>Старый пароль:</label>
				<input type="password" name="altpass" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>Новый пароль:</label>
				<input type="password" name="password1" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>Повторите:</label>
				<input type="password" name="password2" class="form-control"  />
			</div>
			<div class="form-group">
				<label for="name"><br>Блокировка по IP:<br />Ваш IP: {ip}</label>
				<div><br><textarea name="allowed_ip" style="width:98%;" rows="5" class="form-control" >{allowed-ip}</textarea></div>
				<div>
					<span class="small" style="color:red;">
					<br>* Внимание! Будьте бдительны при изменении данной настройки.
					Доступ к Вашему аккаунту будет доступен только с того IP-адреса или подсети, который Вы укажете.
					Вы можете указать несколько IP адресов, по одному адресу на каждую строчку.
					<br />
					Пример: 192.48.25.71 или 129.42.*.*</span>
				</div>
			</div>
			<div class="form-group">
				<label for="name"><br>Аватар:</label>
				Загрузить с компьютера: <input type="file" name="image" class="f_input" /><br /><br />
				Сервис <a href="http://www.gravatar.com/" target="_blank">Gravatar</a>: <input type="text" name="gravatar" value="{gravatar}" class="form-control" /> <br>(Укажите E-mail на данном сервисе)
				<br /><br /><div class="checkbox"><input type="checkbox" name="del_foto" id="del_foto" value="yes" /> <label for="del_foto">Удалить аватар</label></div>
			</div>
			<div class="form-group">
				<label for="name"><br>О себе:</label>
				<textarea name="info" style="width:98%;" rows="5" class="form-control" >{editinfo}</textarea>
			</div>
			<div class="form-group">
				<label for="name"><br>Подпись:</label>
				<textarea name="signature" style="width:98%;" rows="5" class="form-control" >{editsignature}</textarea>
			</div>
			{xfields}
			<div class="col-md-9 post"><button class="btn btn-default" type="submit" name="submit">Отправить</button></div>
			<br /><br /><br />
</div>
[/not-logged]