[not-group=5]
<div class="menu-user">
					<a href="#" class="submenu-toggle"><img src="{THEME}/img/down.png" widht="100%" height="100%" /></a>
					<div class="avatar"><img src="{foto}" alt="Фото пользователя" widht="100%" height="100%" title="{login}" /></div>
					<span class="notifications"><a href="{pm-link}">{new-pm}</a></span>
					<span class="user-name">{login}</span>
					<div class="submenu">
						<ul>[admin-link]
							<li>
								<a href="{admin-link}" target="_blank">
									<span class="icon"><img src="{THEME}/img/administrator.png" /></span>
									<span class="txt">&nbsp;Админпанель</span>
								</a>
							</li>[/admin-link]
							<li>
								<a href="/addnews.html">
									<span class="icon"><img src="{THEME}/img/add_news.png" /></span>
									<span class="txt">&nbsp;Добавить новость</span>
								</a>
							</li>							
							<li>
								<a href="{favorites-link}">
									<span class="icon"><img src="{THEME}/img/favorite.png" /></span>
									<span class="txt">&nbsp;Закладки</span>
									<span class="notifications">{favorite-count}</span>
								</a>
							</li>
							<li>
								<a href="{profile-link}">
									<span class="icon"><img src="{THEME}/img/settings.png" /></span>
									<span class="txt">&nbsp;Настройки</span>
								</a>
							</li>
							<li>
								<a href="{stats-link}">
									<span class="icon"><img src="{THEME}/img/stats.png" /></span>
									<span class="txt">&nbsp;Статистика</span>
								</a>
							</li>							
							<li>
								<a href="{logout-link}">
									<span class="icon"><img src="{THEME}/img/logout.png" /></span>
									<span class="txt">&nbsp;Выход</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
[/not-group]
[group=5]
<div class="menu-user">
					<a href="#" class="submenu-toggle"><img src="{THEME}/img/down.png" widht="100%" height="100%" /></a>
					<div class="avatar"><img src="{THEME}/dleimages/noavatar.png" widht="100%" height="100%" alt="Фото пользователя" title="Гость"></div>
					<span class="user-name">Гость</span>
<div class="menu-login">
					<div class="submenu">
								<form role="form" method="post" action="">
									<div class="form-group">
										<input type="text" class="form-control" name="login_name" id="login_name" placeholder="{login-method}">
									</div>
									<div class="form-group">
										<input type="password" name="login_password" id="login_password" class="form-control" placeholder="Пароль:">
									</div>
									<div class="form-group">
										<button onclick="submit();" type="submit" class="btn">Войти</button>
										<input name="login" type="hidden" id="login" value="submit">
									</div>
								</form>
								<a href="{lostpassword-link}">Забыли пароль?</a>
								<a href="{registration-link}">Регистрация</a>
</div></div>
				</div>																																																																																																																										[not-page-count=1]<span class="nblock"> Лучше всего будет <a href="http://newprogs.net/" title="бесплатные программы">бесплатные программы</a> скачать с нашего сайтика и рекомендуем <a href="http://allfilm.net/" title="последние хорошие фильмы смотреть онлайн">последние хорошие фильмы смотреть онлайн</a> здесь у нас на популярном сайте <a href="http://newtemplates.ru/" title="шаблоны под dle">шаблоны под dle</a> на лучшем сайте в рунете</span>[/not-page-count]
[/group]