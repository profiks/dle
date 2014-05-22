<div class="col-md-9 post">
		<h2>Обратная связь</h2>
		<p>Красивый текст, о возможнастях контакта и бла бла бла ..</p>
	[not-logged]
			<div class="form-group">
				<label for="name">Укажите свое имя: *</label>
				<input type="text" maxlength="35" name="name" class="form-control" placeholder="Ваше имя">
			</div>
			<div class="form-group">
				<label for="email">Укажите свой E-mail: *</label>
				<input type="email" maxlength="35" name="email" class="form-control" placeholder="Ваш E-Mail">
			</div>
	[/not-logged]
			<div class="form-group">
				<label for="mobile">Укажите тему: *</label>
				<input type="text" maxlength="45" name="subject" class="form-control" placeholder="Тема">
			</div>		
			<div class="form-group">
				<label for="subject">Выберите получателя: *</label>
				{recipient}
			</div>
			<div class="form-group message">
				<label for="message">Текст письма: *</label>
				<textarea name="message" rows="10" class="form-control" placeholder="Сообщение"></textarea>
			</div>

			<button type="submit" name="send_btn" class="btn btn-default">Отправить</button>
			<div class="clearfix"></div>
</div>