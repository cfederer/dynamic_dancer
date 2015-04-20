<div class="container-fluid">
  <h2 id = "newDancerTitle">Create A New Costume</h2>
  <form>
    <div id = "basicInformation" class="bottom25">
    	<h3>Basic Information</h3>
     <label for="costumeName">Costume Name: </label>
     	<input type="text" class="form-control" name="costumeName" id="costumeName"/>
     <label for="costumePartId">Costume Parts: </label>
     <p class="alert alert-info">Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>
     <select class="form-control bottom12" name="costumePartId" id="costumePartId" multiple>
          <option value="3">Red Shirt</option>
          <option value="4">Purple Galaxy Leggings</option>
     </select>
     <input type="submit" class="btn" />
     </div>
  </form>
 </div>