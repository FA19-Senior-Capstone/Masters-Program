<?php

$mysqli = new mysqli('localhost','root', '',  'cs492s19');
$typeResults = $mysqli->query("SELECT courseType FROM CourseType");
?>

<select name="CourseType">
<?php 

while($row = $typeResults->fetch_assoc()){
    $courseType = $row['courseType'];
    echo "<option value='$courseType'>$courseType</option>";
}

$mysqli->close();
?>