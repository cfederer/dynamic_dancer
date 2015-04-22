<div class="container-fluid">
  <h2 id = "newDancerTitle">Create A New Dancer </h2>
  <form method="post" action="<?php echo site_url('dancer/addDancer'); ?>">
    <div id = "basicInformation" class="bottom25">
    	<h3>Basic Information</h3>
     <label for="fname">First Name: </label>
     	<input type="text" class="form-control" name="fname" id="fname"/>
     <label for="lname">Last Name: </label>
     	<input type="text" class="form-control" name="lname" id="lname"/>
     <!--<label for="dob">Date of Birth: </label>
     	<input type="text" class="form-control" name="dob" id="dob"/>
     <label for="pfname">Parent First Name: </label>
     	<input type="text" class="form-control" name="pfname" id="pfname"/>
     <label for="plname">Parent Last Name: </label>
     	<input type="text" class="form-control" name="plname" id="plname"/>
     <label for="phone">Phone Number: </label>
     	<input type="text" class="form-control" name="phone" id="phone"/>-->
     </div>
     <div id = "sizeInformation" class="bottom25">
     	<h3>Size Information</h3>
        <label for="shirtSize">Shirt Size:</label>
        	<input type="text" class="form-control" name="shirtSize" id="shirtSize"/>
        <label for="pantSize">Pant Size:</label>
        	<input type="text" class="form-control" name="pantSize" id="pantSize"/>
        <label for="braSize">Bra Size:</label>
        	<input type="text" class="form-control" name="braSize" id="braSize"/>
        <label for="shoeSize">Shoe Size:</label>
        	<input type="text" class="form-control" name="shoeSize" id="shoeSize"/>
     </div>
     <div id = "Measurements" class="bottom25">
     	<h3>Measurements</h3>
        <label for="bustMeasurement">Bust:</label>
        	<input type="text" class="form-control" name="bustMeasurement" id="bustMeasurement"/>
        <label for="hipMeasurement">Hip:</label>
        	<input type="text" class="form-control" name="hipMeasurement" id="hipMeasurement"/>
        <label for="waistMeasurement">Waist:</label>
        	<input type="text" class="form-control" name="waistMeasurement" id="waistMeasurement"/>
        <label for="chestMeasurement">Chest:</label>
        	<input type="text" class="form-control bottom12" name="chestMeasurement" id="chestMeasurement"/>
     </div>
     <input type="submit" class="btn bottom25" value="Add"/>
  </form>
 </div>