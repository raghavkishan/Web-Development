<?php
/**
 * Created: Sunku Ravindranath, Raghav Kishan
 * Project #3
 * Fall 2017
 * 820174908
 * jadrn063
 */
$bad_chars = array('$','%','?','<','>','php');

function check_post_only() {
    if(!$_POST) {
        write_error_page("This scripts can only be called from a form.");
        exit;
    }
}

function write_error_page($msg) {
    write_head();
    write_body_one();
    echo "<h4 class = \"messageLine form-group my-sm-9\">",
    $msg,"</h4>";
    write_body_two();
}

function write_head(){
    print <<<ENDBLOCK
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration Form - Aztec Marathon</title>
    
         <!-- Bootstrap -->
        <link rel="stylesheet" href="http://jadran.sdsu.edu/bootstrap/css/bootstrap.min.css">
    
        <script src="http://jadran.sdsu.edu/jquery/jquery.js" type="text/javascript"></script> 
    
        <script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    
        <script type="text/javascript" src="http://jadran.sdsu.edu/bootstrap/js/bootstrap.min.js" ></script>
    
        <script type="text/javascript" src="form.js"></script>
    
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="form.css" />
    
    </head>
<!--
    Sunku Ravindranath, Raghav Kishan
    Project #2
    Fall 2017
    820174908
    jadrn063
-->
ENDBLOCK;
}

function write_body_one()
{
    print <<<ENDBLOCK
<body>
	<div class="container-fluid">
		<div class="row">
			<div class = "col-sm-9">
				<form class = "" method = "post" action="submit_request.php" enctype="multipart/form-data">

					<div class = "row">
						<div class = "form-group col-sm-4 my-sm-3">
							<label for = "firstNameInput">First Name</label>
							<input type="text" class = "form-control form-control-sm" id = "firstNameInput"  placeholder = "First Name" name="FirstName"  value = "$_POST[FirstName]"  autofocus>
						</div>

						<div class = "form-group col-sm-4 my-sm-3">
							<label for = "middleNameInput">Middle Name</label>
							<input type="text" class = "form-control form-control-sm" id = "middleNameInput"  placeholder = "Middle Name" name="MiddleName" value = "$_POST[MiddleName]" >
						</div>

						<div class = "form-group col-sm-4 my-sm-3">
							<label for = "lastNameInput">Last Name</label>
							<input type="text" class = "form-control form-control-sm" id = "lastNameInput"  placeholder = "Last Name" name="LastName" value = "$_POST[LastName]" >
						</div>
					</div>

					<div class = "row">
						<div class="form-group col-sm-12">
							<label for = "userPicture">Your Image</label>
							<input type="file" name="UserPicture" id = "userPicture" class="form-control-file" aria-describedby="imageUploadHelp" accept="image/*">
							<small id="imageUploadHelp" class="form-text text-muted">Please upload an image of maximum size 1 MB.</small>
						</div>
					</div>	

					

					<div class = "form-group">
						<label for = "addressLine1">Address Line 1</label>
						<input type="text" class = "form-control form-control-sm" id = "addressLine1"  placeholder = "Address Line 1" name="AddressLine1" aria-describedby="addressLine1Desc" value = "$_POST[AddressLine1]" >
						<small id = "addressLine1Desc"  class="form-text text-muted">Street Address, P.O. box, Compnay Name, c/o</small>
					</div>

					<div class="row">

						<div class = "form-group col-sm-5">
							<label for = "addressLine2">Address Line 2</label>
							<input type="text" class = "form-control form-control-sm" id = "addressLine2"  placeholder = "Address Line 2" name="AddressLine2" aria-describedby = "addressLine2Desc" value = "$_POST[AddressLine2]" >
							<small id = "addressLine2Desc"  class="form-text text-muted">Apartment number, Unit, floor, etc </small>
						</div>

						<div class = "form-group col-sm-4">
							<label for = "cityTown">City / Town</label>
							<input type="text" class = "form-control form-control-sm" id = "cityTown" name="CityTown" placeholder="City / Town" value = "$_POST[CityTown]" >
						</div>

						<div class = "form-group col-sm-3">
							<label for = "state">State</label>
							<input type="text" class = "form-control form-control-sm" id = "state" name="State" placeholder="State" aria-describedby="StateDesc" maxlength="2" value = "$_POST[State]" >
							<small id = "StateDesc"  class="form-text text-muted">Two Letters Only</small>
						</div>

					</div>

					<div class = "row">

						<div class = "form-group col-sm-4">
							<label for = "zipCode">Zip Code</label>
							<input type="text" class = "form-control form-control-sm" id = "zipCode" name="ZipCode" placeholder="Zip Code" maxlength="5" aria-describedby="zipCodeDesc" value = "$_POST[ZipCode]" >
							<small id = "zipCodeDesc"  class="form-text text-muted">Zip Code Max 5 digits</small>
						</div>

						<div class = "form-group col-sm-2 my-sm-4" >
							<label for = "phoneNumber">Phone Number</label>
						</div>
						<div class = "form-group col-xs-3 my-sm-4">
							<input type="tel" name="PhoneAreaCode" class="form-control form-control-sm" placeholder = "ddd" size="3" maxlength="3" value = "$_POST[PhoneAreaCode]" >
						</div>
						<div class = "form-group col-xs-3 my-sm-4">
							<input type="tel" name="PhonePrefixNumber" class="form-control form-control-sm phone-number" placeholder = "ddd" size="3" maxlength="3" value = "$_POST[PhonePrefixNumber]" >
						</div>
						<div class = "form-group col-xs-3 my-sm-4">
							<input type="tel" name="PhoneNumber" class="form-control form-control-sm phone-number" placeholder = "dddd" size="4" maxlength="4" value = "$_POST[PhoneNumber]" >
						</div>
					</div>
									
					<div class="row ">
			  			<div class="form-group col-sm-7">
			    			<label for="emailAddress">Email address</label>
			    			<input type="email" class="form-control form-control-sm" id="emailAddress" aria-describedby="emailHelp" placeholder="Enter email" name="EmailAddress" value = "$_POST[EmailAddress]" >
			    			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  			</div>

			  			<div class="form-group col-sm-5">
			  				<div class="mx-sm-3">
			  				<label for = "GenderOptions">Gender</label>
			  				</div>
				  			<label class="custom-control custom-radio">
                                <input type="radio" name="GenderOptions" value="Male" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Male</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input type="radio" name="GenderOptions" autocomplete="off" value="Female" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Female</span>
                            </label>            
			  			</div>
		  			</div>

		  			<div class = "row" >
		  				<div class="form-group col-sm-2">
		  					<label for = "dateOfBirth">Date of Birth</label>
		  				</div>
		  				<div class="form-group col-sm-2">
		  					<input type="number" name="Month" id = "month" class="form-control form-control-sm" placeholder="mm" max = "12" value = "$_POST[Month]" >
		  				</div>
		  				<div class="form-group col-sm-2">
		  					<input type="number" name="Day" id = "day" class="form-control form-control-sm" placeholder="dd" value = "$_POST[Day]" >
		  				</div>
		  				<div class="form-group col-sm-3">
		  					<input type="number" name="Year" id = "year" class="form-control form-control-sm" placeholder="yyyy" value = "$_POST[Year]" >
		  				</div>
		  				<div class="form-group my-sm-3"></div>
		  			</div>


		  			<!-- <div class="form-group">
		  				<label for = "GenderOptions">Gender</label>
			  			<div class="btn-group mx-sm-3" data-toggle = "buttons" id = "genderOptions">
			  				<label class="btn btn-outline-info btn-sm">
			  					<input type="radio" name="GenderOptions" autocomplete="off" value="Male">Male
			  				</label>
			  				<label class="btn btn-outline-info btn-sm">
			  					<input type="radio" name="GenderOptions" autocomplete="off" value="Female">Female
			  				</label>
			  			</div>
			  		</div> -->

			  		<!-- $().button('toggle') -->

			  		<div class="form-group">
			  			<label for = "medicalConditions">Medical Conditions</label>
			  			<textarea class = "form-control form-control-sm" id = "medicalConditions" rows = "2" name = "medicalConditions"></textarea>
			  		</div>

			  		<div class="form-group">
                        <label for = "ExperienceLevel">Experience Level</label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="ExperienceLevel" autocomplete="off" value="Expert" class="custom-control-input" >
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Expert</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="ExperienceLevel" autocomplete="off" value="Experienced" class="custom-control-input" >
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Experienced</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="ExperienceLevel" autocomplete="off" value="Novice" class="custom-control-input" >
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Novice</span>
                        </label>
                    </div>

				  	<div class="form-group">
                        <label for = "Category">Category</label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="Category" autocomplete="off" value="Teen" class="custom-control-input" >
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Teen</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="Category" autocomplete="off" value="Adult" class="custom-control-input" >
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Adult</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input type="radio" name="Category" autocomplete="off" value="Senior" class="custom-control-input" >
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Senior</span>
                        </label>
                    </div>
		  			
		  			<button type="submit" class="btn btn-outline-primary">Submit</button>

				</form>
			</div>
            <div id = "messageBlock" class = "col-sm-3 align-self-center">
ENDBLOCK;
}

function write_body_two(){
    print <<<ENDBLOCK
            </div>
		</div>
	</div>
</body>
</html>
ENDBLOCK;
}


function get_db_handle() {
    ########################################################
    # DO NOT USE jadrn000, DO NOT MODIFY jadnr000 DATABASE!
    ########################################################
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn063';
    $password = 'sailboat';
    $database = 'jadrn063';
    ########################################################

    if(!($db = mysqli_connect($server, $user, $password, $database))) {
        write_error_page('SQL ERROR: Connection failed: '.mysqli_error($db));
    }
    return $db;
}

function close_connector($db) {
    mysqli_close($db);
}

?>