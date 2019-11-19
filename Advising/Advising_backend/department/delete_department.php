<body>
<?php
    // used to connect to the database 
    require_once '../config/advisng_db_config.php';
    include '../header/index.php';

    $departmentID=$_GET["departmentID"];
   
    $query = "DELETE FROM Department WHERE departmentID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $departmentID);
    $stmt->execute();
    echo $stmt->affected_rows." Department deleted from database.";

    $db->close();
?>

    <br/><a href="show_department.php">Show Departments</a>
</main>
</body>

</html>
