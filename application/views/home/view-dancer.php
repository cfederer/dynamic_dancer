<div class="container-fluid">
	<h1><?=$dancer['Fname'] . ' ' . $dancer['Lname'] ?></h1>
	<table>
		<tr><td colspan="2"><strong>Sizes</strong></td></tr>
		<tr>
			<td>Shirt Size</td>
			<td><?=$dancer['shirtSize']?></td>
		</tr>
		<tr>
			<td>Shoe Size</td>
			<td><?=$dancer['shoeSize']?></td>
		</tr>
		<tr>
			<td>Pant Size</td>
			<td><?=$dancer['pantSize']?></td>
		</tr>
		<tr>
			<td>Bra Size</td>
			<td><?=$dancer['braSize']?></td>
		</tr>
		<tr><td colspan="2"><strong>Measurements</strong></td></tr>
		<tr>
			<td>Bust</td>
			<td><?=$dancer['bust']?></td>
		</tr>
		<tr>
			<td>Hip</td>
			<td><?=$dancer['hip']?></td>
		</tr>
		<tr>
			<td>Waist</td>
			<td><?=$dancer['waist']?></td>
		</tr>
		<tr>
			<td>Chest</td>
			<td><?=$dancer['chest']?></td>
		</tr>
	</table><br/>
	<?php foreach($dances as $dance): 
		$partsString = ''; foreach($dance['costumeParts'] as $part): $partsString .= $part . ', '; endforeach; 
		$partsString = rtrim($partsString, ', ');?>
		<p><strong>Dance:</strong> <?=$dance['dance']?><br/>
			<strong>Costume:</strong> <?=$dance['costume']?><br/>
			<strong>Costume Parts:</strong> <?=$partsString?></p>
	<?php endforeach; ?>
</div>
