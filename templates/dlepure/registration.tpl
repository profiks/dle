<div class="col-md-9 post">
	<h2>[registration]Регистрация нового пользователя[/registration]</h2>
	<h2>[validation]Обновление профиля пользователя[/validation]</h2>
<div class="other-block">
	[registration]
	<div class="alert alert-success">
		Здравствуйте, уважаемый посетитель нашего сайта!<br>
		Регистрация на нашем сайте позволит Вам быть его полноценным участником.
		Вы сможете добавлять новости на сайт, оставлять свои комментарии, просматривать скрытый текст и многое другое.
		<br>В случае возникновения проблем с регистрацией, обратитесь к <a href="/index.php?do=feedback">администратору</a> сайта.
	</div>
	[/registration]
	[validation]
	<div class="alert alert-warning">
		Уважаемый посетитель,<br>
		Ваш аккаунт был зарегистрирован на нашем сайте,
		однако информация о Вас является неполной, поэтому заполните дополнительные поля в Вашем профиле.
	</div>
	[/validation]

	[registration]
			<div class="form-group">
				<label for="name">Укажите логин: *</label>
				<input type="text" id="name" name="name" class="form-control" placeholder="Логин" autocomplete="off" required>
				<br />
				<button class="btn" onclick="CheckLogin(); return false;">Проверить имя</button>
			</div>	
			<div id="result-registration"></div>
		<div class="form-group">
		<label for="name">Укажите пароль: *</label>
			<input type="password" name="password1" class="form-control" placeholder="Пароль" autocomplete="off" required>
		</div>
		<div class="form-group">
		<label for="name">Повтарите пароль: *</label>
			<input type="password" name="password2" class="form-control" placeholder="Пароль еще раз" autocomplete="off" required>
		</div>
		<div class="form-group">
		<label for="name">Укажите свой E-mail: *</label>
			<input type="email" name="email" class="form-control" placeholder="Ваш E-Mail" autocomplete="off" required>
		</div>
[question]
                            <!--question/answer-->
                            	<div class="form-group"><label for="name">Вопрос : <span>{question}</span></label>
                            	<label for="name">Ответьте на вопрос *:</label>
                                <input type="text" class="form-control" name="question_answer" autocomplete="off" required />
								</div>
                        	<!--/question/answer-->
[/question]
[sec_code]
                            <!--security code-->
                            	<div class="form-group">
                                	<label for="name">Подтверждение кода безопасности :</label>
                                    <br><br>{reg_code}<br><br>
									<label for="name">Введите код *:</label>
                                <input type="text" class="form-control" name="sec_code" autocomplete="off" required>
                                </div>
                            <!--/security code-->
[/sec_code]
		[recaptcha]
		<div class="form-group">
		<label for="name">Введите два слова, показанных на изображении *:</label>
			<br><br>{recaptcha}<br><br>
		</div>
		[/recaptcha]
	[/registration]
	[validation]
		<div class="form-group">
		<label for="name">Укажите Ваше имя:</label>
			<input type="text" name="fullname" class="form-control" placeholder="Ваше имя">
		</div>
		<div class="form-group">
		<label for="name">Укажите Место жительства:</label>
			<input type="text" name="land" class="form-control" placeholder="Место жительства">
		</div>
		<div class="form-group">
		<label for="name">Укажите icq:</label>
			<input type="text" name="icq" class="form-control" placeholder="Номер ICQ">
		</div>
		<div class="form-group">
		<label for="name">Загрузите фото:</label>
			<input type="file" name="image" placeholder="Фото">
		</div>
		<div class="form-group">
		<label for="name">Напишите о себе:</label>
		<textarea name="info" rows="3" class="form-control" placeholder="О себе"></textarea>
		</div>
	[/validation]
	<button name="submit" class="btn btn-success pull-right" type="submit">Отправить</button>
</div></div>