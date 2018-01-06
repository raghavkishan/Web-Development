/*
    Sunku Ravindranath, Raghav Kishan
    Project #3
    Fall 2017
    820174908
    jadrn063

*/

var messages =  ['Please enter your First name',
                'Please enter your Last name',
                'Please enter your Address',
                'Please enter your City',
                'Please enter your State',
                'Please enter your Zip Code',
                'Please enter your Phone Area Code',
                'Please enter your Phone Prefix number',
                'Please enter your Phone Number'];

function isValidate(formErrorStatus,elementHandle,pictureSize){

    //empty input validation
    for(var i=0; i<9; i++) {
        if(!$.trim(elementHandle[i].val())) {
            //elementHandle[i].addClass("error")
            formErrorStatus.text(messages[i]);
            elementHandle[i].focus();
            return false;
        }
    }

    //Picture Size validation
    if(pictureSize == 0){
        formErrorStatus.text("Please upload an Image");
        elementHandle[13].focus();
        return false;
    }

    if(pictureSize/1000 > 1000){
        formErrorStatus.text("Image too big, 1 MB maximum");
        elementHandle[13].focus();
        return false;
    }


    //checking for a valid USA state
    if(!isValidState(elementHandle[4].val())) {
        elementHandle[4].addClass("error");
        formErrorStatus.text("The state appears to be invalid, please use the two letter state abbreviation");
        elementHandle[4].focus();
        return false;
    }

    //Zip code validation
    if(!$.isNumeric(elementHandle[5].val())) {
        elementHandle[5].addClass("error");
        formErrorStatus.text("The zip code appears to be invalid, "+
        "numbers only please. ");
        elementHandle[5].focus();
        return false;
    }

    //phone number validation
    if(!$.isNumeric(elementHandle[6].val())) {
        elementHandle[6].addClass("error")
        formErrorStatus.text("The area code must have numbers only");
        elementHandle[6].focus();
        return false
    }

    if(!$.isNumeric(elementHandle[7].val())) {
        elementHandle[7].addClass("error")
        formErrorStatus.text("Phone Prefix number must have numbers only");
        elementHandle[7].focus();
        return false
    }

    if(!$.isNumeric(elementHandle[8].val())) {
        elementHandle[8].addClass("error")
        formErrorStatus.text("The Phone Number must have numbers only");
        elementHandle[8].focus();
        return false
    }

    //Date of Birth Validation
    var day = document.getElementById("day").value;
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;

    // now turn the three values into a Date object and check them
    var checkDate = new Date(year, month-1, day);
    var checkDay = checkDate.getDate();
    var checkMonth = checkDate.getMonth()+1;
    var checkYear = checkDate.getFullYear();

    if(day != checkDay){
        formErrorStatus.text("Not a valid Day. Please enter the correct date");
        elementHandle[15].focus();
        return false;
    }

    if(month != checkMonth){
        formErrorStatus.text("Not a valid month. PLease enter the correct month");
        elementHandle[14].focus();
        return false;
    }

    if(year != checkYear){
        formErrorStatus.text("not a valid yer. Please enter the correct year");
        elementHandle[16].focus();
        return false;
    }

    isValidateCompleteFlag = true;
    return true;
}

function isValidState(enteredState) {
    var stateArray = new Array("AK","AL","AR","AZ","CA","CO","CT","DC",
    "DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA",
    "MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ",
    "NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX",
    "UT","VA","VT","WA","WI","WV","WY");
    for(var i=0; i < stateArray.length; i++)
        if(stateArray[i] === $.trim(enteredState))
            return true;
    return false;
}

/*function validateDate() {

    var day = document.getElementById("day").value;
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;

    // now turn the three values into a Date object and check them
    var checkDate = new Date(year, month-1, day);
    var checkDay = checkDate.getDate();
    var checkMonth = checkDate.getMonth()+1;
    var checkYear = checkDate.getFullYear();

    if(day == checkDay && month == checkMonth && year == checkYear)
        return true;
    else
        return false;
}  */



function isEmpty(fieldValue) {
    return $.trim(fieldValue).length === 0;
}


function duplicate_handler(response) {
    if(response === "dup") {
        $('.messageLine').text("Duplicate Record, Email address already used");
        $('.messageLine').focus();
        duplicate_flag = true;
        //$(':submit').prop('disabled',true);
    }
    else if(response === "OK") {
        $('.messageLine').text("");
        duplicate_flag = false;
        emptyEmailFlag = false;

        if(!$.trim($('[name="EmailAddress"]').val())){
            $('.messageLine').text("Please Enter an Email Address.");
            $('[name="EmailAddress"]').focus();
            emptyEmailFlag = true;
            //$(':submit').prop('disabled',true);
        }

        if (duplicate_flag === false && emptyEmailFlag === false){
            $('form').serialize();
            $('form').submit();
        }
    }
    else
        alert(response);
}

var duplicate_flag = false;
var emptyEmailFlag = false;
//var validate_flag;
var isValidateCompleteFlag;

$(document).ready(function(){

    //$(':submit').prop('disabled',true);
    isValidateCompleteFlag = false;
	var formErrorStatus = $('.messageLine');
	var elementHandle = new Array(15);
	elementHandle[0] = $('[name="FirstName"]');
	elementHandle[1] = $('[name="LastName"]');
	elementHandle[2] = $('[name="AddressLine1"]');
	elementHandle[3] = $('[name="CityTown"]');
	elementHandle[4] = $('[name="State"]');
    elementHandle[5] = $('[name="ZipCode"]');
	elementHandle[6] = $('[name="PhoneAreaCode"]');
	elementHandle[7] = $('[name="PhonePrefixNumber"]');
	elementHandle[8] = $('[name="PhoneNumber"]');
	elementHandle[9] = $('[name="EmailAddress"]');
    elementHandle[10] = $('[name="Month"]');
    elementHandle[11] = $('[name="Day"]');
    elementHandle[12] = $('[name="Year"]');
    elementHandle[13] = $('[name="UserPicture"]');
    elementHandle[14] = $('[name="Month"]');
    elementHandle[15] = $('[name="Day"]');
    elementHandle[16] = $('[name="Year"]');

    elementHandle[0].on('blur', function() {
        if(isEmpty(elementHandle[0].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[1].on('blur', function() {
        if(isEmpty(elementHandle[1].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[2].on('blur', function() {
        if(isEmpty(elementHandle[2].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[3].on('blur', function() {
        if(isEmpty(elementHandle[3].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[4].on('blur', function() {
        if(isEmpty(elementHandle[4].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[5].on('blur', function() {
        if(isEmpty(elementHandle[5].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[6].on('blur', function() {
        if(isEmpty(elementHandle[6].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[7].on('blur', function() {
        if(isEmpty(elementHandle[7].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[8].on('blur', function() {
        if(isEmpty(elementHandle[8].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[9].on('blur', function() {
        if(isEmpty(elementHandle[9].val()))
            return;
        $(this).removeClass("error");
        formErrorStatus.text("");
    });

    elementHandle[4].on('keyup', function() {
        elementHandle[4].val(elementHandle[4].val().toUpperCase());
    });

    elementHandle[6].on('keyup', function() {
        if(elementHandle[6].val().length === 3)
            elementHandle[7].focus();
    });

    elementHandle[7].on('keyup', function() {
        if(elementHandle[7].val().length === 3)
            elementHandle[8].focus();
    });

    elementHandle[14].on('keyup', function() {
        if(elementHandle[14].val().length === 2)
            elementHandle[15].focus();
    });

    elementHandle[15].on('keyup', function() {
        if(elementHandle[15].val().length === 2)
            elementHandle[16].focus();
    });

    var pictureSize = 0;
    elementHandle[13].on('change',function(e) {
        pictureSize = this.files[0].size;
    });


    $(':submit').on('click', function(e){
        for(var i=0; i < 9; i++)
            elementHandle[i].removeClass("error");
        formErrorStatus.text("");
        e.preventDefault();
        var validate_flag =  isValidate(formErrorStatus, elementHandle,pictureSize);

        if (validate_flag === true){
            var params = "email="+elementHandle[9].val();
            var url = "check_duplicate.php?"+params;
            $.get(url,duplicate_handler);
        }
    });

});
 