<div class="container-fluid">
	<h2>View Dancers</h2>
	<p>
		<a href="<?php echo site_url('dancer/add'); ?>">Add new dancer</a>
	</p>
	<table class="table datatable">
		<thead>
			<th>Name</th>
			<th>&nbsp;</th>
		</thead>
		<tbody>
			<?php foreach($dancers as $dancer): ?>
			<tr>
				<td><?= $dancer['Fname'] . ' ' . $dancer['Lname']; ?></td>
				<td>
					<a href="<?php echo site_url('dancer/edit/' . $dancer['dancerId']); ?>">Edit</a>&nbsp;&nbsp;
					<a href="<?php echo site_url('dancer/deleteDancer/' . $dancer['dancerId']); ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		
	</table>
</div>
