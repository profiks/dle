<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<html> 
<head>
{headers}
	<!-- Responsive Metatag -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />  
	<!-- CSS -->
	<link rel="stylesheet" href="{THEME}/style/bootstrap.css" />
	<!--[if IE 7]>
	<link rel="stylesheet" href="{THEME}/style/fontello-ie7.css" ><![endif]-->
	<!-- Custom CSS -->
	<link rel="stylesheet" href="{THEME}/style/styles.css" />
	<link rel="stylesheet" href="{THEME}/style/engine.css" />
	<!-- Custom Media-Queties -->
	<link rel="stylesheet" href="{THEME}/style/media-queries.css" />
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        
	<![endif]-->
	<!-- Media queries -->
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<script type="text/javascript" src="{THEME}/js/libs.js"></script>
	<script type="text/javascript" src="{THEME}/js/gotop.js"></script>
</head>
<body>
{AJAX}
<!-- Header -->
	<header>
		<!-- Top bar -->	
		<div class="top-head">
			<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<ul class="top-icons">
						<li class="menu-login">
							<a href="#" class="submenu-toggle"><img src="{THEME}/img/search.png" /></a>
							<div class="submenu">
								<form class="input-group" action="" name="searchform" method="post">
									<div class="form-group">
								<input type="hidden" name="do" value="search" />
								<input type="hidden" name="subaction" value="search" />
								<input class="form-control" id="story" name="story" value="Поиск..." onblur="if(this.value=='') this.value='Поиск...';" onfocus="if(this.value=='Поиск...') this.value='';" type="text" />
								</div><div class="form-group"><button type="submit" class="btn btn-default">Найти</button></div>							
								</form>
							</div>
						</li>
						<li><a href="/?do=feedback"><img src="{THEME}/img/mail.png" /></a></li>
						<li><a href="/rss.xml"><img src="{THEME}/img/rss.png" /></a></li>
					</ul>
				</div>
				<div class="col-sm-6 date-time">
					<span class="weather"><img src="{THEME}/img/day.png" /></span>
					<script type="text/javascript">
						var ld = new Date();
						document.write (ld.toLocaleDateString());
						</script>
				</div>
			</div>
			
			</div>
		</div>
		<!-- end Top bar -->	

		<!-- Menu -->	
		<nav class="navbar" role="navigation">
		<div class="container">
			<!-- Лого -->
			<div class="navbar-header">	
				<a class="navbar-brand" href="/"><img src="{THEME}/img/logo.png" alt="Logo" /></a>
			</div>
			<!-- Конец лого -->
			<!-- Меню навигации -->
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/">Главная</a></li>
					<li><a href="/films">Фильмы</a></li>
					<li><a href="/">Музыка</a></li>
					<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Игры<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li ><a href="#">PC</a></li>
							<li ><a href="#">Xbox360</a></li>
							<li ><a href="#">PlayStation4</a></li>
							<li ><a href="#">PlayStation3</a></li>
						</ul>
					</li>
					<li ><a href="products.html">Ссылка</a></li>
					<li class="dropdown ">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Блог <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li ><a href="#">Все о играх</a></li>
							<li ><a href="#">Все о фильмах</a></li>
							<li ><a href="#">Все о музыки</a></li>
						</ul>
					</li>
					<li ><a href="/?do=feedback">Контакт</a></li>
				</ul>


			</div>
			<!-- конец меню навигации -->
		</div>
		</nav>
		<!-- end Menu -->	

		<!-- News info -->	
		<div class="bottom-head">
			<div class="container">
				{login}
				<!-- Слайдер текста -->	
				<div class="menu-check-list">
					<div id="carousel-check-list" class="carousel slide" data-ride="carousel">
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<p>Сыме лучшие новости мира.</p>
							</div>
							<div class="item">
								<p>Отличный контент на любую тематику.</p>
							</div>
							<div class="item">
								<p>С нами просто весело!</p>
							</div>
						</div>
						<!-- Стрелки -->
						<a class="left carousel-control" href="#carousel-check-list" data-slide="prev">
							<img src="{THEME}/img/left.png" />
						</a>
						<a class="right carousel-control" href="#carousel-check-list" data-slide="next">
							<img src="{THEME}/img/right.png" />
						</a>
						<!-- конец стрелок -->	
					</div>
					<div class="carousel-list"></div>
				</div>
				<!-- конец слайдера -->	
				<a href="/index.php?do=lastcomments" class="cart btn" title="Последние комментарии">
					<img src="{THEME}/img/comments.png" />
				</a>
			</div>
		</div>
		<!-- end News info -->	

		<!-- Big Slider -->	
		[aviable=main]
		<div class="slider">
			<img src="{THEME}/img/slider.jpg" class="bg" alt="">
			<div id="carousel-head" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<div class="slider-grid">
					{custom category="1,2" template="sliders" aviable="main" navigation="no" from="0" limit="8" fixed="yes" order="rand" cache="yes"}
						<div class="slider-grid-item separa">

						</div>					
					</div>
				</div>
				
				<div class="item">
					<div class="slider-grid">
					{custom category="1,3" template="sliders2" aviable="main" navigation="no" from="0" limit="8" fixed="yes" order="rand" cache="yes"}
						<div class="slider-grid-item separa">

						</div>
					</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-head" data-slide="prev">
				<img src="{THEME}/img/prev.png" />
			</a>
			<a class="right carousel-control" href="#carousel-head" data-slide="next">
				<img src="{THEME}/img/next.png" />
			</a>
			</div>
		</div>
		 [/aviable]
		<!-- end Big Slider -->	
		
	</header>
	<!-- end Header -->

	<!-- begin Content -->
	<div id="content">
		<section class="container">
[not-aviable=main]
<div class="row">
				<div class="col-md-12">
					<div class="title">
						<span>{speedbar}</span>
					</div>
				</div>
			</div>
			[aviable=date|cat|search|userinfo|favorites|newposts|lastnews|lastcomments|catalog|alltags|tags|allnews] <div class="row"><div class="col-md-9 list blog">[/aviable]
				<!-- Main -->
	{info}			 
{content}
			[aviable=date|cat|search|userinfo|favorites|newposts|lastnews|lastcomments|catalog|alltags|tags|allnews]</div>[/aviable]	
				<!-- end Main -->
 [/not-aviable]
 [not-aviable=main]
<!-- Sidebar -->	
				<div class="col-md-3">
					<aside>
						<h3 class="title_aside">Категории</h3>
						<div class="clearfix"></div>
						<ul class="categories">
							<li><a href="#">Главная</a></li>
							<li><a href="#">Фильмы</a></li>
							<li><a href="#">Музыка</a></li>
							<li><a href="#">Игры</a></li>
							<li><a href="#">Новости</a></li>
						</ul>
						<h3 class="title_aside">Комментарии и Статьи</h3>
						<div class="clearfix"></div>
						<!-- Nav tabs -->
						<ul class="nav nav-tabs">
						  <li><a href="#comments" data-toggle="tab">Comments</a></li>
						  <li><a href="#popular" data-toggle="tab">Popular</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content" id="myTab">
						  <div class="tab-pane active" id="comments">
							  <ul>
								lastcomments - скрипт
							  </ul>
						  </div>

						  <div class="tab-pane fade" id="popular">
						  	<ul>
							{custom category="1,2,3,4,5,6,8,7" template="popular" aviable="global" navigation="no" from="0" limit="5" fixed="yes" order="rating" cache="yes"}
							  </ul>
						  </div>
						</div>
					</aside>
				</div>
				<!-- end Sidebar -->
				</div>
 [/not-aviable]
[aviable=main]
<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Новинки Фильмов</h2>
						<span></span>	
					</div>
				</div>
			</div>
						<div class="row">
				<div class="col-md-12">
					<div class="gallery gallery-posts blog">
{custom category="1,2" template="movies" aviable="main" navigation="no" from="0" limit="8" fixed="yes" order="date" cache="yes"}
									</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Новые музыкальные альбомы</h2>
						<span></span>	
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
<div class="gallery gallery-posts blog">
{custom category="1,3" template="musics" aviable="main" navigation="no" from="0" limit="8" fixed="yes" order="date" cache="yes"}
					</div>
				</div>
			</div>
 [/aviable] 				
		</section>
	</div>
<!-- end Content -->
	<!-- Footer -->
	<footer>
		<div class="middle-foot">
			<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h3>About Us</h3>
					<div class="logo"><img src="{THEME}/img/logo.png" alt=""></div>
					<p>Описание сайта: текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст</p>
					<a href="#" class="btn readmore">Read More</a>
				</div>
				<div class="col-md-4">
					<div class="recent-posts">
					<h3>Популярные статьи</h3>
						<ul>
						{topnews}
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-4">
					<h3>Календарь</h3>
					{calendar}
				</div>
			</div>
			</div>
		</div>
		<div class="bottom-foot">
			<div class="container">
			<div class="row">
				<div class="col-md-6">Copyright (c) 2014 &amp; Все права защищены.</div>
				<div class="col-md-6 right"><a href="/">Главная</a> / <a href="#">Ссылка</a> / <a href="#">Ссылка</a></div>
			</div>
			</div>
		</div>
	</footer>
	<!-- end Footer --> 

	<!-- ======================= JQuery libs =========================== -->

	<!-- Respond.js media queries for IE8 -->
	<script src="{THEME}/js/respond.min.js"></script>
	<script src="{THEME}/js/libs.js"></script>
	<!-- Bootstrap-->
	<script src="{THEME}/js/bootstrap.min.js" ></script>
	<!-- Retina.js -->
	<script src="{THEME}/js/retina.js" ></script>
	<!-- Placeholder.js http://widgetulous.com/placeholderjs/ -->
	<!--[if lt IE 9]>
	<script src="{THEME}/js/placeholder.js" ></script>
	<script>Placeholder.init();</script>
	<![endif]-->
	<!-- ScrollTo -->
	<script src="{THEME}/js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<!-- NiceScroll -->
	<script src="{THEME}/js/jquery.nicescroll.min.js"></script>	
	<!-- Custom -->
	<script src="{THEME}/js/script.js"  ></script>
	<!-- ======================= JQuery libs =========================== -->
</body>
</html>