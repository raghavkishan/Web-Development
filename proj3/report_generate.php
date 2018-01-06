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

<?php

/**
 * Created: Sunku Ravindranath, Raghav Kishan
 * Project #3
 * Fall 2017
 * 820174908
 * jadrn063
 */

include('helper.php');

$pass = $_POST['password'];
$valid = false;

$raw = file_get_contents('passwords.dat');
$data = explode("\n",$raw);
foreach ($data as $item){
    if (crypt($pass,$item) === $item)
        $valid = true;
}

$db = get_db_handle();

if (!$valid){
    if($pass == null) {
        print <<<ENDBLOCK
    
    <div class="container-fluid ">
        <div class="row h-100 justify-content-center align-items-center">
            <form method = "post" action="report_generate.php">
                <h4 class = "text-danger pt-4 pb-4 pr-4">Unauthorized access! Please enter password to view report.</h4>

                <div class="form-group col-sm-6">
                    <label class="form-control-label" for="inputPassword">Password</label>
                    <input type="password" class="form-control is-invalid" id="inputPassword" placeholder="Password" name="password">
                </div>

                <div class="form-group col-sm-6">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
ENDBLOCK;
    }
    else
        {
    print <<<ENDBLOCK
    
    <div class="container-fluid">
        <div class="row h-100 justify-content-center align-items-center">
            <form method = "post" action="report_generate.php">
                <h4 class="pt-4 pb-4 pr-4"> Please enter the password to view the report.</h4>

                <div class="form-group col-sm-6">
                    <label class="form-control-label" for="inputPassword">Password</label>
                    <input type="password" class="form-control is-invalid" id="inputPassword" placeholder="Password" name="password">
                    <div class="invalid-feedback">Incorrect Password.</div>
                </div>

                <div class="form-group col-sm-6">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>    
            </form>
        </div>
    </div>
ENDBLOCK;
    }
}


if ($valid){
    if ($db) {
        $sql = "select image_name,last_name,first_name,category,TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()),experience_level
                FROM person
                ORDER BY category DESC, last_name ASC;";
        $result = mysqli_query($db, $sql);
        if (!$result)
            echo "ERROR in query" . mysqli_error($db);

        print <<<ENDBLOCK
    <h1 class="h1 p-4" id="heading">Aztec Marathon - Registered Users</h1>
    <div class = "container">
        <table class="table table-hover table-info">
            <thead>
                <tr>
                    <th scope="col">Picture</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Age</th>
                    <th scope="col">experience Level</th>
                </tr>
            </thead>
            <tbody>
ENDBLOCK;

        $dir_path = "p_ct_r_s/";
        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            $row_columns = array_slice($row, 0);
            for ($i = 0; $i < count($row_columns); $i++) {
                #echo "<h3> $i index </h3>";
                if ($i === 0) {
                    echo "<td><img src=\"$dir_path/$row_columns[$i]\" class=\"rounded img-fluid img-thumbnail\" width = \"200px\" alt=\"Responsive image\"></td>";
                } else {
                    echo "<td>$row_columns[$i]</td>";
                }
            }
            echo "</tr> \n";
        }

        print <<<ENDBLOCK
            </tbody>
        </table>
   </div>     

ENDBLOCK;

    }
}

close_connector($db);

?>

</body>
</html>
