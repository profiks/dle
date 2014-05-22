[searchposts]
[fullresult]
					<!-- Item -->
					<div class="list-item">
						<a href="{full-link}" class="item-thumbnail">
							<img src="{image-1}" width="100%" height="100%" alt="" />			
						</a>
						<strong>[result-link]{result-title}[/result-link]</strong>
						<p>{result-text limit="150"}</p>
                        <div class="meta">{result-date} | Автор: {result-author} | Комментариев: {result-comments} | Просмотров: {views}</div>
						<a href="{result-link}" class="btn readmore">подробнее</a>
					</div>
[/fullresult]
[shortresult]
<div class="dpad searchitem">
	<h3>[result-link]{result-title}[/result-link]</h3>
	<b>{result-date}</b> | {link-category} | Автор: {result-author}
</div>
[/shortresult]
[/searchposts]
[searchcomments]
[fullresult]
						<div class="comment"><ul>
							<li>
							<div class="avatar"><img src="{foto}" widht="70" height="70" alt=""></div>
							<p><strong>{result-author}</strong> | {result-date}</p>
							{result-text}
							[not-group=5]<div class="meta">[com-edit]<button class="btn btn-default btn-sm">Изменить</button>[/com-edit]
							</div>[/not-group]
							</li>
						</ul></div>
[/fullresult]
[shortresult]
<div class="dpad searchitem">
	<h3>[result-link]{result-title}[/result-link]</h3>
	<b>{result-date}</b> | {link-category} | Автор: {result-author} | [com-edit]Изменить[/com-edit] | [com-del]Удалить[/com-del]
</div>
[/shortresult]
[/searchcomments]