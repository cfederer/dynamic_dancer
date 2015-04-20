<div class="container-fluid">
  <h2 id = "newDancerTitle">Create A New Costume Part</h2>
  <form method="post" action="<?php echo site_url('costumePart/addPart'); ?>">
    <div id = "basicInformation" class="bottom25">
     <label for="type">Costume Type: </label>
     	<input type="text" class="form-control" name="type" id="type"/>
     <label for="purchasePrice">Purchase Price: </label>
     	<input type="text" class="form-control" name="purchasePrice" id="purchasePrice"/>
     <label for="salePrice">Sale Price: </label>
     	<input type="text" class="form-control" name="salePrice" id="salePrice"/>
     <label for="description">Description: </label>
     	<textarea class="form-control" name="description" id="description" rows="10"></textarea>
     </div>
     <input type="submit" class="btn bottom25" value="Add"/>
  </form>