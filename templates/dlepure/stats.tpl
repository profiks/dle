<div class="col-md-9 post">
	<h2>Статистика</h2>
	<div class="form-group">
	<label for="name">Новости</label>
		<p>Общее кол-во новостей <span>{news_num}</span></p>
		<p>Из них опубликовано <span>{news_allow}</span></p>
		<p>Опубликовано на главной <span>{news_main}</span></p>
		<p>Ожидает модерации <span>{news_moder}</span></p>
		<label for="name">Пользователи</label>
		<p>Общее кол-во пользователей: <span>{user_num}</span></p>
		<p>Из них забанено: <span>{user_banned}</span></p>
		<label for="name">Комментарии</label>
		<p>Кол-во комментариев: <span>{comm_num} <a href="/?do=lastcomments">[Посмотреть последние]</a></span></p>
	</div>
	<div class="form-group">	
		<label for="name">За сутки</label>
		<p>Добавлено {news_day} новостей и {comm_day} комментариев, зарегистрировано {user_day} пользователей</p>
		<label for="name">За неделю</label>
		<p>Добавлено {news_week} новостей и {comm_week} комментариев, зарегистрировано {user_week} пользователей</p>
		<label for="name">За месяц</label>
		<p>Добавлено {news_month} новостей и {comm_month} комментариев, зарегистрировано {user_month} пользователей</p>
	</div>
	<div class="form-group">
		<p>Общий размер базы данных <span>{datenbank}</span></p>
	</div>
	<h4>Лучшие пользователи</h4>
	<table width="100%" class="userstop">{topusers}</table>
</div>