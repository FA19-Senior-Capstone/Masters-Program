<body>
<?php

    include '../header/index.php';
    //connect to the database
    require_once "../config/advisng_db_config.php";
    $courseID=$_GET["courseID"];

    

    $query = "DELETE FROM Course WHERE courseID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $courseID);
    $stmt->execute();
    echo $stmt->affected_rows." courses deleted from database";
    // this will fail because of the forign key restaint 
    //(`cs492s19`.`CourseAndPrerequisite`, CONSTRAINT 
    //`CourseAndPrerequisite_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `Course` (`courseID`))

    $db->close();
?>

    <br/>
    ><a href="show_course.php">Show Course</a>
    
    
</main>
</body>

</html>
