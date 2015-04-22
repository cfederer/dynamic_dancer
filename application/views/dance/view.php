<div class="container-fluid">
	<h2>View Dances</h2>
	<p>
		<a href="<?php echo site_url('dance/add'); ?>">Add new dance</a>
	</p>
	<table class="table datatable">
		<thead>
			<th>Name</th>
			<th>Date</th>
			<th>Type</th>
			<th>Level</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			<?php foreach($dances as $dance): ?>
			<tr>
				<td><?= $dance['name']; ?></td>
				<td><?= $dance['date']; ?></td>
				<td><?= $dance['type']; ?></td>
				<td><?= $dance['level']; ?></td>
				<td>
					<a href="<?php echo site_url('dance/edit/' . $dance['danceId']); ?>">Edit</a>&nbsp;&nbsp;
					<a href="<?php echo site_url('dance/deleteDance/' . $dance['danceId']); ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		
	</table>
</div>
