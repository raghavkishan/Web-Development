<?php
/**
 * Created: Sunku Ravindranath, Raghav Kishan
 * Project #3
 * Fall 2017
 * 820174908
 * jadrn063
 */

include('helper.php');
include('project_three.php');

check_post_only();
$params = process_parameters();
validate_data($params);
store_data_in_db($params);

?>


