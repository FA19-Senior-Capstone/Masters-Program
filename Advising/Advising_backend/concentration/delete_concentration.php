<?php

    //header for the files
    include '../header/index.php';
    
    $concentrationID=$_GET["concentrationID"];
   
    //connect to the database
    require_once '../config/advisng_db_config.php';

    $query = "Delete from Concentration where ConcentrationID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $concentrationID);
    $stmt->execute();
    echo $stmt->affected_rows." Concentration deleted from database";

    $db->close();
?>

    <br/>
    ><a href="show_concentration.php">Show Concentration</a>
    
    
</main>
</body>

</html>
