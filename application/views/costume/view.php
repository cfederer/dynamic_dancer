<div class="container-fluid">
	<h2>View Costumes</h2>
	<p>
		<a href="<?php echo site_url('Costume/add'); ?>">Add new costume</a>
	</p>
	<table class="table datatable">
		<thead>
			<th>Name</th>
			<th>Parts</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			<?php foreach($costumes as $c): ?>
			<tr>
				<td><?= $c['name']; ?></td>
				<td><?= $c['parts']; ?></td>
				<td>
					<a href="<?php echo site_url('Costume/edit/' . $c['costumeId']); ?>">Edit</a>&nbsp;&nbsp;
					<a href="<?php echo site_url('Costume/deleteCostume/' . $c['costumeId']); ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		
	</table>
</div>
