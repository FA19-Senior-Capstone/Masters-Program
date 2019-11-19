
<body>
    <main role="main" class="container-fluid">
    <h1> Course Types </h1>
    
<?php
    // has the navbar at the top
    include '../header/index.php';

    //required to connect to the databse. 
    require_once "../config/advisng_db_config.php";

    //grabs the post requests from the html. It is vital that it matches up with html. 
    $CoAbbreviation=$_POST["CoAbbreviation"]; 
    $courseTypeName=$_POST["courseTypeName"];
 
    //this chechs and see if all the correct fields have the info in it. 
    if (!$courseTypeName || !$CoAbbreviation) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //format input
    $courseTypeName = addslashes($courseTypeName);
    $CoAbbreviation = addslashes($CoAbbreviation);

    //creates the query for the insert. 
    //the (?,?,?) is a placeholder for the variables 
    $query = "INSERT CourseType VALUES (?, ?)";
    $stmt = $db->prepare($query);

    //the line below will bind the parameteres. 
    //the sss stands for stings. so if we were inputting in int it would 'i' instead of s.
    $stmt->bind_param("ss", $courseTypeName, $CoAbbreviation);
    $stmt->execute();
    echo $stmt->affected_rows," CourseType has been added!";
    
    //closes the connection to the database. 
    $db->close();
?>
    <br/>
    ><a href="show_coursetype.php">Show Course Types</a>

</main>
</body>

</html>
