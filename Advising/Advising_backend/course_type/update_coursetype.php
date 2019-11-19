<body>
<?php
    include '../header/index.php';
    //connect to the database
    require_once "../config/advisng_db_config.php";
    
    $CoAbbreviation=$_POST["CoAbbreviation"]; 
    $courseTypeName=$_POST["courseTypeName"];  


     //this chechs and see if all the correct fields have the info in it. 
    if (!$courseTypeName || !$CoAbbreviation) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //formarts the input
    $courseTypeName = addslashes($courseTypeName);
    $CoAbbreviation = addslashes($CoAbbreviation);
   

    $query = "UPDATE CourseType SET courseTypeName=?,CoAbbreviation=? WHERE courseTypeID=?";
    $stmt = $db->prepare($query);

    $stmt->bind_param("sss",$courseTypeName, $CoAbbreviation, $courseTypeID);
    $stmt->execute();
    echo $stmt->affected_rows. " Course Types updated in database";

    $db->close();

?>

   <br/>
   ><a href="show_coursetype.php">Show Course Types</a>
   
   
   
</main>
</body>

</html>