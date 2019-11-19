<body>

    <?php include_once '../header/index.php'; ?>
    <main role="main" class="container-fluid">
    <h1> Prerequisites </h1>
    
    
<?php

    //connect to the database
    //keep in mind this is a localhost, so that will change once it it is on the server. 
    require_once '../config/advisng_db_config.php';

    //grabs the post requests from the html. It is vital that it matches up with html. 
    $prereqID=$_POST["prereqID"];
    $courseID=$_POST["courseID"];
    $groupID=$_POST["groupID"];
 
    //this chechs and see if all the correct fields have the info in it. 
    if (!$prereqID || !$courseID || !$groupID) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //format input
    $prereqID = addslashes($prereqID);
    $courseID = addslashes($courseID);
    $groupID = addslashes($groupID);


    //creates the query for the insert. 
    //the (?,?,?) is a placeholder for the variables 
    $query = "Insert Prereq values (?, ?, ?, ?)";
    $stmt = $db->prepare($query);

    //the line below will bind the parameteres. 
    //the sss stands for stings. so if we were inputting in int it would 'i' instead of s.
    $stmt->bind_param("sss", $prereqID, $courseID, $groupID);
    $stmt->execute();
    echo $stmt->affected_rows," Prerequisite has been added!";
    
    //closes the connection to the database. 
    $db->close();
?>
    <br/>
    ><a href="show_prereq.php">Show Prerequisites</a>

</main>
</body>

</html>
