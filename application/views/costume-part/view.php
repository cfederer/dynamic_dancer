<div class="container-fluid">
	<h2>View Costume Parts</h2>
	<p>
		<a href="<?php echo site_url('CostumePart/add'); ?>">Add new costume part</a>
	</p>
	<table class="table datatable">
		<thead>
			<th>Type</th>
			<th>Purchase Price</th>
			<th>Sale Price</th>
			<th>Description</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			<?php foreach($costumeParts as $part): ?>
			<tr>
				<td><?= $part['type']; ?></td>
				<td><?= $part['purchasePrice']; ?></td>
				<td><?= $part['salePrice']; ?></td>
				<td><?= $part['description']; ?></td>
				<td>
					<a href="<?php echo site_url('CostumePart/edit/' . $part['costumePartId']); ?>">Edit</a>&nbsp;&nbsp;
					<a href="<?php echo site_url('CostumePart/deletePart/' . $part['costumePartId']); ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		
	</table>
</div>
