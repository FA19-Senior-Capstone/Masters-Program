<body>
    
    <main role="main" class="container-fluid">
	<h1>Remove Course Type</h1>
<?php
    //gets the navbar
    include '../header/index.php';

    $courseTypeID=$_GET["courseTypeID"];
   
    //connect to the database
    require_once "../config/advisng_db_config.php";

    $query = "DELETE FROM CourseType WHERE courseTypeID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $courseTypeID);
    $stmt->execute();
    echo $stmt->affected_rows." CourseType deleted from database";
    
    $db->close();
?>

    <br/>
    ><a href="show_coursetype.php">Show Course Types</a>   
</main>
</body>

</html>
