<div class="container-fluid">
  <h2 id = "newDancerTitle">Edit a Costume Part</h2>
  <form method="post" action="<?php echo site_url('costumePart/editPart'); ?>">
    <div id = "basicInformation" class="bottom25">
    	<input type="hidden" name="costumePartId" value="<?= $part['costumePartId']; ?>"
     <label for="type">Costume Type: </label>
     	<input type="text" class="form-control" name="type" id="type" value="<?= $part['type']; ?>"/>
     <label for="purchasePrice">Purchase Price: </label>
     	<input type="text" class="form-control" name="purchasePrice" id="purchasePrice" value="<?= $part['purchasePrice']; ?>"/>
     <label for="salePrice">Sale Price: </label>
     	<input type="text" class="form-control" name="salePrice" id="salePrice" value="<?= $part['salePrice']; ?>"/>
     <label for="description">Description: </label>
     	<textarea class="form-control" name="description" id="description" rows="10">
     		<?= $part['description']; ?>
     	</textarea>
     </div>
     <input type="submit" class="btn bottom25" value="Update"/>
  </form>