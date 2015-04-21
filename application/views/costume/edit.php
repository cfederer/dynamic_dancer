<div class="container-fluid">
  <h2 id = "newDancerTitle">Create A New Costume</h2>
  <form method="post" action="<?php echo site_url('costume/editCostume'); ?>">
  	<input type="hidden" name="costumeId" value="<?=$costume['costumeId']; ?>"
    <div id = "basicInformation" class="bottom25">
    	<h3>Basic Information</h3>
     <label for="costumeName">Costume Name: </label>
     	<input type="text" class="form-control" name="costumeName" id="costumeName" value="<?=$costume['name'];?>"/>
     <label for="costumePartId">Costume Parts: </label>
     <p class="alert alert-info">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>
     <select class="form-control bottom12" name="costumePartId[]" id="costumePartId" multiple="multiple">
     	<?php foreach($options as $id => $op): ?>
     		<option <?php if(in_array($id, $associatedParts)) echo 'selected '; ?>value="<?=$id?>"><?=$op?></option>
     	<?php endforeach; ?>
     </select>
     <input type="submit" class="btn" />
     </div>
  </form>
 </div>