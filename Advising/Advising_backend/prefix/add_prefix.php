<body>
<?php
    include '../header/index.php';
    //grabs the post requests from the html. It is vital that it matches up with html. 
    $prefixID=$_POST["prefixID"];
    $prefix=$_POST["prefix"]; 
    $departmentID=$_POST["departmentID"];
 
    //this chechs and see if all the correct fields have the info in it. 
    if (!$prefixID || !$prefix || !$departmentID) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //format input
    $prefixID = addslashes($prefixID);
    $prefix = addslashes($prefix);
    $departmentID = addslashes($departmentID);
    

    //connect to the database
    //keep in mind this is a localhost, so that will change once it it is on the server. 
    include_once "../config/advisng_db_config.php";

    //creates the query for the insert. 
    //the (?,?,?) is a placeholder for the variables 
    $query = "Insert prefix values (?, ?, ?)";
    $stmt = $db->prepare($query);

    //the line below will bind the parameteres. 
    //the sss stands for stings. so if we were inputting in int it would 'i' instead of s.
    $stmt->bind_param("sss", $prefixID, $prefix, $departmentID);
    $stmt->execute();
    echo $stmt->affected_rows," Prefix has been added!";
    
    //closes the connection to the database. 
    $db->close();
?>
    <br/
    ><a href="show_prefix.php">Show Prefix</a>

</main>
</body>

</html>
