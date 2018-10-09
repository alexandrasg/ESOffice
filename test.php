<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username="root";
$password="root";
$database="exit_space";

$mysqli = new mysqli("localhost", $username, $password, $database);

$mysqli->select_db($database) or die( "Unable to select database");

$query="select distinct concat(dayname(date), ' ', time_format(start_time, '%l:%i %p')) as start, class_name, staff_name, substring(staff_name, instr(staff_name, ',')+2) as staff_first, substring(studio, 8) as studio_loc from ydp_mb_sched_glance";
$result=$mysqli->query($query);


$num = $mysqli->affected_rows;
if ($num==0) {
echo "The database contains no contacts yet";
} else {
echo "num classes = " . $num . "<br>";
  while ($obj = $result->fetch_object()) {
    $studio = $obj->studio_loc;
    $staffFirst = $obj->staff_first;
    $className = $obj->class_name;
    $dayTime = $obj->start;
    echo $studio . "," . $dayTime . "," . $className . "," .$staffFirst . ",Week,,,,,,,,,<br>";


    $studentQuery = 
  }
}
$mysqli->close();
?>
