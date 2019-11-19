<body>
<?php

    
    include '../header/index.php';
    //required to connect to the database 
    require_once "../config/advisng_db_config.php";

    //grabs the post requests from the html. It is vital that it matches up with html. 
    //$courseID=$_POST["courseID"];
    $prefixID=$_POST["prefixID"];
    $courseNum=$_POST["courseNum"];
    $title=$_POST["title"]; 
    $courseDescription=$_POST["courseDescription"];
    $credits=$_POST["credits"];
 
    //this chechs and see if all the correct fields have the info in it. 
    if (!$courseNum || !$title || !$courseDescription || !$credits) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //format input
   // $courseID = addslashes($courseID);
    $prefixID = addslashes($prefixID);
    $courseNum = addslashes($courseNum);
    $title = addslashes($title);
    $courseDescription = addslashes($courseDescription);
    $credits = addslashes($credits);
    


    //creates the query for the insert. 
    //the (?,?,?) is a placeholder for the variables 
    $query = "INSERT Course(prefixID, courseNum, title, courseDescription, credits) VALUES (?,?,?,?,?)";
    $stmt = $db->prepare($query);

    //the line below will bind the parameteres. 
    //the sss stands for stings. so if we were inputting in int it would 'i' instead of s.
    $stmt->bind_param("sssss", $prefixID ,$courseNum ,$title, $courseDescription, $credits);
    $stmt->execute();
    echo $stmt->affected_rows," Course has been added!";
    
    //closes the connection to the database. 
    $db->close();
?>
    <br/>
    ><a href="show_course.php">Show cousrse</a>

</main>
</body>

</html>
