<?php

/*
*Created by Sean Doody;
*Created on 10/4/19
*Add A new college to Database
*/
    // has the navbar at the top
    include '../header/index.php';

    //required to connect to the databse
    require_once "../config/advisng_db_config.php";

    //grabs the post requests from the html. It is vital that it matches up with html. 
    $CoAbbreviation=$_POST["CoAbbreviation"]; 
    $collegeName=$_POST["collegeName"];
 
    //this chechs and see if the fields have datas filled out
    if (!$collegeName || !$CoAbbreviation) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //format input to add slashed for the query in the databse 
    $collegeName = addslashes($collegeName);
    $CoAbbreviation = addslashes($CoAbbreviation);

    //creates the query for the insert. 
    //the (?,?,?) is a placeholder for the variables 
    $query = "INSERT College(collegeName, CoAbbreviation) VALUES (?, ?)";
    $stmt = $db->prepare($query);

    //the line below will bind the parameteres. 
    //the sss stands for stings. so if we were inputting in int it would 'i' instead of s.
    $stmt->bind_param("ss", $collegeName, $CoAbbreviation);

    //sendt the command to the database 
    $stmt->execute();
    
    //prints out how many rows have been changed(it should only be one)
    echo $stmt->affected_rows," College has been added!";
    
    //closes the connection to the database. (this is the most secure thing that can be done )
    $db->close();
?>
    <br/>
    ><a href="show_college.php">Show Colleges</a>

</main>
</body>

</html>
