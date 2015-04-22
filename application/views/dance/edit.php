<div class="container-fluid">
  <h2 id = "newDanceTitle">Create A New Dance </h2>
  <form method="post" action="<?php echo site_url('dance/addDance'); ?>">
  	<input type="hidden" name="danceId" value="" />
    <div id = "basicInformation" class="bottom25">
     <label for="danceName">Dance Name: </label>
     	<input type="text" class="form-control" name="danceName" id="danceName" />
     <label for="danceType">Dance Type: </label>
     	<input type="text" class="form-control" name="danceType" id="danceType" />
     <label for="level">Level: </label>
     	<input type="text" class="form-control" name="level" id="level" />
     <label for="danceDate">Dance Date: </label> 
     	<input type="text" class="form-control" name="danceDate" id="danceDate" />
   </div>
   <div id="dancers" class="bottom25">
     <label for="dancer_1">Dancer 1: </label>
     	<select name="dancer_1" class="form-control">
     		<?php foreach($dancerOptions as $id=>$op): ?>
     		<option value="<?=$id?>"><?=$op?></option>
     		<?php endforeach; ?>
     	</select>
     <label for="costume_1">Costume for Dancer 1: </label>
     	<select name="costume_1" class="form-control">
     		<?php foreach($costumeOptions as $id=>$op): ?>
     		<option value="<?=$id?>"><?=$op?></option>
     		<?php endforeach; ?>
     	</select>
   </div>
   <button type="button" class="btn" id="addDancer">Add Dancer</button>
   <input type="hidden" id="numDancers" name="numDancers" value="1" />
   <input type="hidden" id="siteUrl" value="<?php echo site_url(); ?>" />
   <input type="submit" class="btn" />
  </form>
  <script src="<?php echo base_url('js/include.js'); ?>"></script>
