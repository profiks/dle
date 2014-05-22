<div class="vote-block">
	<span><i class="glyphicon glyphicon-bullhorn"></i> {title}</span>
	<br><br>
	[votelist]
	<form method="post" name="vote" action=''>
	[/votelist]
	{list}
	[voteresult]
	<br>
	<div class="side-block-vote">
		Всего проголосовало <div class="label label-success lab-vote pull-right">{votes}</div>
	</div>
	[/voteresult]
	[votelist]
	<br>
	<div class="side-block-vote">
		<input type="hidden" name="vote_action" value="vote">
		<input type="hidden" name="vote_id" id="vote_id" value="{vote_id}">
		<div class="btn-group btn-group-justified">
			<div class="btn-group">
				<button class="btn btn-success" type="submit" onclick="doVote('vote'); return false;">Голосовать</button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" type="button" onclick="doVote('results'); return false;">Результаты</button>
			</div>
		</div>
	</div>
	</form>
	<form method="post" name="vote_result" action=''>
		<input type="hidden" name="vote_action" value="results" />
		<input type="hidden" name="vote_id" value="{vote_id}" />
	</form>
	[/votelist]
</div>