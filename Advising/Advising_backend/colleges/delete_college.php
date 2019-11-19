<body>

    <main role="main" class="container-fluid">
	<h1>Remove College</h1>
<?php
/*
*Created by Sean Doody;
*Created on 10/4/19
*Delete a college from Database
*/
    //gets the navbar
    include '../header/index.php';

    $collegeID=$_GET["collegeID"];

    //connect to the database
    require_once "../config/advisng_db_config.php";

    $query = "DELETE FROM College WHERE collegeID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $collegeID);
    $stmt->execute();
    echo $stmt->affected_rows." College deleted from database";

    $db->close();
?>

    <br/>
    ><a href="show_college.php">Show Colleges</a>
</main>
</body>

</html>
