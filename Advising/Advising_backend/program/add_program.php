<body>

<?php
    include '../header/index.php';
    require_once "../config/advisng_db_config.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //Grabs the post requests from the html. It is vital that it matches up with html. 
    //$programID=$_POST["programID"];
    $programName=$_POST["programName"];
    $programAbbr=$_POST["programAbbr"];
    $departmentID=$_POST["departmentID"];
    $grad_Undergrad=$_POST["grad_undergrad"];
 
    //this checks to see if all the correct fields have the info in it. 
    if (!$programName || !$programAbbr || !$departmentID || !$grad_Undergrad) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //format input
    //$programID = addslashes($programID);
    $programName = addslashes($programName);
    $programAbbr = addslashes($programAbbr);
    $departmentID = addslashes($departmentID);
    $grad_Undergrad = addslashes($grad_Undergrad);

    //creates the query for the insert. 
    //I'm not a big fan of this, as it's not very user friendly to have to remember a programID by its number.  
    $query = "INSERT Program(programName, programAbbr, departmentID, grad_Undgrad) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($query);

    //the line below will bind the parameters. 
    //the sss stands for stings. so if we were inputting in int it would 'i' instead of s.
    $stmt->bind_param("ssss", $programName, $programAbbr, $departmentID, $grad_Undergrad);
    $stmt->execute();
    echo $stmt->affected_rows," Program has been added!";
    
    //closes the connection to the database. 
    $db->close();
?>
    <br/>
    <a href="show_program.php">Show Programs</a>

</body>
