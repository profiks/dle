				<!-- Main -->
				<div class="col-md-9 post">
				<div class="item-thumbnail">
					<div class="kartinka-full"><img src="{fullimage-1}" width="100%" height="100%" alt="" /></div>
					</div>
					<h2>{title}</h2>
					<p>{full-story limit="1000"}</p>
					<br><br>
		[edit-date]
		<div class="alert alert-warning">
			<strong>������� ���������������!</strong> {editor}, {edit-date}[edit-reason]<br><strong>������� -</strong> {edit-reason}[/edit-reason]
		</div>
		[/edit-date]
					<div class="meta">{date=d.m.y} | {favorites}</div>

					<a href="{category-url}" class="btn pull-right">{category}</a>
					[edit]��������[/edit]
					<div class="clearfix"></div>
				<!-- end Main -->
				<div class="comment">
				<h2>������������: [{comments-num}]</h2>
				{comments}
				{addcomments}
				</div></div>