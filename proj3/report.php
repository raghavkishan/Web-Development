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

    <!--<script type="text/javascript" src="form.js"></script>-->

    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="report_generate.css" />

</head>

<body>
<div class="container-fluid">
    <div class="row h-100 justify-content-center align-items-center">
        <form method = "post" action="report_generate.php">
            <h4 class = "pt-4 pb-4 pr-4"> Please enter the password to view the report.</h4>

            <div class="form-group col-sm-6">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
            </div>

            <div class="form-group col-sm-6">
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php
/**
 * Created: Sunku Ravindranath, Raghav Kishan
 * Project #3
 * Fall 2017
 * 820174908
 * jadrn063
 */

?>

</body>
</html>
