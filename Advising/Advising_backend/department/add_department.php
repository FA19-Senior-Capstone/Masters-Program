<body>
<?php
    include '../header/index.php';
    //Grabs the post requests from the html. It is vital that it matches up with html. 
    //$departmentID=$_POST["departmentID"];

    $departmentName=$_POST["departmentName"]; 
    $depAbbrreviation=$_POST["depAbbrreviation"];
    $collegeID=$_POST["collegeID"];
 
    //this checks to see if all the correct fields have the info in it. 
    if (!$departmentName || !$depAbbrreviation || !$collegeID) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //format input
    $departmentName = addslashes($departmentName);
    $depAbbrreviation = addslashes($depAbbrreviation);
    $collegeID = addslashes($collegeID);
    
    //connect to the database
    //keep in mind this is a localhost, so that will change once it it is on the server. 
    include_once "../config/advisng_db_config.php";

    //creates the query for the insert. 
    //the (?,?,?) is a placeholder for the variables 
    $query = "INSERT Department(departmentName, depAbbrreviation, collegeID) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);

    //the line below will bind the parameteres. 
    //the sss stands for stings. so if we were inputting in int it would 'i' instead of s.
    $stmt->bind_param("sss", $departmentName, $depAbbrreviation, $collegeID);
    $stmt->execute();
    echo $stmt->affected_rows," Department has been added!";
    
    //closes the connection to the database. 
    $db->close();
?>
    <br/><a href="show_department.php">Show Departments</a>

</main>
</body>

</html>
