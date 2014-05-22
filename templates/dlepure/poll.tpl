<div>
	<h4>{question}</h4>
	{list}<br>
	[voted]Всего проголосовало: {votes}[/voted]
	[not-voted]
	<button class="btn btn-success" type="submit" onclick="doPoll('vote'); return false;">Голосовать</button>
	<button class="btn btn-danger" type="submit" onclick="doPoll('results'); return false;">Результаты</button>
	[/not-voted]
</div>
<div class="divider"></div>