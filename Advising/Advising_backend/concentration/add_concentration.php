<?php

    //header 
    include '../header/index.php';

    //connects to the database 
    require_once '../config/advisng_db_config.php';

    //grabs the post requests from the html. It is vital that it matches up with html. 
    $concentrationID=$_POST["concentrationID"];
    $concentrationName=$_POST["concentrationName"]; 
    $concentrationabbr=$_POST["concentrationabbr"];
    $programID=$_POST["programID"];
 
    //this chechs and see if all the correct fields have the info in it. 
    if (!$concentrationID || !$concentrationName || !$concentrationabbr || !$programID) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //format input
    $concentrationID = addslashes($concentrationID);
    $concentrationName = addslashes($concentrationName);
    $concentrationabbr = addslashes($concentrationabbr);
    $programID = addslashes($programID);

    //creates the query for the insert. 
    //the (?,?,?) is a placeholder for the variables 
    $query = "Insert concentration values (?, ?, ?, ?)";
    $stmt = $db->prepare($query);

    //the line below will bind the parameteres. 
    //the sss stands for stings. so if we were inputting in int it would 'i' instead of s.
    $stmt->bind_param("issi", $concentrationID, $concentrationName, $concentrationabbr, $programID);
    $stmt->execute();
    echo $stmt->affected_rows," Concentration has been added!";
    
    //closes the connection to the database. 
    $db->close();
?>
    <br/>
    ><a href="show_concentration.php">Show Concentration</a>

</main>
</body>

</html>
