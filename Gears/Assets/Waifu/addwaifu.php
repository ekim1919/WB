
<fieldset>

<legend>
	Add a Character
</legend>

			<form id="add-char-form" class="form-horizontal" id="register" action="/Public/Waifu/addwaifu.php" enctype="multipart/form-data" method="post">

					<div class="form-group">
						<input type="text" name="firstname" placeholder="First Name">
					</div>

					<div class="form-group">					
						<input type="text" name="lastname" placeholder="Last Name"> 
					</div>

					<div class="form-group">
						<input type="text" name="haircolor" placeholder="Hair Color">
					</div>

					<div class="form-group">
						<input type="text" name="eyecolor" placeholder="Eye Color">
					</div>

					<div class="form-group">
						<input type="text" name="height" placeholder="Height">
					</div>

					<div class="form-group">
						<input type="text" name="weight" placeholder="Weight">
					</div>

					<div class="form-group">
						<input type="text" name="bustsize" placeholder="Bust Size :)">
					</div>

					<div class="form-group">							
						<input type="text" name="hipsize" placeholder="Hip Size">
					</div>

					<div class="form-group">
						<input type="text" name="waistsize" placeholder="Waist Size">
					</div>

					<div class="form-group">								
						<input type="text" name="bodytype" placeholder="Body Type">
					</div>

					<div class="form-group">							
						<input type="text" name="personality" placeholder="Personality">
					</div>

					<div class="form-group">
    					<textarea name="description" rows="7" columns="20"> Enter a description here </textarea>
					</div>

					<label> Image: </label> <br>

				    <input name="files" type="file" accept="image/*">

					<div class="form-group">
						<button type="submit" class="btn" value="Submit">Submit</button>
					</div>

				</form>

	</fieldset>

