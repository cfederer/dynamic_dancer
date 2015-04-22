<label for="dancer_<?=$i?>">Dancer <?=$i?>: </label>
 	<select name="dancer_<?=$i?>" class="form-control">
 		<?php foreach($dancerOptions as $id=>$op): ?>
     		<option value="<?=$id?>"><?=$op?></option>
     		<?php endforeach; ?>
 	</select>
 <label for="costume_<?=$i?>">Costume for Dancer <?=$i?>: </label>
 	<select name="costume_<?=$i?>" class="form-control">
 		<?php foreach($costumeOptions as $id=>$op): ?>
     		<option value="<?=$id?>"><?=$op?></option>
     		<?php endforeach; ?>
 	</select>