<?php
/**
 * Created: Sunku Ravindranath, Raghav Kishan
 * Project #3
 * Fall 2017
 * 820174908
 * jadrn063
 */

function validate_data($params) {

    $states = array("AK","AL","AR","AZ","CA","CO","CT","DC",
        "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
        "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
        "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
        "UT","VA","VT","WA","WI","WV","WY","ak","al","ar","az","ca","co","ct","dc",
        "de","fl","ga","gu","hi","ia","id","il","in","ks","ky","la","ma",
        "md","me","mh","mi","mn","mo","ms","mt","nc","nd","ne","nh","nj",
        "nm","nv","ny","oh","ok","or","pa","pr","ri","sc","sd","tn","tx",
        "ut","va","vt","wa","wi","wv","wy");

    $msg = "";
    if(strlen($params[0]) == 0)
        $msg .= "Please enter the First Name<br /><br />";
    if(strlen($params[2]) == 0)
        $msg .= "Please enter the Last Name<br /><br />";
    if(strlen($params[3]) == 0)
        $msg .= "Please enter the Address Line 1<br /><br />";
    if(strlen($params[5]) == 0)
        $msg .= "Please enter the city\Town<br /><br />";
    if(strlen($params[6]) == 0)
        $msg .= "Please enter the State<br /><br />";
    elseif (!in_array($params[6],$states))
        $msg .= "Please enter a valid state abbreviation<br /><br />";
    if(strlen($params[7]) == 0)
        $msg .= "Please enter the zip code<br /><br />";
    elseif(!is_numeric($params[7]))
        $msg .= "Zip code may contain only numeric digits<br /><br />";
    if(strlen($params[11]) == 0)
        $msg .= "Please enter email<br /><br />";
    elseif(!filter_var($params[11], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br /><br />";
    if(strlen($params[8]) != 3)
        $msg .= "Please enter a valid Phone Area Code<br /><br />";
    elseif(!is_numeric($params[8]))
        $msg .= "Phone Area Code may contain only numeric digits<br /><br />";
    if(strlen($params[9]) != 3)
        $msg .= "Please enter a valid Phone Prefix Number<br /><br />";
    elseif(!is_numeric($params[9]))
        $msg .= "Phone Prefix Number may contain only numeric digits<br /><br />";
    if(strlen($params[10]) != 4)
        $msg .= "Please enter a valid Phone Number<br /><br />";
    elseif(!is_numeric($params[10]))
        $msg .= "Phone Number may contain only numeric digits<br /><br />";
    if(!(isset($params[12])))
        $msg .= "Please select Gender<br /><br />";
    if(!(isset($params[18])))
        $msg .= "Please select a Category<br /><br />";
    if(!(isset($params[17])))
        $msg .= "Please select an Experience Level<br /><br />";
    if(checkdate($params[13],$params[14],$params[15]) ===  false)
        $msg .= "Please enter a valid date for the date of birth field<br /><br />";
    if($msg) {
        write_form_error_page($msg);
        exit;
    }
}

function write_form_error_page($msg) {
    write_header();
    write_body_gender();
    write_body_date_birth_medical();
    write_body_exper_level();
    write_body_category();
    write_foot_one();
    echo "<h4 class = \"messageLine form-group my-sm-9\">",
    $msg,"</h4>";
    write_foot_two();
}

function write_form_success_page($ms){
    write_header();
    write_body_gender();
    write_body_date_birth_medical();
    write_body_exper_level();
    write_body_category();
    write_foot_one();
    echo "<h4 class = \"successMessageLine form-group my-sm-9\">",
    $ms,"</h4>";
    write_foot_two();
}

function write_header(){

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
    Project #3
    Fall 2017
    820174908
    jadrn063
-->
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

ENDBLOCK;
}

function write_body_gender(){

    echo "<input type=\"radio\" name=\"GenderOptions\" value=\"Male\" class=\"custom-control-input\" ";
    echo ((isset($_POST['GenderOptions']) && $_POST['GenderOptions'] == "Male") ? "checked" : "");
    echo " > \n";
    echo "<span class=\"custom-control-indicator\"></span>";
    echo "<span class=\"custom-control-description\">Male</span>";
    echo "</label> \n";
    echo "<label class=\"custom-control custom-radio\"> \n";
    echo "<input type=\"radio\" name=\"GenderOptions\" autocomplete=\"off\" value=\"Female\" class=\"custom-control-input\" ";
    echo ((isset($_POST['GenderOptions']) && $_POST['GenderOptions'] == "Female") ? "checked" : "");
    echo " > \n";
    echo "<span class=\"custom-control-indicator\"></span>";
    echo "<span class=\"custom-control-description\">Female</span>";
    echo "</label> \n";
}

function write_body_date_birth_medical(){
    print <<<ENDBLOCK
                        </div>
		  			</div>

		  			<div class = "row" >
		  				<div class="form-group col-sm-2">
		  					<label for = "dateOfBirth">Date of Birth</label>
		  				</div>
		  				<div class="form-group col-sm-2">
		  					<input type="number" name="Month" id = "month" class="form-control form-control-sm" placeholder="mm" max = "12" value = "$_POST[Month]">
		  				</div>
		  				<div class="form-group col-sm-2">
		  					<input type="number" name="Day" id = "day" class="form-control form-control-sm" placeholder="dd" value = "$_POST[Day]" >
		  				</div>
		  				<div class="form-group col-sm-3">
		  					<input type="number" name="Year" id = "year" class="form-control form-control-sm" placeholder="yyyy" value = "$_POST[Year]" >
		  				</div>
		  				<div class="form-group my-sm-3"></div>
		  			</div>

                    <div class="form-group">
			  			<label for = "medicalConditions">Medical Conditions</label>
			  			<textarea class = "form-control form-control-sm" id = "medicalConditions" rows = "2" name="medicalConditions"></textarea>
			  		</div>

                    <div class="form-group">
			  		    <label for = "ExperienceLevel">Experience Level</label>
				  		<label class="custom-control custom-radio">
ENDBLOCK;
}

function write_body_exper_level(){
    echo "<input type=\"radio\" name=\"ExperienceLevel\" autocomplete=\"off\" value=\"Expert\" class=\"custom-control-input\" ";
    echo ((isset($_POST['ExperienceLevel']) && $_POST['ExperienceLevel'] == "Expert") ? "checked" : "");
    echo "> \n";
    echo "<span class=\"custom-control-indicator\"></span>";
    echo "<span class=\"custom-control-description\">Expert</span>";
    echo "</label>\n";
    echo " <label class=\"custom-control custom-radio\"> \n";
    echo "<input type=\"radio\" name=\"ExperienceLevel\" autocomplete=\"off\" value=\"Experienced\" class=\"custom-control-input\"";
    echo ((isset($_POST['ExperienceLevel']) && $_POST['ExperienceLevel'] == "Experienced") ? "checked" : "");
    echo " > \n";
    echo "<span class=\"custom-control-indicator\"></span>";
    echo "<span class=\"custom-control-description\">Experienced</span>";
    echo "</label>\n";
    echo "<label class=\"custom-control custom-radio\"> \n";
    echo "<input type=\"radio\" name=\"ExperienceLevel\" autocomplete=\"off\" value=\"Novice\" class=\"custom-control-input\"";
    echo ((isset($_POST['ExperienceLevel']) && $_POST['ExperienceLevel'] == "Novice") ? "checked" : "");
    echo " > \n";
    echo "<span class=\"custom-control-indicator\"></span>";
    echo "<span class=\"custom-control-description\">Novice</span>";
    print <<<ENDBLOCK
                        </label>
				  	</div>
ENDBLOCK;
}

function write_body_category(){
    print <<<ENDBLOCK
                    <div class="form-group">
                        <label for = "Category">Category</label>
                        <label class="custom-control custom-radio">
ENDBLOCK;

    echo "<input type=\"radio\" name=\"Category\" autocomplete=\"off\" value=\"Teen\" class=\"custom-control-input\" ";
    echo ((isset($_POST['Category']) && $_POST['Category'] == "Teen") ? "checked" : "");
    echo "> \n ";
    echo "<span class=\"custom-control-indicator\"></span>";
    echo "<span class=\"custom-control-description\">Teen</span>";
    echo "</label> \n";
    echo "<label class=\"custom-control custom-radio\">";
    echo "<input type=\"radio\" name=\"Category\" autocomplete=\"off\" value=\"Adult\" class=\"custom-control-input\"";
    echo ((isset($_POST['Category']) && $_POST['Category'] == "Adult") ? "checked" : "");
    echo " > \n";
    echo "<span class=\"custom-control-indicator\"></span>";
    echo "<span class=\"custom-control-description\">Adult</span>";
    echo "</label> \n";
    echo "<label class=\"custom-control custom-radio\">";
    echo "<input type=\"radio\" name=\"Category\" autocomplete=\"off\" value=\"Senior\" class=\"custom-control-input\"";
    echo ((isset($_POST['Category']) && $_POST['Category'] == "Senior") ? "checked" : "");
    echo " > \n";
    echo "<span class=\"custom-control-indicator\"></span>";
    echo "<span class=\"custom-control-description\">Senior</span>";
    print <<<ENDBLOCK
                        </label>
                    </div>
ENDBLOCK;
}

function write_foot_one()
{
    print <<<ENDBLOCK
                    <button type="submit" class="btn btn-outline-primary">Submit</button>

				</form>
			</div>
            <div id = "messageBlock" class = "col-sm-3 align-self-center">
ENDBLOCK;
}

function write_foot_two(){
    print <<<ENDBLOCK
            </div>
		</div>
	</div>
</body>
</html>
ENDBLOCK;
}


function process_parameters($params) {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['FirstName']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['MiddleName']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['LastName']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['AddressLine1']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['AddressLine2']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['CityTown']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['State']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['ZipCode']));
    $params[] = (string)($_POST['PhoneAreaCode']);
    $params[] = (string)($_POST['PhonePrefixNumber']);
    $params[] = (string)($_POST['PhoneNumber']);
    $params[] = trim(str_replace($bad_chars, "",$_POST['EmailAddress']));
    $params[] = $_POST['GenderOptions'];
    $params[] = trim(str_replace($bad_chars, "",$_POST['Month']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['Day']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['Year']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['medicalConditions']));
    $params[] = $_POST['ExperienceLevel'];
    $params[] = $_POST['Category'];
    return $params;
}

function store_data_in_db($params) {
    # get a database connection
    $db = get_db_handle();  ## method in helpers.php
    ##############################################################
    $sql = "SELECT * FROM person WHERE ".
        "email = '$params[11]';";
##echo "The SQL statement is ",$sql;
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
        write_form_error_page('This record appears to be a duplicate');
        exit;
    }

    $imageName = $_FILES['UserPicture']['name'];

    $date_of_birth = (string)$params[15]."-".(string)$params[13]."-".(string)$params[14];
    $p = $params[8].$params[9].$params[10];
    $phone = (int)$p;
    $imgName = (string)$imageName;
    $stateToUpper = strtoupper($params[6]);

##OK, duplicate check passed, now insert
    $sql = "INSERT INTO person(first_name,middle_name,last_name,image_name,address_line1,address_line2,city,state,zip,phone,email,gender,date_of_birth,medical_conditions,experience_level,category) ".
        "VALUES('$params[0]','$params[1]','$params[2]','$imgName','$params[3]','$params[4]','$params[5]','$stateToUpper','$params[7]',$phone,'$params[11]','$params[12]',STR_TO_DATE('$date_of_birth', '%Y-%m-%d'),'$params[16]','$params[17]','$params[18]');";
##echo "The SQL statement is ",$sql;

    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    if ($how_many > 0) {
        $ms = "You have successfully registered for the AZTEC Marathon! Thank you.";
        write_form_success_page($ms);
        upload_image();
    }else{
        $ms = "Error Description: ".mysqli_error($db);
        write_form_error_page($ms);
    }
    #echo ("Error Description: ".mysqli_error($db));
    close_connector($db);
}

function upload_image(){

    $upload_dir = "p_ct_r_s/";
    $target_dir = "/home/jadrn063/public_html/proj3/p_ct_r_s/";
    $fname = $_FILES['UserPicture']['name'];
    $target_file = $target_dir . basename($_FILES["UserPicture"]["name"]);
    $mes = "";
    $uploadOk = 1;

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
    if (strlen($fname) > 0) {
        if (file_exists($target_file)) {
            $mes .= "Image $fname already exists.<br /><br />";
            $uploadOk = 0;
        }
    }

// Check file size
    if ($_FILES["UserPicture"]["error"] > 0) {
        $err = $_FILES['UserPicture']['error'];
        if($err == 1){
            $mes .= "Image was too big to upload, the limit is 2MB<br /><br />";
        }
        if($err == 4){
            $mes .= "Please upload image an image.<br /><br />";
        }
        $uploadOk = 0;
    }

// Allow certain file formats
    if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg") {
        $mes .= "Only JPG, JPEG & PNG images are allowed.<br /><br />";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $mes .= "Sorry, your file was not uploaded. Please select a different image/file to upload.<br /><br />";
        write_form_error_page($mes);
        exit;
// if everything is ok, try to upload file
    } else {
        move_uploaded_file($_FILES["UserPicture"]["tmp_name"], $target_file);
    }

    return $fname;
}

?>