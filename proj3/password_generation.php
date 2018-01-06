<?php
/**
 * Created by IntelliJ IDEA.
 * User: raghav
 * Date: 11/16/17
 * Time: 12:09 PM
 */




if($_GET) exit;
if($_POST) exit;

$pass = array('cs545','pavan','kumar');

#### Using SHA256 #######
$salt='$5$R$4%786yil$%^569';
# 12 character salt starting with $1$
for($i=0; $i<count($pass); $i++){
    echo crypt($pass[$i],$salt)."\n";
}
?>