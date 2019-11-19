<body>
<?php
    //gets the navbar 
    include 'index.php';

    //connects to the database 
    require_once '../config/advisng_db_config.php';
    $programID=$_GET["programID"];

    $query = "DELETE FROM Program WHERE programID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $programID);
    $stmt->execute();
    echo $stmt->affected_rows." Program deleted from database";

    $db->close();
?>

    <br/>
    <a href="show_program.php">Show Programs</a>
    
</body>
