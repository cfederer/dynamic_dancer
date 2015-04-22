<div class="container-fluid">
	<div class="row">
    	<div id = "mainMenuOpenExistingDancerInfo" class="col-md-6">
		    <p>Look Up Dancer</p>
		    <form method="post" action="<?php echo site_url('home/viewDancer'); ?>">
		    <select class="form-control bottom12" name="dancer">
		    	<?php foreach($dancers as $id=>$op): ?>
		      	<option value="<?=$id?>"><?=$op?></option>
		      	<?php endforeach; ?>
		    </select>
		    <input type="submit" class="btn" value="Look up" />
		    </form>
	    </div>
	    <div id = "mainMenuOpenExistingDanceInfo" class="col-md-6">
		    <p>Look Up Dance</p>
		    <form method="post" action="<?php echo site_url('home/viewDance'); ?>">
		    <select class="form-control bottom12" name="dance">
		      	<?php foreach($dances as $id=>$op): ?>
		      	<option value="<?=$id?>"><?=$op?></option>
		      	<?php endforeach; ?>
		    </select>
		    <input type="submit" class="btn" value="Look up" />
		    </form>
	    </div>
    </div>
</div>
