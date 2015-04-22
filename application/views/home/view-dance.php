<div class="container-fluid">
	<h1><?=$dance['name']?></h1>
	<table>
		<tr>
			<td>Date</td>
			<td><?=$dance['date']?></td>
		</tr>
		<tr>
			<td>Type</td>
			<td><?=$dance['type']?></td>
		</tr>
		<tr>
			<td>Level</td>
			<td><?=$dance['level']?></td>
		</tr>
	</table><br/>
	<?php foreach($dancers as $dancer): ?>
		<p><strong>Dancer:</strong> <?=$dancer['dancer']?><br/><strong>Costume:</strong> <?=$dancer['costume']?></p>
	<?php endforeach; ?>
</div>
