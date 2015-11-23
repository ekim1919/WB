
<div class='container'>
	<fieldset>

<legend>
	Add a Character
</legend>

			<form class="form-horizontal" id="fm" name="register" action="/Public/Waifu/addwaifu.php" enctype="multipart/form-data" method="post">

					<p>
					<div class="control-group">
							<div class="controls">
						        <label class="control-label"> First Name: </label> 
								<input type="text" name="firstname" placeholder="First Name"> <br>
						 	</div>
					</div>


					<div class="control-group">
					 	<div class="controls">
						        <label class="control-label"> Last Name: </label> 								
								<input type="text" name="lastname" placeholder="Last Name"> <br>
						 </div>
					</div>

					<div class="control-group">
							<div class="controls">
								<label class="control-label"> Hair Color: </label>
								<input type="text" name="haircolor" placeholder="Hair Color">
						 	</div>
					</div>

					<div class="control-group">
							<div class="controls">
								<label class="control-label"> Eye Color: </label>
								<input type="text" name="eyecolor" placeholder="Eye Color">
						 	</div>
					</div>

					<div class="control-group">
							<div class="controls">
								<label class="control-label"> Height: </label>
								<input type="text" name="height" placeholder="Height">
						 	</div>
					</div>

					<div class="control-group">
							<div class="controls">
						        <label class="control-label"> Weight: </label>
								<input type="text" name="weight" placeholder="Weight">
						 	</div>
					</div>

							<div class="controls">
								<label class="control-label"> Bust Size: </label>
								<input type="text" name="bustsize" placeholder="Bust Size :)">
						 	</div>

					<div class="control-group">
							<div class="controls">
								<label class="control-label"> Hip Size: </label>								
								<input type="text" name="hipsize" placeholder="Hip Size">
						 	</div>
					</div>

					<div class="control-group">
							<div class="controls">
								<label class="control-label"> Waist Size: </label>
								<input type="text" name="waistsize" placeholder="Waist Size">
						 	</div>
					</div>

					<div class="control-group">
							<div class="controls">
								<label class="control-label"> Body Type: </label>								
								<input type="text" name="bodytype" placeholder="Body Type">
						 	</div>
					</div>

					<div class="control-group">
							<div class="controls">
								<label class="control-label"> Personality: </label>								
								<input type="text" name="personality" placeholder="Personality">
						 	</div>
					</div>
				</p>
					<label> Image: </label> <br> 
					<input name="avatar" type="file" accept="image/*"> <br>
					<button type="submit" class="btn" value="Submit">Submit</button>
				</form>
	</fieldset>
</div>

